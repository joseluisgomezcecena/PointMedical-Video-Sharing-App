<?php
class Videos extends CI_Controller
{
	public function view($video_id)
	{

		$data['video'] = $this->VideoModel->get_videos_by_id($video_id);

		//check if video exists
		if(!$this->VideoModel->get_videos_by_id($video_id))
		{
			show_404();
		}

		$video_title = $data['video']['video_title'];

		$limit = 5;
		$data['title'] = "🎥 " . $video_title ;
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['recents'] = $this->VideoModel->get_recent($limit);
		$data['views'] = $this->ViewModel->get($video_id);

		//load header, page & footer
		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('videos/view',  $data); //loading page and data
		$this->load->view('templates/main/footer_wide');

	}
}
