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

    <?=$this->load->view("Template/header")?>

    <div class="row headerSpace">
            <div class="col-sm-3 col-md-2">
                  <ul class="nav nav-sidebar">
                    <?php
                      if (strcmp($user->username, $_SESSION['user']->username) == 0)
                      {
                        echo "<li class='active'><a href=''>Home</a></li>";
                      }
                      else
                      {
                        echo "<li class='non-active'><a href='" . base_url() . "home/profile/" . $_SESSION['user']->username . "'>Home</a></li>";
                      }
                    ?>
                    <li class="non-active"><a href="<?php echo base_url();?>interaction/getFriends">Friends</a></li>
                    <li class="non-active"><a href="<?php echo base_url();?>interaction/getMessages">Messages</a></li>
                  </ul>
            </div>

            <div class="cityInfoContainer">
                <div class="col-xs-10">
                    <?php
                      if (strcmp($user->username, $_SESSION['user']->username) == 0)
                      {
                        echo "<h2>My Profile</h2>";
                      }
                      else
                      {
                        echo "<h2>" . $user->username . "'s Profile</h2>";
                      }
                    ?>

                <!--</div>-->

                <!--<div class="col-xs-2 placeholder">-->
                  <?php
                    if ($user->picture_url != NULL)
                    {
                      echo "<img src='" . base_url(). $user->picture_url . "' align='center' width='200' height='300' />";
                    }
                    else
                    {
                      echo "<img src='/assets/images/profile.png' align='center' />";
                    }
					echo "<br>";
					echo "<br>";
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
                  <?php
                    if (strcmp($user->username, $_SESSION['user']->username) == 0)
                    {
                      echo "<a class='btn btn-info' href='" . base_url() . "home/edit_info_page'>Edit Profile</a>";
                      echo "<br>";
                      echo "<br>";
                    }
                    else
                    {
                      if (!$friends)
                      {
                        echo "<a class='btn btn-info' href='" . base_url() . "interaction/addFriend/" . $user->userID . "'>Add to Friends</a>";
                        echo "<br>";
                        echo "<br>";
                      }
                      echo "<a class='btn btn-info' href='" . base_url() . "home/create_message'>Send Message</a>";
                      echo "<br>";
                      echo "<br>";
                    }
                  ?>
                <!--</div>-->

                <!--<div class="col-xs-6 description">-->
                   
                </div>
            </div>
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>