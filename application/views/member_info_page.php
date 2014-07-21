<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
<style>

.description{ padding-left:45px; }

p { font-family:sans-serif; }

h3 { background-color: black;
     color: white;
     font-family:sans-serif;
     text-indent: 10px; }

.sidebar { bottom: 0px;}

.placeholder { margin-left: 20px; }

</style>

</head>

<body>

    <?=$this->load->view("Template/header")?>

    <div class="row headerSpace">
            <div class="col-xs-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li class="active"><a href="">Home</a></li>
                        <li class="non-active"><a href="<?php echo base_url();?>interaction/getFriends">Friends</a></li>
                    <li class="non-active"><a href="<?php echo base_url();?>interaction/getMessages">Messages</a></li>
                  </ul>
            </div>

            <div class="cityInfoContainer">
                <div class="col-xs-10">
                  <h2>User's Profile</h2>
                </div>
				
                <div class="col-xs-2 placeholder">
                  <?php
                  echo "<img src=' ". base_url() . $user['picture_url'] . "' align='center'/>
                  <br>
                  <br>
                  <button type='submit' class='btn btn-info'>Add to Friends</button>
                  <br>
                  <br>
                  <li class='btn btn-info'><a href=" . base_url() . "home/create_message'>Send Message</a></li>";
				  ?>
				  
                </div>
                

                <div class="col-xs-6 description">
                	<?php
                    echo "<h3>Basic</h3>
                    <p>First Name: ".$user['first_name']."</p>
					<p>Last Name: ".$user['las_tname']."</p>
                    <p>Age: ".$user['age']."</p>
                    <p>Interests: ".$user['interest']."</p>
                    <p>Bio: ".$user['bio']."</p>
                    <h3>Wants to Visit</h3>
                        <ul> <li> MillieCreerie (Toronto) </li></ul>
                    <h3>Posted Reviews</h3>
                        <ul><li> La Carnita nightmare...</li></ul>
                     
    					
    				<li class='btn btn-info'><a href='" . base_url() ."home/edit_info_page'>Edit Info</a></li>";
    			    ?>
					 
                </div>
				
                <div class="col-xs-8">
                  <p>

                  </p>
                </div>
            </div><!--cityInfoContainer-->
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>