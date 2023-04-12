<?php
class CategoryModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_videocategories()
	{
		$this->db->select('*');
		$this->db->from('videos');
		$this->db->join('category', 'videos.category_id = category.category_id');
		$this->db->group_by('category.category_name');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_all_categories()
	{
		$this->db->order_by('category_name');
		$query = $this->db->get('category');
		return $query->result_array();
	}


	public function get_category($id)
	{
		$query = $this->db->get_where('category', array('category_id' => $id));
		return $query->row_array();
	}

	public function create_category()
	{
		$data = array(
			'category_name' => $this->input->post('category_name'),
		);

		return $this->db->insert('category', $data);
	}

	public function delete_category($id)
	{
		$this->db->where('category_id', $id);
		$this->db->delete('category');
		return true;
	}

	public function update_category($id)
	{
		$data = array(
			'category_name' => $this->input->post('category_name'),
		);

		$this->db->where('category_id', $id);
		return $this->db->update('category', $data);
	}





}
