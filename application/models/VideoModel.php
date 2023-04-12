<?php
class VideoModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function count_videos()
	{
		$query = $this->db->query("SELECT COUNT(video_id) as count FROM videos");
		$result = $query->row();
		return $result->count;

		//print last query
		//echo $this->db->last_query();
	}


	public function get_videos()
	{
		$query = $this->db->get('videos');
		return $query->result_array();
	}


	public function get_videos_by_id($id)
	{
		$query = $this->db->get_where('videos', array('video_id'=>$id));
		return $query->row_array();
	}


	public function get_videos_by_user($id)
	{
		$query = $this->db->get_where('videos', array('video_user_id'=>$id));
		return $query->result_array();
	}


	public function get_videos_by_category($id)
	{
		$query = $this->db->get_where('videos', array('category_id'=>$id));
		return $query->result_array();
	}


	public function get_recent($limit)
	{
		$this->db->order_by('video_id', 'DESC');
		$this->db->limit($limit);
		$query = $this->db->get('videos');
		return $query->result_array();
	}


	public function get_videos_by_tag($id)
	{
		$query = $this->db->get_where('videos', array('video_tag_id'=>$id));
		return $query->result_array();
	}


	public function get_videos_by_search($search)
	{
		$this->db->like('video_title', $search);
		$query = $this->db->get('videos');
		return $query->result_array();
	}


	public function create_video($video_data)
	{
		$data = array(
			'video_title' => $this->input->post('video_title'),
			'document_no' => $this->input->post('document_no'),
			'video_description' => $this->input->post('video_description'),
			'category_id' => $this->input->post('video_category_id'),
			'video_url' => $video_data,
			'screenshot_url' => $video_data . '.jpg',
		);
		$this->db->insert('videos', $data);
	}



	public function update_video($video_data, $id)
	{
		$data = array(
			'video_title' => $this->input->post('video_title'),
			'document_no' => $this->input->post('document_no'),
			'video_description' => $this->input->post('video_description'),
			'category_id' => $this->input->post('video_category_id'),
			'video_url' => $video_data,
			'screenshot_url' => $video_data . '.jpg',
		);
		$this->db->where('video_id', $id);
		$this->db->update('videos', $data);

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}



	public function delete_video($id)
	{
		$this->db->where('video_id', $id);
		$this->db->delete('videos');

	}




	public function check_document_no_exists($document_no)
	{
		$query = $this->db->get_where('videos', array('video_document_no' => $document_no));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



}
