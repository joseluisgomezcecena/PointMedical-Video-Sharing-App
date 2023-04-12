<?php

class Auth extends CI_Controller{


	public function login()
	{

		$data['title'] = '🎥 Login | Point Medical Reference Videos.';
		$data['page'] = 'login';

		$this->form_validation->set_rules('username', 'User Name', 'required');
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
			$username = $this->input->post('username');
			$password = $this->input->post('password');


			$data = $this->UserModel->login($username, $password);

			if($data)
			{
				//create session
				$session_data = array(
					'data'=>$data,
					'user_name'=>$username,
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




	public function get_user($id)
	{
		$user_array  = $this->session->userdata('user_id');
		$id = $user_array['id'];
		$data['user'] = $this->UserModel->get_user($id);
	}


}
