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

.placeholder { margin-left: 20px; }

</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
            <div class="row headerSpace">
                <div class="col-sm-3 col-md-2">
                      <ul class="nav nav-sidebar">
                        <li id="home_li"><a id="home_a">Home</a></li>
                        <li class="non-active"><a href="<?php echo base_url();?>interaction/getFriends">Friends</a></li>
                        <li class="non-active"><a href="<?php echo base_url();?>interaction/getMessages">Messages</a></li>
                      </ul>
                </div>

                <div class="cityInfoContainer">
                    <div class="col-xs-10">
                      <h2>
                        <h2 id='profile_h2'></h2>
                        <img id='profile_pic' align='center' width='200' height='200' />
                        <br>
                        <br>
                        <?php

									         if (strcmp($user->username, $_SESSION['user']->username) == 0)
                       		 {
                  				    echo form_open_multipart('authorize/change_pic');
                  						echo "<input type='file' name='userimg' />";
                  						echo form_submit('Submit', 'submit');
                  						echo form_close();
									         }
                          echo "<br>";
                        ?>
                      <h3>Basic</h3>
                        <?php

                          if ($user->first_name != NULL && $user->last_name != NULL)
                          {
                            echo "<p>Name: " . $user->first_name . ' ' . $user->last_name . "</p>";
                          }
                          elseif ($user->first_name != NULL)
                          {
                            echo "<p>Name: " . $user->first_name . "</p>";
                          }

                          if ($user->age != NULL)
                          {
                            echo "<p>Age: " . $user->age . "</p>";
                          }

                          if ($user->interest != NULL)
                          {
                            echo "<p>Interests: " . $user->interest . "</p>";
                          }

                          if ($user->bio != NULL)
                          {
                            echo "<p>Bio: " . $user->bio . "</p>";
                          }

                          if ($user->first_name == NULL && $user->age == NULL && $user->interest == NULL && $user->bio == NULL)
                          {
                            if (strcmp($user->username, $_SESSION['user']->username) == 0)
                            {
                              echo "<p>You haven't added any information to your profile!</p>";
                            }
                            else
                            {
                              echo "<p>This user hasn't added any information to their profile!</p>";
                            }
                          }
                        ?>
                        <h3>Wants to Visit</h3>
                            <?php
                                if ($wants == False)
                                {
                                  if (strcmp($user->username, $_SESSION['user']->username) == 0)
                                  {
                                    echo "<p>You have not indicated you want to go somewhere!</p>";
                                  }
                                  else
                                  {
                                    echo "<p>This user has not indicated they want to go somewhere!</p>";
                                  }
                                }
                                else
                                {
                                  echo "<ul>";
                                  foreach ($wants as $row)
                                  {
                                    echo "<li>" . $row->pname . ", " . $row->cname . "</li>";
                                  }
                                  echo "</ul>";
                                }
                            ?>
                        <h3>Posted Reviews</h3>
                            <?php
                                if ($comments == False)
                                {
                                  if (strcmp($user->username, $_SESSION['user']->username) == 0)
                                  {
                                    echo "<p>You haven't posted any reviews!</p>";
                                  }
                                  else
                                  {
                                    echo "<p>This user has not posted any reviews!</p>";
                                  }
                                }
                                else
                                {
                                  echo "<ul>";
                                  $count = 0;
                                  foreach ($comments as $row)
                                  {
                                    //only show 5 most recent comments
                                    if ($count = 5)
                                    {
                                      break;
                                    }

                                    echo "<li>" . $row->content . "</li>";
                                    $count++;

                                  }
                                  echo "</ul>";
                                }
                              echo "<br>";
                              echo "<br>";
                            ?>
                      <br>
                      <br>
                      <div id='edit_button'>
                          <a class='btn btn-info' href="<?php echo base_url(); ?>home/edit_info_page">Edit Profile</a>
                          <br>
                          <br>
                      </div>
                      <div id='add_button'>
                          <a id='add_link' class='btn btn-info'>Add to Friends</a>
                          <br>
                          <br>
                      </div>
                      <div id='message_button'>
                          <a class='btn btn-info' href="<?php echo base_url(); ?>home/create_message">Send Message</a>
                          <br>
                          <br>
                      </div>

                    </div><!-- col -->
                </div><!-- cityInfoContainer -->
            </div><!-- headerSpace -->
        </div><!-- content -->

<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var userInfo = <?php echo json_encode($user);?>;
        var currentUser = <?php echo json_encode($_SESSION['user']->username);?>;
        var friends = <?php echo json_encode($friends);?>;

        //Profile picture
        if (!userInfo.picture_url)
        {
          $('#profile_pic').attr('src', "<?php echo base_url(); ?>assets/images/profile.png");

        }
        else
        {
          $('#profile_pic').attr('src', "<?php echo base_url(); ?>" + userInfo.picture_url);
        }

        //Add to friends button
        if(!friends)
        {
          $('#add_link').attr('href', "<?php echo base_url(); ?>interaction/addFriend/" + userInfo.userID);
        }

        if (userInfo.username == currentUser) 
        {
          $('#home_li').attr('class', 'active');
          $('#home_a').attr('href', "");
          document.getElementById('profile_h2').innerHTML = "My Profile";
          $('#add_button').hide();
          $('#message_button').hide();
        }
        else
        {
          $('#home_li').attr('class', 'non-active');
          $('#home_a').attr('href', "<?php echo base_url(); ?>home/profile/" + currentUser);
          document.getElementById('profile_h2').innerHTML = userInfo.username + "'s Profile";
          $('#edit_button').hide();
        }
    });
</script>

        <?=$this->load->view("Template/footer")?>
