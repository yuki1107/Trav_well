<div class="row headerSpace">
	<div id='sideNav' class="col-sm-3 col-md-2 navbar-collapse collapse sidebar">
	    <ul class="nav nav-sidebar">
	        <li id='profile' class='non-active'><a id='pLink' href='<?php echo base_url();?>home/profile/<?php echo $_SESSION['user']->username; ?>'>Home</a></li>
	        <li id='friends' class='non-active'><a id='fLink' href='#'>Friends</a></li>
	        <li id='messages' class='non-active'><a id='mLink' href='<?php echo base_url();?>interaction/getMessages'>Messages</a></li>
	    </ul>
	</div><!-- /sideNav -->
