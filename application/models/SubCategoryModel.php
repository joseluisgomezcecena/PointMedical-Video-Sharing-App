<?php
class SubCategoryModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get_all_subcategories()
	{
		$this->db->order_by('sub_name');
		$this->db->select('subcategories.*, categories.category_name');
		$this->db->from('subcategories');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_subcategory($id)
	{
		$this->db->select('subcategories.*, categories.category_name');
		$this->db->from('subcategories');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$query = $this->db->get_where('subcategories', array('sub_id' => $id));
		return $query->row_array();
	}


	public function get_subcategories_by_category($id)
	{
		$this->db->order_by('sub_name');
		$this->db->select('subcategories.*, categories.category_name');
		$this->db->from('subcategories');
		$this->db->join('categories', 'categories.category_id = subcategories.category_id');
		$query = $this->db->get_where('subcategories', array('subcategories.category_id' => $id));
		return $query->result_array();
	}


	public function create_subcategory()
	{
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'category_id' => $this->input->post('category_id'),
		);

		return $this->db->insert('subcategories', $data);
	}


	public function delete_subcategory($id)
	{
		$this->db->where('sub_id', $id);
		$this->db->delete('subcategories');
		return true;
	}


	public function update_subcategory($id)
	{
		$data = array(
			'sub_name' => $this->input->post('sub_name'),
			'category_id' => $this->input->post('category_id'),
		);

		$this->db->where('sub_id', $id);
		return $this->db->update('subcategories', $data);
	}

}
