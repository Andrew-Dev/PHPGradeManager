<!DOCTYPE html>
<html>
  
  <head>
  	<?php $this->load->view('header'); ?>
  </head>
  
  <body>
  	<?php $this->load->view('admin/navbar'); ?>
  	<div class="container">
	  	<div class="row">
	  	<div class="col-md-4">
	  	  <div class="panel panel-default form-signin">
	  		<div class="panel-heading"><b>Add Instructor</b></div>
				<div class="panel-body">
					<?php
						$this->load->helper('form');
						echo form_open('Instructor/addInstructor');
						//echo "Username: <br>";
						$usernameField = array(
					          'name'        => 'email',
					          'placeholder' => 'E-Mail',
					          'class'       => 'form-control',
					    );
						echo form_input($usernameField);
						//echo "<br>Password: <br>";
							$passField = array(
					        'name'        => 'password',
					        'placeholder' => 'Password',
					        'class'       => 'form-control',
					    );
						echo form_password($passField);
						echo "<br>";
						?>
						  <button type="submit" class="btn pull-right btn-primary btn-sm">Register</button>
						  </form>
				</div>
	  	  </div>
  	</div>
	  		<div class="col-md-8">
		  		<div class="panel panel-default form-signin">
	  		<div class="panel-heading"><b>Registered Instructors</b></div>
				<div class="panel-body">
	            <?php
					foreach($instructors as $instructor)
					{
						echo $instructor->email."<br>";
					}
				?>
				</div>
	  	  </div>
	  		</div>
  		</div>
  	</div>
  </body>

</html>