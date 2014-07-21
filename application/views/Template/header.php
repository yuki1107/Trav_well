<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
          <div class="navbar-form navbar-right" >
            <?php
			if (!isset($_SESSION['user'])){
				echo anchor('home/loginPage', 'Login', array('class'=>'login'));
			}
			else{
				$user = $_SESSION['user'];
				echo anchor('home/profile', "<span 'class=login'>Welcome, " . $user->username . "</span>");
				echo " ";
				echo anchor('authorize/logout', 'Log Out', array('class'=>'btn btn-success'));
			}
			?>

            <div class="form-group">
             <?php
                echo form_open('search/lookup', "role='form'");
                echo form_input('query',set_value('query'), "class=form-control placeholder='Search'", "required");
                echo form_submit('submit', 'Search', "class = 'btn btn-info'");
                echo form_close();

            ?>
       		</div>
            </div>

        </div><!--/.navbar-collapse -->

      </div>
    </div>
