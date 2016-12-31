<!doctype html>

<html>
  
  <head>
  	<?php $this->load->view('header'); ?>
  </head>
  
  <body>
    <div class="container">
	    	<div class="col-md-4"></div>
	<div class="col-md-4">
        <div class="panel panel-default form-signin">
          <div class="panel-heading"><b>Grade Submission</b>
          </div>
          <div class="panel-body">
</h2>
<p>Please log in to your student PowerSchool account using the form below.</p>
<p>Your grades will automatically be sent to your instructor.</p>
<p>This will check if you meet minimum grade requirements.</p>  <p><strong>PowerSchool Login:</strong></p>          
<?php
	$this->load->helper('url');
	echo form_open('student/grades');
	//echo "Username: <br>";
	$usernameField = array(
          'name'        => 'username',
          'placeholder' => 'Username',
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
  <button type="submit" class="btn pull-right btn-primary btn-sm">Send Grades</button>
</form>
          </div>
          <div class="panel-footer"><small>Created by <a href="http://andrewarpasi.com">Andrew Arpasi</a>. - <a href="<?= site_url('Instructor/logIn');?>">Instructor Login</small>
          </div>
        </div>
      </form>
      	</div>
	<div class="col-md-4"></div>
    </div>
    <!-- /container -->
  </body>

</html>