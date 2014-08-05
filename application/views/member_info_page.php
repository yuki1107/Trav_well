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
     text-indent: 10px;
     padding: 3px 0px; }

.placeholder { margin-left: 20px; }

#fileBtn{
  display:none;
}

#newfileBtn{
  margin-right: 15px;
}

#profile_pic{
  width:250px;
  height: auto;
}
</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <?=$this->load->view("Template/interactionSideNav")?>

              <div id='cityCol' class="col-md-offset-2 col-sm-9 col-md-10">

                <div class="cityInfoContainer">
                    <div class="col-xs-10">
                        <h1 id='profile_h2'></h1><hr/>
                        <img id='profile_pic' align='center' width='200' height='200' />
                        <br>
                        <br>
                        <?php

									         if (strcmp($user->username, $_SESSION['user']->username) == 0)
                       		 {
                  				    echo form_open_multipart('authorize/change_pic');
                  						echo "<div id='newfileBtn' class='btn btn-info'>Change Picture</div><input type='file' name='userimg' id='fileBtn'/>";
                  						echo form_submit('Submit', 'Submit', "class = 'btn btn-info'");
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
                                    if ($count == 5)
                                    {
                                      break;
                                    }

                                    echo "<li>" . $row->pname . ", " . $row->cname . " - " . $row->content . "</li>";
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
<script>
    $(document).ready(function() {
        var userInfo = <?php echo json_encode($user);?>;
        var currentUser = <?php echo json_encode($_SESSION['user']->username);?>;
        var friends = <?php echo json_encode($friends);?>;
        /* Side Nav */
        $('#fLink').attr('href',"<?php echo site_url('interaction');?>/getFriends/");

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
          $('#profile').attr('class', 'active');
          document.getElementById('profile_h2').innerHTML = "My Profile";
          $('#add_button').hide();
          $('#message_button').hide();
        }
        else
        {
          document.getElementById('profile_h2').innerHTML = userInfo.username + "'s Profile";
          $('#edit_button').hide();
        }
        $('#newfileBtn').bind("click",function(){ $('#fileBtn').click()});
    });
</script>

        <?=$this->load->view("Template/footer")?>
