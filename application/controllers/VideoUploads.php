<?php
class VideoUploads extends MY_Controller
{

	public function index(){
		$data['title'] = 'Upload Video';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['options'] = $this->CategoryModel->get_all_categories();
		$data['videos'] = $this->VideoModel->get_videos();


		$this->load->view('templates/main/header', $data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('uploads/index', $data); //loading page and data
		$this->load->view('templates/main/footer_wide');
	}


	public function create()
	{

		$data['title'] = 'Upload Video';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['options'] = $this->CategoryModel->get_all_categories();


		$this->form_validation->set_rules('video_title', 'Video Title', 'required');
		$this->form_validation->set_rules('video_description', 'Video Description', 'required');
		$this->form_validation->set_rules('document_no', 'Document Number', 'required');
		$this->form_validation->set_rules('video_category_id', 'Video Category', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('uploads/create', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			echo "hello";

			//Upload Image

			$config['upload_path'] = "./assets/uploads/";
			$config['allowed_types'] = 'mp4|avi|flv|wmv|mov|3gp|mkv';
			$config['max_size'] = '602400';
			$config['max_width'] = '10240';
			$config['max_height'] = '7680';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			if (!$this->upload->do_upload('userfile'))
			{
				$errors = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('errors', 'Error uploading video. ' . $errors['error']);
				$post_image = 'noimage.jpg';
				redirect(base_url() . 'admin/uploads/new');
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$post_image = $this->upload->data('file_name');
				//$post_image = $_FILES['userfile']['name'];

				//compress video with ffmpeg
				$video_path = './assets/uploads/' . $post_image;
				$compressed_video_path = './assets/uploads/compressed/' . $post_image;
				$command = "d:/xampp/htdocs/pointmedicalvideos/assets/uploads/ffmpeg/bin/ffmpeg.exe -i $video_path -vcodec libx264 -crf 23 -preset medium $compressed_video_path";
				shell_exec($command);



				//create thumbnail
				$thumbnail_path = './assets/uploads/screenshots/' . $post_image . '.jpg';
				$command = "d:/xampp/htdocs/pointmedicalvideos/assets/uploads/ffmpeg/bin/ffmpeg.exe -i $video_path -ss 00:00:01.000 -vframes 1 $thumbnail_path";
				shell_exec($command);


				//delete original video
				$delete_video = unlink($video_path);

				//rename compressed video
				$rename_video = rename($compressed_video_path, $video_path);

			}

			$this->VideoModel->create_video($post_image);

			//session message
			$this->session->set_flashdata('message', 'Video has been uploaded.');
			redirect(base_url() . 'admin/uploads/new');

		}

	}



	public function edit($id)
	{

		$data['title'] = 'Update a Video';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['options'] = $this->CategoryModel->get_all_categories();
		$data['video'] = $this->VideoModel->get_videos_by_id($id);
		$data['video_category'] = $data['video']['category_id'];
		$video_title = $data['video']['video_title'];


		$this->form_validation->set_rules('video_title', 'Video Title', 'required');
		$this->form_validation->set_rules('video_description', 'Video Description', 'required');
		$this->form_validation->set_rules('document_no', 'Document Number', 'required');
		$this->form_validation->set_rules('video_category_id', 'Video Category', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('uploads/edit', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			echo "hello";

			//Upload Image
			$config['upload_path'] = "./assets/uploads/";
			$config['allowed_types'] = 'mp4|avi|flv|wmv|mov|3gp|mkv';
			$config['max_size'] = '602400';
			$config['max_width'] = '10240';
			$config['max_height'] = '7680';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);


			//check if file input is not empty
			if (!empty($_FILES['userfile']['name']))
			{
				if (!$this->upload->do_upload('userfile'))
				{
					$errors = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('errors', 'Error uploading video. ' . $errors['error']);
					$post_image = 'noimage.jpg';
					redirect(base_url() . 'admin/uploads/new');
				}
				else
				{
					//unlink old video
					$old_video = $data['video']['video_url'];
					$delete_old_video = unlink('./assets/uploads/' . $old_video);
					$delete_old_thumbnail = unlink('./assets/uploads/screenshots/' . $old_video . '.jpg');


					$data = array('upload_data' => $this->upload->data());
					$post_image = $this->upload->data('file_name');



					//compress video with ffmpeg
					$video_path = './assets/uploads/' . $post_image;
					$compressed_video_path = './assets/uploads/compressed/' . $post_image;
					$command = "d:/xampp/htdocs/pointmedicalvideos/assets/uploads/ffmpeg/bin/ffmpeg.exe -i $video_path -vcodec libx264 -crf 23 -preset medium $compressed_video_path";
					shell_exec($command);



					//create thumbnail
					$thumbnail_path = './assets/uploads/screenshots/' . $post_image . '.jpg';
					$command = "d:/xampp/htdocs/pointmedicalvideos/assets/uploads/ffmpeg/bin/ffmpeg.exe -i $video_path -ss 00:00:01.000 -vframes 1 $thumbnail_path";
					shell_exec($command);


					//delete original video
					$delete_video = unlink($video_path);

					//rename compressed video
					$rename_video = rename($compressed_video_path, $video_path);

				}
			}
			else
			{
				$post_image = $data['video']['video_url'];
			}




			$this->VideoModel->update_video($post_image, $id);

			$this->session->set_flashdata('message',  $video_title . ' video has been updated.');
			//session message
			redirect(base_url() . 'admin/uploads');

		}

	}




	public function delete($id)
	{
		$data['title'] = 'Delete Video';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['options'] = $this->CategoryModel->get_all_categories();
		$data['video'] = $this->VideoModel->get_videos_by_id($id);
		$data['video_category'] = $data['video']['category_id'];
		$video_title = $data['video']['video_title'];


		if (isset($_POST['delete_video']))
		{
			$video = $this->VideoModel->get_videos_by_id($id);
			$video_url = $video['video_url'];
			$delete_video = unlink('./assets/uploads/' . $video_url);
			$delete_thumbnail = unlink('./assets/uploads/screenshots/' . $video_url . '.jpg');

			$this->VideoModel->delete_video($id);

			//session message
			$this->session->set_flashdata('message', $video_title . ' video was deleted.');
			redirect(base_url() . 'admin/uploads');
		}
		else
		{
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('uploads/delete', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}

	}



	public function check_document_no_exists($document_no)
	{
		$this->form_validation->set_message('check_document_no_exists', 'That document number is taken. Please choose a different one or update this document.');

		if ($this->VideoModel->check_document_no_exists($document_no))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
