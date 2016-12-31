<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function authenticate($email,$password)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where('email', $email);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
        	if(password_verify($password, $row->password))
        	{
	        	$this->load->library('session');
				$this->session->set_userdata(array("loggedin" => TRUE,"email" => $email));
	        	return true;
        	}
		}
		return false;
	}
	
	public function register($email,$password)
	{
		$this->load->database();
		$data = array(
			'email' => $email,
			'password' => password_hash($password, PASSWORD_BCRYPT)
		);
		$this->db->insert('admins',$data);
	}
	
	public function getInstructors()
	{
		$this->load->database();
		$this->db->select('email');
		$this->db->from('admins');
		$query = $this->db->get();
		$data = array();
		foreach ($query->result() as $row)
		{
        	array_push($data, $row);
		}
		return $data;
	}
	
	public function remove()
	{
		
	}
}