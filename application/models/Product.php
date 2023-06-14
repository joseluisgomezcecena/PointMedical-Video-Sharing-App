<?php
class Product extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_products()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('subcategories', 'subcategories.sub_id = products.subcategory_id');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$this->db->order_by('products.product_id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_product($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('subcategories', 'subcategories.sub_id = products.subcategory_id');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$this->db->where('products.product_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function get_products_by_subcategory($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('subcategories', 'subcategories.sub_id = products.subcategory_id');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$this->db->where('products.subcategory_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function create_product($product_image)
	{
		$data = array(
			'product_name' => $this->input->post('product_name'),
			'product_description' => $this->input->post('product_description'),
			'product_image' => $product_image,
			'product_price' => $this->input->post('product_price'),
			'product_quantity' => $this->input->post('product_quantity'),
			'subcategory_id' => $this->input->post('subcategory_id')
		);
		return $this->db->insert('products', $data);
	}


}
