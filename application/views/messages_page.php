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
                <div class="col-xs-2 navbar-collapse collapse sidebar">
                      <ul class="nav nav-sidebar">
                          <li class="non-active"><a href="<?php echo base_url();?>home/profile/<?php echo $_SESSION['user']->username; ?>">Home</a></li>
                          <li class="non-active"><a href="<?php echo base_url();?>interaction/getFriends">Friends</a></li>
                          <li class="active"><a href="">Messages</a></li>
                      </ul>
                </div>

                <div class="cityInfoContainer">
                    <div class="col-xs-10">
                      <h1>Messages</h1>
                      <a class="btn btn-info" href="<?php echo base_url('home');?>/create_message">Create Message</a>
                    </div>

                    <div class="col-xs-10 description">
                      <br>
                      <?php
                        if ($messages == False)
                        {
                          echo "<p>You don't have any messages!</p>";
                        }
                        else
                        {
                          echo "<table class='table table-hover'>";
                          echo "<tr>";
                          echo "<th> Sender </th>";
                          echo "<th> Contents </th>";
                          echo "<th> Timestamp (UTC) </th>";
                          echo "<th> Delete </th>";
                          echo "</tr>";

                          foreach($messages as $row)
                          {
                            echo "<tr>";
                            echo "<td>";
                            echo "<a href='" . base_url() . "home/profile/" . $row->username . "'>" . $row->username . "</a>";
                            echo "</td>";
                            echo "<td>";
                            echo $row->content;
                            echo "</td>";
                            echo "<td>";
                            echo $row->time;
                            echo "</td>";
                            echo "<td>";
                            echo "<a class='btn btn-info' href='" . base_url() . "interaction/deleteMessage/" . strval($row->messageID) . "'>X</a>";
                            echo "</td>";
                            echo "</tr>";
                          }
                          echo "</table>";
                        }
                      ?>
                    </div><!-- col -->
                </div><!--cityInfoContainer-->
        </div><!-- content -->
        <br>
        <?=$this->load->view("Template/footer")?>
