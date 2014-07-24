<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<div id='header' class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor('home/index', '<img src="'.base_url().'assets/images/logo.gif" id="logo"/>')?>
    </div>

    <div class="navbar-collapse collapse">
         <?php
            echo form_open('home/search', "role='form' class='navbar-form navbar-right'");
            if(isset($_SESSION['user'])){
              $user = $_SESSION['user'];
              echo anchor('home/profile/' . $_SESSION['user']->username, "<div class='form-group'><span 'class=login'>Welcome, " . $user->username . "</span> ");
              echo anchor('authorize/logout', 'Log Out', array('class'=>'btn btn-success'))."</div> ";
            }
            echo "<div class='form-group'>" .
            form_input('query',set_value('query'), "class=form-control placeholder='Search'", "required") ."</div> ";
            echo form_submit('submit', 'Search', "class = 'btn btn-success'"). " ";
            if (!isset($_SESSION['user'])){
              echo anchor('home/login_page', 'Login', array('class'=>'btn btn-info'));
            }
            echo form_close();
         ?>
    </div><!-- navbar-collapse -->
  </div><!-- container -->
</div><!-- navbar -->

