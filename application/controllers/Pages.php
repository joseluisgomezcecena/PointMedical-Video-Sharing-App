<?php

class Pages extends CI_Controller
{
	public function view($page = 'home')
	{

		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}

		$data['title'] = "Avanti Manufacturing - " . ucfirst($page);
		$data['products'] = $this->ProductModel->get_all_products();

		//check if user is logged in.
		if($this->session->userdata('logged_in'))
		{
			$data['user_id'] = $this->session->userdata('data')['user_id'];
			$data['orders'] = $this->OrderModel->get_orders_by_session();

		}

		//load header, page & footer
		$this->load->view('templates/header',$data);
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}



	public function details($id)
	{
		$data['title'] = 'Product Details';
		$data['product'] = $this->ProductModel->get_product($id);

		$this->load->view('templates/header',$data);
		$this->load->view('pages/details', $data);
		$this->load->view('templates/footer');
	}



	public function order_confirmation($id)
	{
		//check if user is logged in
		if(!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('errors', 'You must be logged in to place an order.');
			redirect(base_url() . 'auth/login');
		}

		$data['order'] = $this->OrderModel->get_order($id);
		$data['order_items'] = $this->OrderModel->get_order_items($id);

		$data['title'] = 'Order Confirmation';
		$data['product'] = $this->ProductModel->get_product($id);

		$this->load->view('templates/header',$data);
		$this->load->view('pages/confirmation', $data);
		$this->load->view('templates/footer');
	}



	public function order($id)
	{
		//check if user is logged in
		if(!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('errors', 'You must be logged in to place an order.');
			redirect(base_url() . 'auth/login');
		}


		$data['order'] = $this->OrderModel->get_orders_by_session($id);

		if ($data['order'] == NULL)
		{
			show_404();
		}

		$data['order_items'] = $this->OrderModel->get_order_items($id);

		$data['title'] = 'Order Confirmation';
		$data['product'] = $this->ProductModel->get_product($id);

		$this->load->view('templates/header',$data);
		$this->load->view('pages/order', $data);
		$this->load->view('templates/footer');
	}


	public function previous_orders()
	{
		$data['title'] = "Avanti Manufacturing - My Previous Orders.";

		//check if user is logged in.
		if($this->session->userdata('logged_in'))
		{
			$data['user_id'] = $this->session->userdata('data')['user_id'];
			$data['orders'] = $this->OrderModel->get_orders_by_session();


			//load header, page & footer
			$this->load->view('templates/header',$data);
			$this->load->view('pages/previous-orders', $data);
			$this->load->view('templates/footer');

		}
		else
		{
			redirect(base_url() . 'auth/login');
		}
	}


}
