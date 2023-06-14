<?php
class CategoryModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}


	public function get_all_categories()
	{
		$this->db->order_by('category_name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}


	public function get_category($id)
	{
		$query = $this->db->get_where('categories', array('category_id' => $id));
		return $query->row_array();
	}


	public function create_category()
	{
		$data = array(
			'category_name' => $this->input->post('category_name'),
		);

		return $this->db->insert('categories', $data);
	}


	public function delete_category($id)
	{
		$this->db->where('category_id', $id);
		$this->db->delete('categories');
		return true;
	}

	public function update_category($id)
	{
		$data = array(
			'category_name' => $this->input->post('category_name'),
		);

		$this->db->where('category_id', $id);
		return $this->db->update('categories', $data);
	}

	public function fetch_subcategory($id)
	{
		$this->db->where('category_id', $id);
		$query = $this->db->get('subcategories');
		return $query->result_array();
	}

}
