<?php
class Adminorders extends MY_Controller
{
	public function index()
	{
		$data['title'] = 'Avanti - Orders';
		$data['orders'] = $this->OrderModel->get_orders();

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('orders/index', $data); //loading page and data
		$this->load->view('templates/main/footer');
	}


	public function cancelledorders()
	{
		$data['title'] = 'Avanti - Orders';
		$data['orders'] = $this->OrderModel->get_cancelled();

		$this->load->view('templates/main/header',$data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('orders/cancelled', $data); //loading page and data
		$this->load->view('templates/main/footer');
	}

	public function details($id)
	{
		$data['title'] = 'Avanti - Order Details';
		$data['order'] = $this->OrderModel->get_order($id);
		$data['order_items'] = $this->OrderModel->get_order_items($id);

		if (!isset($_POST['update']))
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('orders/details', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			$this->OrderModel->update_order($id);
			$this->session->set_flashdata('success', 'Order updated successfully.');
			redirect(base_url() . 'adminorders/index/' . $id);
		}


	}


	public function delete($id)
	{
		$data['title'] = 'Avanti - Delete Order';
		$data['order'] = $this->OrderModel->get_order($id);
		$data['order_items'] = $this->OrderModel->get_order_items($id);

		if (!isset($_POST['delete']))
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('orders/delete', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			$this->OrderModel->delete_order($id);
			$this->session->set_flashdata('success', 'Order deleted successfully.');
			redirect(base_url() . 'adminorders/index/' . $id);
		}


	}


	public function cancel($id)
	{
		$data['title'] = 'Avanti - Order Details';
		$data['order'] = $this->OrderModel->get_order($id);
		$data['order_items'] = $this->OrderModel->get_order_items($id);

		if (!isset($_POST['cancel']))
		{

			$this->load->view('templates/main/header',$data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('orders/cancel', $data); //loading page and data
			$this->load->view('templates/main/footer');

		}
		else
		{
			$this->OrderModel->cancel_order($id);
			$this->session->set_flashdata('success', 'Order cancelled successfully.');
			redirect(base_url() . 'adminorders/index/' . $id);
		}


	}



}
