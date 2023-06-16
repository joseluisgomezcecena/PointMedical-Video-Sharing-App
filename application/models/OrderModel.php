<?php
class OrderModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function create_order($user_id, $cart, $total)
	{
		//insert order
		$order_data = array(
			'client_id'=>$user_id,
			'total'=>$total,
		);

		$this->db->insert('purchase_order', $order_data);
		$order_id = $this->db->insert_id();

		//insert order items
		foreach($cart as $item)
		{
			$order_item_data = array(
				'p_order'=>$order_id,
				'product'=>$item['id'],
				'qty'=>$item['qty'],
				'price'=>$item['price'],
			);

			$this->db->insert('order_items', $order_item_data);
		}

		return $order_id;
	}


	public function cancel_order($id)
	{
		$data = array(
			'status'=> 86,
			'cancellation_reason'=> $this->input->post('reason'),
		);


		$this->db->where('po_id', $id);
		$this->db->update('purchase_order', $data);
	}

	public function update_order($id)
	{
		$data = array(
			'status'=> $this->input->post('status'),
		);


		$this->db->where('po_id', $id);
		$this->db->update('purchase_order', $data);
	}


	public function get_orders($limit = FALSE)
	{
		if($limit != FALSE)
		{
			$this->db->limit($limit);
		}

		$this->db->where('status !=', 86);

		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->order_by('purchase_order.created_at', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_all($limit = FALSE)
	{
		if($limit != FALSE)
		{
			$this->db->limit($limit);
		}

		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->order_by('purchase_order.created_at', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_cancelled($limit = FALSE)
	{
		if($limit != FALSE)
		{
			$this->db->limit($limit);
		}

		$this->db->where('status', 86);
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->order_by('purchase_order.created_at', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}


	public function delete_order($id)
	{
		$this->db->where('po_id', $id);
		$this->db->delete('purchase_order');
	}



	//chart data.
	public function get_orders_chart()
	{
		$currentYear = date('Y');

		// Query to retrieve sales data for the current year
		$query = $this->db->select('MONTH(created_at) as month, SUM(total) as total_sales')
			->from('purchase_order')
			->where('YEAR(created_at)', $currentYear)
			->group_by('MONTH(created_at)')
			->get();

		$salesData = array();
		// Process the query results
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$salesData[(int)$row->month] = (float)$row->total_sales;
			}
		}

		// Assign sales value of 0 for months without sales
		for ($month = 1; $month <= 12; $month++) {
			if (!isset($salesData[$month])) {
				$salesData[$month] = 0;
			}
		}

		// Sort the sales data array by keys (months) in ascending order
		ksort($salesData);

		// Prepare the final data format for the chart
		$finalData = array(
			'labels' => array_keys($salesData),   // Months
			'sales' => array_values($salesData)   // Sales values
		);

		return $finalData;
	}

	//chart data.
	public function getCategoryData() {
		$this->db->select('product, name, SUM(qty) as total_sold');
		$this->db->from('order_items');
		$this->db->join('product', 'product.id = order_items.product');
		$this->db->group_by('product');
		$query = $this->db->get();

		return $query->result();
	}





	public function get_orders_by_session($id = NULL)
	{
		if($id != NULL)
		{
			$this->db->where('po_id', $id);
		}

		$this->db->select('purchase_order.po_id, purchase_order.client_id, purchase_order.total, purchase_order.status, purchase_order.created_at, users.user_id, users.user_name, users.email, users.company ');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->where('client_id', $this->session->userdata('data')['user_id']);
		$this->db->order_by('purchase_order.created_at', 'DESC');

		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		#print_r($last_query);

		if($id != NULL)
		{
			return $query->row_array();
		}else
		{
			return $query->result_array();
		}

	}





	public function get_order($id)
	{
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->where('po_id', $id);

		$query = $this->db->get();


		//$last_query = $this->db->last_query();
		#print_r($last_query);

		return $query->row_array();
	}


	public function get_order_items($id)
	{
		$this->db->select('*');
		$this->db->from('order_items');
		$this->db->join('product', 'product.id = order_items.product');
		$this->db->where('p_order', $id);

		#$last_query = $this->db->last_query();
		#print_r($last_query);


		$query = $this->db->get();
		return $query->result_array();
	}



}
