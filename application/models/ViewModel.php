<?php
class ViewModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function record($video_id)
	{
		$this->db->insert('views', array('video_id'=>$video_id));

		//add one to video views
		$this->db->where('video_id', $video_id);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('videos');




	}

	public function get($video_id)
	{
		$this->db->where('video_id', $video_id);
		$this->db->from('views');
		return $this->db->count_all_results();
	}

}
