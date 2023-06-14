<?php
class Categories extends MY_Controller
{
	public function view_by_category($id)
	{

		$limit = 10;

		$data['title'] = "🎥 Point Medical | Reference Videos.";
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['videos'] = $this->VideoModel->get_videos_by_category($id);
		$data['recents'] = $this->VideoModel->get_recent($limit);

		//load header, page & footer
		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('videos/category' , $data); //loading page and data
		$this->load->view('templates/main/footer_wide');
	}



	public function index()
	{

		$data['title'] = 'Categories';

		$data['categories'] = $this->CategoryModel->get_all_categories();

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/main/footer_wide');
	}



	public function create()
	{


		$data['title'] = 'Create Category';
		$data['categories'] = $this->CategoryModel->get_all_categories();

		$this->form_validation->set_rules('category_name', 'Category Name', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('categories/create', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			$this->CategoryModel->create_category();

			//set message
			$this->session->set_flashdata('message', 'Your category has been created');

			redirect(base_url() . 'admin/categories/new');
		}
	}



	public function update($id)
	{

		$data['title'] = 'Update Category';

		$data['category'] = $this->CategoryModel->get_category($id);
		$data['categories'] = $this->CategoryModel->get_all_categories();


		$this->form_validation->set_rules('category_name', 'Category Name', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('categories/edit', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			$this->CategoryModel->update_category($id);

			//set message
			$this->session->set_flashdata('message', 'Your category has been updated');

			redirect(base_url() . 'admin/categories');
		}
	}


	public function delete($id)
	{
		$data['title'] = 'Delete a Category';

		$data['category'] = $this->CategoryModel->get_category($id);
		$data['categories'] = $this->CategoryModel->get_all_categories();


		if (!isset($_POST['delete']))
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('categories/delete', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{

			$this->CategoryModel->delete_category($id);

			//set message
			$this->session->set_flashdata('message', 'Your category has been deleted');

			redirect(base_url() . 'admin/categories');
		}

	}



	public function fetch_sub_category()
	{
		if($this->input->post('category_id'))
		{
			$subcategories = $this->CategoryModel->fetch_subcategory($this->input->post('category_id'));
			//echo json_encode($subcategories);
			for ($i=0; $i < count($subcategories); $i++) {
				echo '<option value="'.$subcategories[$i]['sub_id'].'">'.$subcategories[$i]['sub_name'].'</option>';
			}
		}
	}


}
