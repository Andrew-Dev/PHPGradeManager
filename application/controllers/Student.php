<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('student_login');
		$this->load->database();
	}
	
	public function grades()
	{
		$this->load->model('PowerSchool_model');
		$this->load->model('Grade_model');
		$transcript = $this->PowerSchool_model->getTranscript($this->input->post('username'),$this->input->post('password'));
		$grades = $this->PowerSchool_model->getGradesForStudent($this->input->post('username'),$this->input->post('password'));
		$sufficient = $this->Grade_model->areGradesSufficient($grades);
		$this->Grade_model->registerStudentIfNotRegistered($this->input->post('username'),$transcript->studentDataVOs->student);
		$data['finalGrades'] = $grades;
		$data['name'] = $transcript->studentDataVOs->student->firstName." ".$transcript->studentDataVOs->student->lastName;
		$data['gpa'] = $transcript->studentDataVOs->student->currentGPA; 
		$data['sufficient'] = $sufficient;
		$data['submitted'] = false;
		$data['submitted'] = !$this->Grade_model->storeSubmissionForStudent($sufficient,$transcript->studentDataVOs->student,$this->input->post('username'));
		$this->Grade_model->emailGradesForStudent($grades,$transcript->studentDataVOs->student);
		$this->load->view("student_grades",$data);
	}
}
