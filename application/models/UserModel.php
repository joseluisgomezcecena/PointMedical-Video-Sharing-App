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
			'user_email'=>$this->input->post('user_email'),
			'user_password'=>$encrypted_pwd,
		);

		return $this->db->insert('users', $data);
	}



	public function edit($encrypted_pwd, $id)
	{
		$data = array(
			'user_name'=>$this->input->post('user_name'),
			'user_email'=>$this->input->post('user_email'),
			'user_password'=>$encrypted_pwd,
		);

		return $this->db->update('users', $data, array('user_id'=>$id));
	}



	public function login($username, $password)
	{
		$authdb = $this->load->database('authdb', TRUE);


		$authdb->select('*');
		$authdb->from('users');
		$authdb->where('user_email', $username);
		$query = $authdb->get();

		$last_query = $authdb->last_query();
		print_r($last_query);

		$result = $query->row_array();

		if (!empty($result) && password_verify($password, $result['user_password'])) {
			return $result;
		} else {
			return false;
		}
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
		$query = $this->db->get_where('users', array('user_email' => $email));

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
		$this->db->where('user_email', $email);
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
