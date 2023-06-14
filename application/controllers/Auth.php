<?php

class Auth extends CI_Controller{


	public function login()
	{
		$data['title'] = 'Avanti - Login';

		$this->form_validation->set_rules('email', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>❌ Authentication Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('auth/login', $data); //loading page and data
			$this->load->view('templates/main/footer_wide');
		}
		else
		{
			//Encrypt password
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$data = $this->UserModel->login($email, $password);

			if($data)
			{
				//create session
				$session_data = array(
					'data'=>$data,
					'email'=>$email,
					'logged_in'=>true,
				);

				$this->session->set_userdata($session_data);


				//session message
				$this->session->set_flashdata('message', "You are now logged in");
				redirect(base_url() . 'home');
			}
			else
			{
				//session message
				$this->session->set_flashdata('errors', 'Incorrect username and password combination.');
				redirect(base_url() . 'auth/login');
			}
		}

	}



	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('data');
		$this->session->unset_userdata('user_name');

		//session message
		$this->session->set_flashdata('message', 'You have logged out.');
		redirect(base_url());
	}




	public function forgot()
	{
		$data['title'] = 'Avanti - Forgot Password';

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong> Error: &nbsp;</strong>',
			'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>'
		);

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/main/header',$data);
			$this->load->view('auth/forgot', $data); //loading page and data
			$this->load->view('templates/main/footer_wide');
		}
		else {
			//Encrypt password
			$email = $this->input->post('email');

			$data = $this->UserModel->forgot_password_check($email);

			if($data)
			{
				//create a random key with 10 digits.
				$key = random_string('alnum', 10);
				//encrypt the key.
				$encrypted_pwd = password_hash($key, PASSWORD_DEFAULT);

				//update the password in the database.
				$this->UserModel->update_password($encrypted_pwd, $data['user_id']);

				//send the email with the key.



				$this->session->set_flashdata('message', "We sent an email with further instructions to restore your password.");
			}
			else
			{
				$this->session->set_flashdata('errors', "We couldn't find this email in our records, please try another email.");
			}


		}
	}


	public function get_user($id)
	{
		$user_array  = $this->session->userdata('user_id');
		$id = $user_array['id'];
		$data['user'] = $this->UserModel->get_user($id);
	}


}
