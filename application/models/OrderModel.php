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



	public function get_orders()
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->join('users', 'users.user_id = orders.user_id');
		$this->db->order_by('date', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
	}




	public function get_orders_by_session($id = NULL)
	{
		if($id != NULL)
		{
			$this->db->where('po_id', $id);
		}

		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->join('users', 'users.user_id = purchase_order.client_id');
		$this->db->where('client_id', $this->session->userdata('data')['user_id']);
		$this->db->order_by('purchase_order.created_at', 'DESC');

		$query = $this->db->get();
		return $query->result_array();
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
