<?php
class ProductModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_products()
	{
		$this->db->order_by('product.name');
		$this->db->select('product.*, subcategories.*, categories.*');
		$this->db->from('product');
		$this->db->join('subcategories', 'subcategories.sub_id = product.subcategory_id');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$query = $this->db->get();


		return $query->result_array();
	}


	public function get_product($id)
	{
		$this->db->order_by('product.name');
		$this->db->select('product.*, subcategories.*, categories.*');
		$this->db->from('product');
		$this->db->join('subcategories', 'subcategories.sub_id = product.subcategory_id');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$this->db->where('product.id', $id);
		$query = $this->db->get();

		return $query->row_array();
	}


	public function create_product($product_image)
	{
		$data = array(
			'number' => $this->input->post('number'),
			'name' => $this->input->post('name'),
			'subcategory_id' => $this->input->post('subcategory_id'),
			'product_price' => $this->input->post('product_price'),
			'description' => $this->input->post('description'),
			'notes'=> $this->input->post('notes'),
			'image_url' => $product_image,
		);

		$last_query = $this->db->last_query();
		print_r($last_query);

		return $this->db->insert('product', $data);
	}


	public function edit_product($id, $product_image)
	{
		$data = array(
			'number' => $this->input->post('number'),
			'name' => $this->input->post('name'),
			'subcategory_id' => $this->input->post('subcategory_id'),
			'product_price' => $this->input->post('product_price'),
			'description' => $this->input->post('description'),
			'notes'=> $this->input->post('notes'),
			'image_url' => $product_image,
		);

		$this->db->where('id', $id);
		return $this->db->update('product', $data);
	}



	public function delete_product($id)
	{
		//delete from database products table.
		$this->db->where('id', $id);
		$this->db->delete('product');


		// delete image from uploads folder.
		$query = $this->db->get_where('product', array('id' => $id));
		$row = $query->row();
		unlink("uploads/".$row['image_url']);

		return true;
	}


	// check product number exists.
	public function check_number_exists($number)
	{
		$query = $this->db->get_where('product', array('number' => $number));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}


	// check product name exists.
	public function check_product_exists($name)
	{
		$query = $this->db->get_where('product', array('name' => $name));
		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}



	// check product number exists.
	public function check_number_exists_edit($number, $id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id !=', $id);
		$this->db->where('number', $number);
		$query = $this->db->get();

		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}


	// check product name exists.
	public function check_product_exists_edit($name, $id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('id !=', $id);
		$this->db->where('name', $name);
		$query = $this->db->get();

		if(empty($query->row_array())){
			return true;
		} else {
			return false;
		}
	}




}
