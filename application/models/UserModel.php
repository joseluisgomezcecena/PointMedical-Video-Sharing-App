<?php

class UserModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function register($encrypted_pwd)
	{
		$data = array(
			'user_name'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email'),
			'password'=>$encrypted_pwd,
			'phone'=>$this->input->post('phone'),
			'company'=>$this->input->post('company'),
			'address'=>$this->input->post('address'),
		);
		return $this->db->insert('users', $data);
	}



	public function edit($encrypted_pwd, $id)
	{
		$data = array(
			'user_name'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email'),
			'password'=>$encrypted_pwd,
			'phone'=>$this->input->post('phone'),
			'company'=>$this->input->post('company'),
			'address'=>$this->input->post('address'),
			'staff'=>$this->input->post('staff'),
		);

		return $this->db->update('users', $data, array('user_id'=>$id));
	}





	public function login($email, $password)
	{

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();

		$last_query = $this->db->last_query();
		print_r($last_query);

		$result = $query->row_array();

		if (!empty($result) && password_verify($password, $result['password']))
		{
			return $result;
		}
		else
		{
			return false;
		}
	}


	public function forgot_password_check($email)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		$result = $query->row_array();

		if (!empty($result))
		{
			return $result;
		}
		else
		{
			return false;
		}
	}



	public function update_password($encrypted_pwd, $id)
	{
		$data = array(
			'password'=>$encrypted_pwd,
		);

		return $this->db->update('users', $data, array('user_id'=>$id));
	}




	public function delete_user($id)
	{
		$this->db->delete('users', array('user_id' => $id));
	}


	public function get_user($id)
	{
		$query = $this->db->get_where('users', array('user_id'=>$id));
		return $query->row_array();
	}




	public function get_users()
	{
		$this->db->order_by('user_id', 'DESC');
		$query = $this->db->get('users');
		return $query->result_array();
	}






	public function check_username_exists($username)
	{
		$query = $this->db->get_where('users', array('user_name' => $username));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_phone_exists($phone)
	{
		$query = $this->db->get_where('users', array('phone' => $phone));

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}




	public function check_username_exists_update($username, $id)
	{

		//check if username exists with different id
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_name', $username);
		$this->db->where('user_id !=', $id);
		$query = $this->db->get();


		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function check_email_exists_update($email, $id)
	{


		//check if username exists with different id
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$this->db->where('user_id !=', $id);
		$query = $this->db->get();



		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	public function check_phone_exists_update($phone, $id)
	{
		//check if username exists with different id
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('phone', $phone);
		$this->db->where('user_id !=', $id);
		$query = $this->db->get();

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}
