  <?php $this->load->helper('url'); ?>
  	<div class="navbar navbar-default navbar-static-top" style="margin-top: -40px">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Grade Reports</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?= site_url('Instructor/dashboard');?>">Students</a>
            </li>
            <li>
              <a href="<?= site_url('Instructor/instructors');?>">Instructors</a>
            </li>
            <li>
              <a href="<?= site_url('Instructor/logout');?>">Log out</a>
            </li>
          </ul>
        </div>
      </div>
      </div>
    </div>