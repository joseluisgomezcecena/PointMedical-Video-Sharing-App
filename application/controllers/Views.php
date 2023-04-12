<?php
class Views extends CI_Controller
{
	public function record()
	{
		$video_id = $this->input->post('video_id');
		$this->ViewModel->record($video_id);
	}

	public function get($video_id)
	{
		$views = $this->ViewModel->get($video_id);
		echo $views;
	}

}
