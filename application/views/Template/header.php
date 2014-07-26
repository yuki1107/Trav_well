<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">

<nav id='header' role="navigation" class="navbar navbar-inverse navbar-fixed-top">
    <!-- Title -->
    <div class="navbar-header pull-left">
      <a href="<?php echo base_url();?>"><img id='logo' src="<?php echo base_url();?>assets/images/logo.gif"></img></a>
    </div>

    <!-- 'Sticky' (non-collapsing) right-side menu item(s) -->
    <div class="navbar-header pull-right">
      <ul class="nav pull-left">
        <!-- This works well for static text, like a username
        <li class="navbar-text pull-left">User Name</li>-->
        <?php if(isset($_SESSION['user'])){
              $user = $_SESSION['user'];
              echo anchor('home/profile/' . $user->username, "<span class='navbar-text pull-left'><span class='hidden-xs custom-nav-icon'>Welcome, " . $user->username . "</span></span>");

            ?>
        <!-- Add any additional bootstrap header items.  This is a drop-down from an icon -->
        <li class="dropdown pull-right custom-li">
          <a href="#" data-toggle="dropdown" style="color:#777; margin-top: 5px;" class="dropdown-toggle"><span class="glyphicon glyphicon-user custom-nav-icon"></span><b class="caret custom-nav-icon"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo base_url('home/profile').'/'.$_SESSION['user']->username?>" title="Profile">
                <span class='glyphicon glyphicon-user custom-nav-icon'></span> Profile</a>
            </li>
            <li>
              <a href="<?php echo base_url('authorize');?>/logout" title="Logout">
                <span class='glyphicon glyphicon-log-out custom-nav-icon'></span> Logout</a>
            </li>
          </ul>
        </li>
        <?php } else { ?>
        <li>
          <button type="button" class="custom-nav navbar-right" onclick="location.href='<?php echo base_url('home');?>/login_page'">
            <span class='glyphicon glyphicon-log-in custom-nav-icon'></span><span class='hidden-xs custom-nav-icon'> Login</span>
          </button></li>
        <?php }?>

      </ul>
      <!-- Required bootstrap placeholder for the collapsed menu -->
      <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div id='navSearch' class="col-xs-6 pull-right">
        <form class="navbar-right" role="search" action="<?php echo base_url('home');?>/search" method='post'>
          <div id='searchPlaces' class="input-group">
            <input name='query' type="text" class="form-control" placeholder="Search for a place to go">
            <span class="input-group-btn">
              <button name='submit' type="submit" class="btn btn-success btn-custom"style='btn-radius:4px;'>
                <span class='glyphicon glyphicon-search'></span>
                <span class='hidden-xs'> Search</span>
              </button>
            </span>
          </div>
        </form>
    </div>
</nav>
