<?php

class Cart extends MY_Controller
{

	public function index() {
		$data['products'] = $this->ProductModel->get_all_products();
		$this->load->view('cart', $data);
	}


	public function add_to_cart()
	{
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$product = $this->ProductModel->get_product($product_id);

		$cart_data = array(
			'id'      => $product['id'],
			'name'    => $product['name'],
			'price'   => $product['product_price'],
			'qty'     => $quantity
		);

		$this->cart->product_name_rules = '[:print:]'; //adding this line solved the problem for special characters.

		$this->cart->insert($cart_data);

		echo json_encode(array('status' => 'success'));
	}



	public function remove_from_cart() {
		$row_id = $this->input->post('row_id');
		$data = array(
			'rowid' => $row_id,
			'qty'   => 0
		);

		$this->cart->update($data);

		echo json_encode(array('status' => 'success'));
	}


	public function update_cart() {
		$row_id = $this->input->post('row_id');
		$quantity = $this->input->post('quantity');

		// Update the quantity of the cart item
		$data = array(
			'rowid' => $row_id,
			'qty' => $quantity
		);

		$this->cart->update($data);

		echo 'Cart updated successfully!';
	}



	/*
	public function get_cart_table() {
		$data['cart_items'] = $this->cart->contents();
		$this->load->view('cart_table', $data);
	}
	*/
	public function get_cart_table() {
		$cart_items = $this->cart->contents();

		$html = '<table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400" id="cart-table">';
		$html .= '<thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">';
		$html .= '<tr>';
		$html .= '<th scope="col" class="px-6 py-3 rounded-l-lg">Name</th>';
		$html .= '<th scope="col" class="px-6 py-3">Price</th>';
		$html .= '<th scope="col" class="px-6 py-3 ">Quantity</th>';
		$html .= '<th scope="col" class="px-6 py-3 ">Subtotal</th>';
		$html .= '<th scope="col" class="px-6 py-3 rounded-r-lg">Action</th>';
		$html .= '</tr>';
		$html .= '</thead>';
		$html .= '<tbody class="bg-white divide-y divide-gray-200">';

		foreach ($cart_items as $item) {
			$html .= '<tr>';
			$html .= '<td>'.$item['name'].'</td>';
			$html .= '<td>'.$item['price'].'</td>';
			$html .= '<td>';
			$html .= '<input style="width:100px;" type="number" min="1" value="'.$item['qty'].'" class="quantity bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-2">';
			$html .= '<a href="#" class="update-cart" data-row-id="'.$item['rowid'].'">Update</a>';
			$html .= '</td>';
			$html .= '<td>'.$item['subtotal'].'</td>';
			$html .= '<td>';
			$html .= '<a href="#" class="remove-from-cart" data-row-id="'.$item['rowid'].'">Remove</a>';
			$html .= '</td>';
			$html .= '</tr>';
		}
		$html .= '</tbody>';

		$html .= '<tfoot>';
			$html .= '<tr>';
			$html .= '<td colspan="3"></td>';
			$html .= '<td><strong>Total:</strong></td>';
			$html .= '<td>'. $this->cart->total() .'</td>';
			$html .= '</tr>';
		$html .= '</tfoot>';


		$html .= '</table>';

		echo $html;
	}



	public function count_cart_items() {
		echo $this->cart->total_items();
	}


	public function clear_cart() {
		$this->cart->destroy();
		echo json_encode(array('status' => 'success'));
	}





}
