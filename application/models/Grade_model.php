<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include FCPATH . 'vendor/autoload.php';

class Grade_model extends CI_Model
{
	public function areGradesSufficient($finalGrades)
	{
		$badGrades = array();
		foreach($finalGrades as $course => $grade)
		{
			$targets = array('C-', 'D','E','F');

			foreach($targets as $t)
			{
			    if (strpos($grade->grade,$t) !== false) {
			        return false;
			    }
			}
		}	
		return true;
	}
	
	public function registerStudentIfNotRegistered($username,$student)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('username', $username);
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
        	return;
		}
		
		$data = array(
			'firstName' => $student->firstName,
			'lastName' => $student->lastName,
			'username' => $username
		);
		$this->db->insert('students',$data);
	}
	
	public function storeSubmissionForStudent($isSufficient,$student,$username)
	{
		/*$this->load->database();
		$this->db->select('*');
		$this->db->from('submissions');
		$this->db->set('date', 'NOW()', FALSE);
		$dateQuery = $this->db->get();
		$shouldStop = false;
		foreach ($dateQuery->result() as $row)
		{
        	$shouldStop = true;
		}
		if($shouldStop == true)
		{
			return false;
		}*/
		$data = array(
			'username' => $username,
			'gpa' => $student->currentGPA,
			'sufficient' => $isSufficient
		);
		$this->db->set('date', 'NOW()', FALSE);
		$this->db->insert('submissions',$data);
		return true;
	}
		
	public function getGradeHistoryForStudentUsername($username)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('submissions');
		$this->db->where('username', $username);
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get();
		$data = array();
		foreach ($query->result() as $row)
		{
        	array_push($data, $row);
		}
		return $data;
	}
	
	public function getCurrentStudentSubmission($username)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('submissions');
		$this->db->where('username',$username);
		$this->db->order_by('id', 'DESC');	
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
        	return $row;
		}
	}
	
	public function getStudent($username)
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('username',$username);
		$query = $this->db->get();
		foreach ($query->result() as $row)
		{
        	return $row;
		}
	}
	
	public function getStudents()
	{
		$this->load->database();
		$this->db->select('*');
		$this->db->from('students');
		
		$query = $this->db->get();
		$CI =& get_instance();
		$data = array();
		foreach ($query->result() as $row)
		{
        	$submission = $CI->Grade_model->getCurrentStudentSubmission($row->username);
        	$student["username"] = $row->username;
        	$student["firstName"] = $row->firstName;
        	$student["lastName"] = $row->lastName;
        	$student["submission"] = $submission;
        	array_push($data,$student);
		}
		return $data;
	}
	
	public function getAverageGPA()
	{
		$CI =& get_instance();
		$students = $CI->Grade_model->getStudents();
		$gpas = array();
		foreach($students as $student)
		{
			array_push($gpas, $student["submission"]->gpa);
		}
		$sum = array_sum($gpas);
		$amount = count($gpas);
		$average = $sum/$amount;
		return $average;
	}
	
	public function emailGradesForStudent($grades,$student)
	{
		$this->load->library('email');
		$this->email->from("gradereport@example.com","Grade Report");
		$this->email->to("YOUR_EMAIL_ADDRESS_HERE");
		
		$this->email->subject("Grade report for ".$student->firstName." ".$student->lastName);
		
		$message = "Student: ".$student->firstName." ".$student->middleName." ".$student->lastName." - GPA: ".$student->currentGPA."\n\n";
		
		if($this->areGradesSufficient($grades))
		{
			$message = "This student's grades are sufficient!\n\n".$message;
		}
		
		foreach($grades as $course => $grade)
		{
			$message = $message.$course.": ".$grade->grade." ".$grade->percent."%\n";
		}	
				
		$this->email->message($message);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();*/
	}
}
