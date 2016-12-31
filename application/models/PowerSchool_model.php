<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include FCPATH . 'vendor/autoload.php';

class PowerSchool_model extends CI_Model
{
	    public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
                
        public function getTranscript($username,$password)
        {
	        $student;
	        try {
			    $student = PowerAPI\PowerAPI::authenticate("YOUR_POWERSCHOOL_URL", $username, $password);
			} catch (PowerAPI\Exceptions\Authentication $e) {
			    die('Something went wrong! '.$e->getMessage());
			}
			
			$transcript = $student->fetchTranscript();
			return $transcript;
        }
        
        public function getGradesForStudent($username,$password)
        {	
	        $student;
	        try {
			    $student = PowerAPI\PowerAPI::authenticate("YOUR_POWERSCHOOL_URL", $username, $password);
			} catch (PowerAPI\Exceptions\Authentication $e) {
			    die('Something went wrong! '.$e->getMessage());
			}
			
			$transcript = $student->fetchTranscript();
			
			$studentGrades = array();
			$finalGrades = [];
			foreach ($transcript->studentDataVOs->reportingTerms as $term)
			{
				if($term->abbreviation == $transcript->studentDataVOs->student->currentTerm)
				{
					foreach($transcript->studentDataVOs->finalGrades as $grade)
					{
						if($grade->reportingTermId == $term->id)
						{
							foreach ($student->sections as $section) {
							   if($section->id == $grade->sectionid)
							   {
								   $finalGrades[$section->name] = $grade;
							   }
							}
							
						}
					}
				}
			}
			return $finalGrades;
        }
}
