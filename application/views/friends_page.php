<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
<style>

p { font-family:sans-serif; }

h3 { background-color: black;
     color: white;
     font-family:sans-serif;
     text-indent: 10px; }

th { text-align: center; }

td { text-align: center; }

</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <?=$this->load->view("Template/interactionSideNav")?>
                <div class='col-md-offset-2 col-sm-9 col-md-10'>
                <div class="cityInfoContainer">
                      <h1>Friends</h1><hr/>
                    <p>
                      <?php

                        if ($friends == False && $requests == False)
                        {
                          echo "<p id='suggest'>You don't have any friends...</p>";
                        }
                        else
                        {
                          if ($requests != False) {

                            echo "<h4>Requests</h4>";
                            echo "<table class='table table-hover'>";
                            echo "<tr>";
                            echo "<th> Name </th>";
                            echo "<th> Confirm </th>";
                            echo "<th> Reject </th>";
                            echo "</tr>";

                            foreach($requests as $row)
                            {
                              if ($row->confirmed == 0) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<a href='" . base_url() . "home/profile/" . $row->username . "'>" . $row->username . "</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-info' href='" . base_url() . "interaction/confirmFriend/" . strval($row->userID) . "'>C</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-info' href='" . base_url() . "interaction/rejectFriend/" . strval($row->userID) . "'>X</a>";
                                echo "</td>";
                                echo "</tr>";
                              }
                            }
                            echo "</table>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
                          }

                          if ($friends != False)
                          {
                            echo "<table class='table table-hover'>";
                            echo "<tr>";
                            echo "<th> Name </th>";
                            echo "<th> Remove Friend </th>";
                            echo "</tr>";

                            foreach($friends as $row)
                            {
                              if ($row->confirmed == 1) {
                                echo "<tr>";
                                echo "<td>";
                                echo "<a href='" . base_url() . "home/profile/" . $row->username . "'>" . $row->username . "</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a class='btn btn-info' href='" . base_url() . "interaction/removeFriend/" . strval($row->userID) . "'>X</a>";
                                echo "</td>";
                                echo "</tr>";
                              }
                            }
                            echo "</table>";
                            echo "<br>";
                          }
                        }
                      ?>
                    </p>
                </div><!-- cityInfoContainer -->
              </div>
            </div><!-- headerSpace -->
        </div><!-- content -->
        <?=$this->load->view("Template/footer")?>
<!-- JavaScript -->
<script>
    $(document).ready(function() {
      //var suggestFriends = ;
      $.ajax({
          type: 'GET',
          dataType: 'json',
          url: "<?php echo base_url('interaction');?>/find_similar_users",
          success: function(simUsers) {
            if(Object.keys(simUsers).length > 0) {
              var htmlText = '';
              $.each(simUsers, function(i, item) {
                htmlText += " <a href='<?php echo base_url('home');?>/profile/"+item+"'>"+item+"</a>,";
              });
              $('#suggest').append('These users want to go to the same places as you:' + htmlText.slice(0, -1));
            }
          }
      });/* ajax */
    });
</script>
