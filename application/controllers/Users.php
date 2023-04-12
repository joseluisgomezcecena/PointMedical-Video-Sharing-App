<?php
class Users extends MY_Controller
{

	public function index()
	{
		//show all users
		$data['title'] = '🎥 Users | Point Medical Reference Videos.';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['users'] = $this->UserModel->get_users();


		$this->load->view('templates/main/header', $data);
		$this->load->view('templates/main/topnav');
		$this->load->view('templates/main/sidebar');
		$this->load->view('templates/main/wrapper');
		$this->load->view('users/index', $data); //loading page and data
		$this->load->view('templates/main/footer_wide');

	}



	public function register()
	{
		$data['title'] = 'Register users';
		$data['categories'] = $this->CategoryModel->get_videocategories();


		$this->form_validation->set_rules('user_name', 'User Name', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('user_email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_password2', 'Confirm Password', 'matches[user_password]');



		$this->form_validation->set_error_delimiters(
		//dissmissable alert
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>❌ Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);



		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('users/register', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			//Encrypt password
			$encrypted_pwd = password_hash($this->input->post('password'), PASSWORD_DEFAULT);



			$this->UserModel->register($encrypted_pwd);


			//session message
			$this->session->set_flashdata('message', 'User was successfully registered..');

			redirect(base_url() . 'users/register');
		}

	}




	public function edit($id)
	{
		$data['title'] = 'Edit User';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['user'] = $this->UserModel->get_user($id);


		$this->form_validation->set_rules('user_name', 'User Name', 'required|callback_check_username_exists_update['.$id.']');
		$this->form_validation->set_rules('user_email', 'Email', 'required|callback_check_email_exists_update['.$id.']');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_password2', 'Confirm Password', 'matches[user_password]');



		$this->form_validation->set_error_delimiters(
		//dissmissable alert
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>❌ Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);



		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('users/edit', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			//Encrypt password
			$encrypted_pwd = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);



			$this->UserModel->edit($encrypted_pwd, $id);


			//session message
			$this->session->set_flashdata('message', 'User was successfully updated..');

			redirect(base_url() . 'admin/users');
		}

	}





	public function profile()
	{
		$id = $this->session->userdata['data']['user_id'];
		$data['title'] = 'Edit Profile';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['user'] = $this->UserModel->get_user($id);



		$this->form_validation->set_rules('user_name', 'User Name', 'required|callback_check_username_exists_update['.$id.']');
		$this->form_validation->set_rules('user_email', 'Email', 'required|callback_check_email_exists_update['.$id.']');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_password2', 'Confirm Password', 'matches[user_password]');



		$this->form_validation->set_error_delimiters(
		//dissmissable alert
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>❌ Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);



		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('users/profile', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{
			//Encrypt password
			$encrypted_pwd = password_hash($this->input->post('user_password'), PASSWORD_DEFAULT);



			$this->UserModel->edit($encrypted_pwd, $id);


			//session message
			$this->session->set_flashdata('message', 'Profile was successfully updated..');

			redirect(base_url() . 'admin/profile');
		}

	}






	public function delete($id)
	{
		$data['title'] = 'Delete User';
		$data['categories'] = $this->CategoryModel->get_videocategories();
		$data['user'] = $this->UserModel->get_user($id);


		$this->form_validation->set_error_delimiters(
		//dissmissable alert
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>❌ Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);



		if( !isset($_POST['delete_user']))
		{
			$this->load->view('templates/main/header', $data);
			$this->load->view('templates/main/topnav');
			$this->load->view('templates/main/sidebar');
			$this->load->view('templates/main/wrapper');
			$this->load->view('users/delete', $data); //loading page and data
			$this->load->view('templates/main/footer');
		}
		else
		{

			$this->UserModel->delete_user($id);

			//session message
			$this->session->set_flashdata('message', 'User was successfully deleted..');

			redirect(base_url() . 'admin/users');
		}

	}





	function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists','That username is taken. Please choose a different one.');

		if($this->UserModel->check_username_exists($username))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	function check_username_exists_update($username, $id)
	{
		$this->form_validation->set_message('check_username_exists_update','That username is taken. Please choose a different one.');

		if($this->UserModel->check_username_exists_update($username, $id))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists','That email is taken. Please choose a different one.');

		if($this->UserModel->check_email_exists($email))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function check_email_exists_update($email, $id)
	{
		$this->form_validation->set_message('check_email_exists_update','That email is taken. Please choose a different one.');

		if($this->UserModel->check_email_exists_update($email,$id))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function check_phone_exists($phone)
	{
		$this->form_validation->set_message('check_phone_exists','That phone number is taken. Please choose a different one.');

		if($this->UserModel->check_phone_exists($phone))
		{
			return true;
		}
		else
		{
			return false;
		}
	}





}
