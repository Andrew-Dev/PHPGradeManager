<!DOCTYPE html>
<html>
  
  <head>
  	<?php $this->load->view('header'); ?>
  </head>
  
  <body>
  	<?php $this->load->view('admin/navbar'); ?>
  	<div class="container">
	  	<div class="col-md-12">
	  	  <div class="panel panel-default form-signin">
	  		<div class="panel-heading"><b>Submissions for <?=$student->firstName." ".$student->lastName?></b></div>
				<div class="panel-body">
					<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>GPA</th>
				        <th>Grades Sufficient?</th>
				        <th>Date</th>
				      </tr>
				    </thead>
				    <tbody>
	            <?php
		            $this->load->helper('url');
					foreach($submissions as $submission)
					{
						$sufficientString = "";
						if($submission->sufficient == 1)
						{
							$sufficientString = "Yes";
						}
						else
						{
							$sufficientString = "No";
						}
						echo '<td>'.$submission->gpa."</td><td>".$sufficientString."</td><td>".$submission->date."</td></tr>";
					}
				?>
				    </tbody>
					</table>
				</div>
	  	  </div>
	  	</div>
  	</div>
  	</div>
  </body>

</html>