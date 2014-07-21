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

.sidebar { bottom: 0px;}

.placeholder { margin-left: 20px; }

#msg { height: 200px; }

</style>

</head>

<body>

    <?=$this->load->view("Template/header")?>

    <div class="row headerSpace">
            <div class="col-xs-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li class="non-active"><a href="/home/profile">Home</a></li>
                    <li class="non-active"><a href="<?php echo base_url();?>interaction/getFriends">Friends</a></li>
                    <li class="active"><a href="<?php echo base_url();?>interaction/getMessages">Messages</a></li>
                  </ul>
            </div>

            <div class="cityInfoContainer">

                <div class="col-xs-4 description col-sm-4 description">
                    <?php
                      echo form_open('interaction/sendMessage', "role='form'");
                      echo "<h2>Compose Message</h2>";
                      if (isset($username))
                      {

                      }
                      else
                      {
                        echo form_input('receiver',set_value('receiver'), "class=form-control placeholder='To'", "required");
                      }
                      echo "<br>";
                      echo form_textarea('content',set_value('content'), "class=form-control placeholder='Message' id='msg'", "required");
                      echo "<br>";
                      echo form_submit('submit', 'Send', "class = 'btn btn-info send_button'");
                      echo form_close();
                    ?>
                    <br>
                </div>

            </div><!--cityInfoContainer-->
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>
