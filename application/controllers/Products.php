<?php
class Products extends MY_Controller
{
	public function index()
	{

		$data['title'] = 'Products';
		$data['products'] = $this->ProductModel->get_all_products();

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('products/index', $data);
		$this->load->view('templates/main/footer_wide');
	}



	public function create()
	{
		$data['title'] = 'Create Product';
		$data['categories'] = $this->CategoryModel->get_all_categories();
		$data['subcategories'] = $this->SubCategoryModel->get_all_subcategories();

		$this->form_validation->set_rules('name', 'Product Name', 'required|callback_check_product_exists');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('number', 'Product Number', 'required|callback_check_number_exists');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('subcategory_id', 'Sub-Category', 'required');

		//error styling.
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('products/create', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			//upload image
			$this->load->helper('file');

			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$config['file_name'] =  generate_unique_filename();

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload())
			{
				$errors = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('errors', 'Error uploading image. ' . $errors['error']);
				$product_image = 'default-product.jpg';
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$product_image = $data['upload_data']['file_name'];
			}

			$this->ProductModel->create_product($product_image);
			$this->session->set_flashdata('message', 'Your product has been created');
			redirect(base_url() . 'admin/products/new');
		}
	}


	public function edit($id)
	{

		$data['title'] = 'Edit Product';
		$data['product'] = $this->ProductModel->get_product($id);
		$data['categories'] = $this->CategoryModel->get_all_categories();
		$data['subcategories'] = $this->SubCategoryModel->get_all_subcategories();

		if (empty($data['product']))
		{
			show_404();
		}

		$this->form_validation->set_rules('name', 'Product Name', 'required|callback_check_product_exists_edit['.$id.']');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('number', 'Product Number', 'required|callback_check_number_exists_edit['.$id.']');
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('subcategory_id', 'Sub-Category', 'required');

		//error styling.
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('products/edit', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{

			//check if file input is empty.
			if (empty($_FILES['userfile']['name']))
			{
				$product_image = $data['product']['image_url'];
			}
			else
			{
				$this->load->helper('file');
				//upload image
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';
				$config['file_name'] =  generate_unique_filename();

				$this->load->library('upload', $config);
				$this->upload->initialize($config);



				if(!$this->upload->do_upload())
				{
					$errors = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('errors', 'Error uploading image. ' . $errors['error']);
					$product_image = 'default-product.jpg';
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$product_image = $data['upload_data']['file_name'];
				}
			}

			$this->ProductModel->edit_product($id, $product_image);
			$this->session->set_flashdata('message', 'Your product has been updated');
			redirect(base_url() . 'admin/products/edit/' . $id);
		}
	}



	public function view($id)
	{
		$data['title'] = 'View Product';
		$data['product'] = $this->ProductModel->get_product($id);

		if (empty($data['product']))
		{
			show_404();
		}

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar', $data);
		$this->load->view('templates/main/wrapper');
		$this->load->view('products/view', $data);
		$this->load->view('templates/main/footer_wide');
	}




	public function delete($id)
	{
		$data['title'] = 'Delete Product';
		$data['product'] = $this->ProductModel->get_product($id);
		$data['categories'] = $this->CategoryModel->get_all_categories();
		$data['subcategories'] = $this->SubCategoryModel->get_all_subcategories();

		if (empty($data['product']))
		{
			show_404();
		}

		//error styling.
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');


		if (!isset($_POST['delete']))
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar', $data);
			$this->load->view('templates/main/wrapper');
			$this->load->view('products/delete', $data);
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			$this->ProductModel->delete_product($id);
			$this->session->set_flashdata('message', 'Your product was deleted.');
			redirect(base_url() . 'admin/products/');
		}
	}




	//check if product exists
	public function check_product_exists($name)
	{
		$this->form_validation->set_message('check_product_exists', 'That product name is already taken. Please choose a different one');
		if ($this->ProductModel->check_product_exists($name))
		{
			return true;
		}
		else
		{
			return false;
		}
	}




	//check if product number exists
	public function check_number_exists($number)
	{
		$this->form_validation->set_message('check_number_exists', 'That product number is already taken. Please choose a different one');
		if ($this->ProductModel->check_number_exists($number)) {
			return true;
		} else {
			return false;
		}
	}



	//check if product exists
	public function check_product_exists_edit($name, $id)
	{
		$this->form_validation->set_message('check_product_exists', 'That product name is already taken. Please choose a different one');
		if ($this->ProductModel->check_product_exists_edit($name, $id))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	//check if product number exists
	public function check_number_exists_edit($number, $id)
	{
		$this->form_validation->set_message('check_number_exists', 'That product number is already taken. Please choose a different one');
		if ($this->ProductModel->check_number_exists_edit($number,$id)) {
			return true;
		} else {
			return false;
		}
	}


}
