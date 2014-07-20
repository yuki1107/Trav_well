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
          <form class="navbar-form navbar-right" role="form">
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
              <input type="keyword" placeholder="Search" class="form-control">
            </div>

            <button type="submit" class="btn btn-info">Search</button>
          </form>
        </div><!--/.navbar-collapse -->

      </div>
    </div>
