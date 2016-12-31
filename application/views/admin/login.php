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
          <div class="panel-heading"><b>Instructor Grade Access</b>
          </div>
          <div class="panel-body">
            <h1 class="form-signin-heading text-center">
</h1>
<?php
	if(isset($invalid))
	{
		if($invalid)
		{
			echo '<div class="alert alert-danger" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">Error:</span>
				  Invalid E-mail/password.
				</div>';
		}
	}
	?>
<p><strong>Grade Dashboard Login:</strong></p>          
<?php
	echo form_open('instructor/processLogin');
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
  <button type="submit" class="btn pull-right btn-primary btn-sm">Log in</button>
</form>
          </div>
          <div class="panel-footer"><small>Created by <a href="http://andrewarpasi.com">Andrew Arpasi</a>.</small>
          </div>
        </div>
      </form>
      	</div>
	<div class="col-md-4"></div>
    </div>
    <!-- /container -->
  </body>

</html>