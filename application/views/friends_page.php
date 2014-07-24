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

.sidebar { bottom: 0px;}

</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
            <div class="row headerSpace">
                <div id='sideNav' class="col-xs-2 navbar-collapse collapse sidebar">
                      <ul class="nav nav-sidebar">
                        <li class="non-active"><a href="<?php echo base_url();?>home/profile/<?php echo $_SESSION['user']->username; ?>">Home</a></li>
                        <li class="active"><a href="">Friends</a></li>
                        <li class="non-active"><a href="<?php echo base_url();?>interaction/getMessages">Messages</a></li>
                      </ul>
                </div>

                <div class="cityInfoContainer">
                    <div class="col-xs-10">
                      <h1>Friends</h1>
                    </div>

                    <div class="col-xs-10 description">
                      <?php

                        if ($friends == False && $requests == False)
                        {
                          echo "<p>You don't have any friends</p>";
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
                    </div>
                </div><!-- cityInfoContainer -->
            </div><!-- headerSpace -->
        </div><!-- content -->
        <?=$this->load->view("Template/footer")?>
<!-- JavaScript -->
<script>
    $(document).ready(function() {
      //var suggestFriends = ;
      $.ajax({
    // edit to add steve's suggestion.
    //url: "/ControllerName/ActionName",
    url: '<?php echo base_url();?>interaction/find_similar_users',
    success: function(data) {
         // your data could be a View or Json or what ever you returned in your action method
         // parse your data here
         alert(data);
    }
});
    });
</script>
