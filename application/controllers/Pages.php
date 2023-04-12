<?php

class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}

		$limit = 10;

		$data['title'] = "🎥 Point Medical | Reference Videos.";
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['videos'] = $this->VideoModel->get_videos();
		$data['recents'] = $this->VideoModel->get_recent($limit);

		//load header, page & footer
		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('pages/' . $page, $data); //loading page and data
		$this->load->view('templates/main/footer_wide');

	}


}
