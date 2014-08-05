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

.placeholder { margin-left: 20px; }

#msg { height: 200px; }

</style>

</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <?=$this->load->view("Template/interactionSideNav")?>
                <div id='cityCol' class="col-md-offset-2 col-sm-9 col-md-10">
                <div class="cityInfoContainer">
                    <div><!-- class="col-xs-4 description col-sm-4 description">-->
                        <?php
                          echo form_open('interaction/sendMessage', "role='form'");
                          echo "<h2>Compose Message</h2>";
                          if (isset($username))
                          {
                            echo form_input('receiver',set_value('receiver'), "class=form-control placeholder='To' value='" . $username . "'", "required");
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
                </div><!-- cityInfoContainer -->
              </div>
            </div><!-- headerSpace -->
        </div><!-- content -->
        <?=$this->load->view("Template/footer")?>
<!-- JavaScript -->
<script>
    $(document).ready(function() {
      /* Side Nav */
      $('#messages').attr('class','active');
      $('#fLink').attr('href',"<?php echo base_url('interaction');?>/getFriends/");
    });
</script>
