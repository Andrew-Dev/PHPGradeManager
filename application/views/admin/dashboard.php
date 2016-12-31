<!DOCTYPE html>
<html>
  
  <head>
  	<?php $this->load->view('header'); ?>
  </head>
  
  <body>
  	<?php $this->load->view('admin/navbar'); ?>
  	<div class="container">
	  	<div class="col-md-8">
	  	  <div class="panel panel-default form-signin">
	  		<div class="panel-heading"><b>Students</b></div>
				<div class="panel-body">
					<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>First Name</th>
				        <th>Last Name</th>
				        <th>GPA</th>
				        <th>Sufficient?</th>
				        <th>Last Submission</th>
				      </tr>
				    </thead>
				    <tbody>
	            <?php
		            $this->load->helper('url');
					foreach($students as $student)
					{
						$sufficientString = "";
						if($student["submission"]->sufficient == 1)
						{
							$sufficientString = "Yes";
						}
						else
						{
							$sufficientString = "No";
						}
						$tableStyleString = "";
						if($student["submission"]->sufficient == 1)
						{
							$tableStyleString = "success";
						}
						else
						{
							$tableStyleString = "danger";
						}
						echo '<tr style="cursor:pointer;" class="'.$tableStyleString.'" onclick="document.location = \''.site_url('Instructor/student/'.$student['username']).'\';">';
						echo '<td>'.$student["firstName"]."</td><td>".$student["lastName"]."</td><td>".$student["submission"]->gpa."</td><td>".$sufficientString."</td><td>".$student["submission"]->date."</td></tr>";
					}
				?>
				    </tbody>
					</table>
				</div>
	  	  </div>
	  	</div>
	  	<div class="col-md-4">
		  <div class="panel panel-default form-signin">
	  		<div class="panel-heading"><b>Statistics</b></div>
				<div class="panel-body">
					<p>Average overall GPA: <?=$averageGPA?></p>
				</div>
		  </div>
	  	</div>

  	</div>
  	</div>
  </body>

</html>