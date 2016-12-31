<!doctype html>

<html>
  
  <head>
  	<?php $this->load->view('header'); ?>
  	<script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.19/dist/jquery.flip.min.js">
  </head>
  
  <body>
    <div class="container">
	    	<div class="col-md-4"></div>
	<div class="col-md-4">
        <div class="panel panel-default form-signin">
          <div class="panel-heading"><b>Grade Submission</b>
          </div>
          <div class="panel-body">
            <h1 class="form-signin-heading text-center">Grade Report</h1>
            	<p>Student: <?=$name?> - GPA: <?=$gpa?></p>
	            <?php
		            include FCPATH . 'vendor/autoload.php';
					//echo json_encode($finalGrades);
					if($submitted == true)
					{
						echo '<div class="alert alert-warning" role="alert">Your grades have not been submitted, as you have already submitted once today. Here are your grades for reference.</div>';
					}
					else
					{
						echo "<p>Your grades have been sent. For your reference, here are the grades that were submitted:</p><br>";
						if($sufficient == true)
						{
							echo '<div class="alert alert-success" role="alert"><b>All Set!</b> Your grades are sufficient!</div>';
						}
						else
						{
							echo '<div class="alert alert-warning" role="alert">Unfortunately, your grades don\'t meet the minimum requirements.</div>';
						}
					}
				?>
	            <table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Class</th>
				        <th>Grade</th>
				        <th>Percentage</th>
				      </tr>
				    </thead>
				    <tbody>
				      <!-- <tr>
				        <td>John</td>
				        <td>Doe</td>
				        <td>john@example.com</td>
				      </tr> -->
				      <?php
						foreach($finalGrades as $course => $grade)
						{
							echo "<tr><td>".$course."</td><td>".$grade->grade."</td><td>".$grade->percent."%</td></tr>";
						}	
						?>
				    </tbody>
				  </table>
				  <p><b>Remember to submit your grades at least once every week!</b></p>
          </div>
          <div class="panel-footer"><small>Created by <a href="http://andrewarpasi.com">Andrew Arpasi</a>.</small>
          </div>
        </div>
      	</div>
	<div class="col-md-4"></div>
    </div>
    <!-- /container -->
  </body>
  </html>
