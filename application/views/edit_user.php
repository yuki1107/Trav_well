<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user_edit</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
</head>


<style>

.upInfoBar{
	text-align:center;
	padding-top:100px;
	width:500px;
	alignment-adjust:central;
	margin:auto;
}
	

</style>
<body>
    <?=$this->load->view("Template/header")?>

<div class="upInfoBar">
         <?php
            echo form_open('authorize/update', "role='form'");
            echo form_input('fir_name',set_value('fir_name'), "class=form-control placeholder='Please Enter Your First Name'", "required");
			echo "<br>";
			echo form_input('las_name',set_value('las_name'), "class=form-control placeholder='Please Enter Your Last Name'", "required");
			echo "<br>";
			echo form_input('age',set_value('age'), "class=form-control placeholder='Please Enter Your Age'", "required");
			echo "<br>";
			echo form_input('interest',set_value('interest'), "class=form-control placeholder='Please Enter Your interests'", "required");
			echo "<br>";
			echo form_input('bio',set_value('bio'), "class=form-control placeholder='Please Enter Your Biography'", "required");
			echo "<br>";
            echo form_submit('submit', 'Update', "class = 'btn btn-info'");
			echo "<br>";
			echo "<br>";
            echo form_close();

         ?>

</div>

</body>
<?=$this->load->view("Template/footer")?>
</html>