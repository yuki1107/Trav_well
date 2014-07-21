<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link href="/assets/css/navg_style.css" rel="stylesheet">
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

    <?=$this->load->view("Template/header")?>

    <div class="row headerSpace">
            <div class="col-xs-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li class="non-active"><a href="/home/profile">Home</a></li>
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
                            echo $row->username;
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
                            echo $row->username;
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
            </div><!--cityInfoContainer-->
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>
