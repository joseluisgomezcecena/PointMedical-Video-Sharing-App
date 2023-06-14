<?php
class Subcategories extends CI_Controller
{


	public function index()
	{

		$data['title'] = 'Sub-Categories';

		$data['subcategories'] = $this->SubCategoryModel->get_all_subcategories();
		$data['categories'] = $this->CategoryModel->get_all_categories();

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('subcategories/index', $data);
		$this->load->view('templates/main/footer_wide');
	}



	public function create()
	{

		$data['title'] = 'Create Category';
		$data['categories'] = $this->CategoryModel->get_all_categories();

		$this->form_validation->set_rules('sub_name', 'Sub-Category Name', 'required');
		$this->form_validation->set_rules('category_id', 'Parent Category Name', 'required');


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('subcategories/create', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			$this->SubCategoryModel->create_subcategory();

			//set message
			$this->session->set_flashdata('message', 'Your subcategory has been created');

			redirect(base_url() . 'admin/subcategories/new');
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

}
