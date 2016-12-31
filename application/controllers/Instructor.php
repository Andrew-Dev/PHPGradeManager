<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        if($this->session->userdata('loggedin') != TRUE && $this->uri->segment(2) != "logIn" && $this->uri->segment(2) != "processLogin")
        {
			redirect('/Instructor/logIn', 'refresh');
        }
        // Your own constructor code
    }
	public function logIn()
	{
		$this->load->helper('form');
		$this->load->view('admin/login');
	}
	public function processLogIn()
	{
		$this->load->model('Admin_model');
        $this->load->helper('url');
		if($this->Admin_model->authenticate($this->input->post('email'),$this->input->post('password')))
		{
			redirect('/Instructor/dashboard', 'refresh');
		}
		else
		{
			$this->load->helper('form');
			$this->load->view('admin/login',array("invalid" => true));
		}
	}
	public function logOut()
	{
		session_destroy();
		$this->load->helper('url');
		redirect('/Instructor/logIn', 'refresh');
	}
	public function dashboard()
	{
		$this->load->model('Grade_model');
		$students = $this->Grade_model->getStudents();
		$data["students"] = $students;
		$data["averageGPA"] = $this->Grade_model->getAverageGPA();
		$this->load->view('admin/dashboard',$data);
	}
	public function student()
	{
		$this->load->helper('url');
		$this->load->model('Grade_model');
		$studentUsername = $this->uri->segment(3);
		$submissions = $this->Grade_model->getGradeHistoryForStudentUsername($studentUsername);
		$student = $this->Grade_model->getStudent($studentUsername);
		$data["submissions"] = $submissions;
		$data["student"] = $student;
		$this->load->view('admin/student',$data);
	}
	public function instructors()
	{
		$this->load->model('Admin_model');
		$instructors = $this->Admin_model->getInstructors();
		$data["instructors"] = $instructors;
		$this->load->view('admin/instructors',$data);
	}
	public function addInstructor()
	{
		$this->load->model('Admin_model');
        $this->load->helper('url');
		$this->Admin_model->register($this->input->post('email'),$this->input->post('password'));
		redirect('/Instructor/instructors', 'refresh');
	}
}