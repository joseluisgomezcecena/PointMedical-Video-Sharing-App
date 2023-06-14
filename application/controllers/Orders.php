<?php
class Orders extends MY_Controller
{

	public function create()
	{
		$user_id = $this->session->userdata['data']['user_id'];

		//get cart items
		$cart = $this->cart->contents();

		//get total
		$total = $this->cart->total();

		$order_id = $this->OrderModel->create_order($user_id, $cart, $total);

		if($order_id)
		{
			//clear cart
			$this->cart->destroy();

			//session message
			$this->session->set_flashdata('message', 'Your order has been placed.');
			redirect(base_url() . 'orders/view/' . $order_id);

			//send email


		}
		else
		{
			//session message
			$this->session->set_flashdata('errors', 'There was a problem placing your order.');
			redirect(base_url() . 'cart');
		}
	}





}
