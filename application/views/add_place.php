<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<style>
#placeImgBtn{
	display:none;
}
</style>
</head>
<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
                <div class="container">
                  	<h1>Recommend a new place</h1><hr />
                  	<div class='jumbotron'>
                  		<div class="row marketing">
                  			<div class="col-lg-4">
                  				<img class='placeInfoImg' src='<?=base_url();?>assets/images/place.jpg'/>
                  				<button id='newImgBtn' class='btn btn-default' style='margin-left:10px;width:300px;'>choose picture</button>
                  			</div>
                  			<div class='col-lg-8'>
                  				<?php
                  					echo form_open_multipart('home/add_place');
                  					echo "<input type='file' name='placeImg' id='placeImgBtn'/>";
                  					echo form_label('Name of the place', 'placeName');
                  					echo form_input('placeName', set_value('placeName'), "class='form-control' placeholder='Name of place'", "required");
                  					echo "<br>";
                  					echo form_label("Type of place", 'selectType');
                  					echo "<select name='selectType' class='form-control'>
	                  					<option value='restaurant'".set_select('selectType', 'restaurant', TRUE).">restaurant</option>
	                  					<option value='landmark'".set_select('selectType', 'landmark').">landmark</option>
	                  					<option value='shopping'".set_select('selectType', 'shopping').">shopping</option>
	                  					<option value='hotel'".set_select('selectType', 'hotel').">hotel</option>
	                  				</select><br>";
	                  				echo form_label("City", 'city');
                  					echo "<select name='city' class='form-control'>
	                  					<option value='Toronto'".set_select('city', 'Toronto', TRUE).">Toronto</option>
	                  					<option value='Vancouver'".set_select('city', 'Vancouver').">Vancouver</option>
	                  					<option value='Ottawa'".set_select('city', 'Ottawa').">Ottawa</option>
	                  					<option value='ShangHai'".set_select('city', 'ShangHai').">ShangHai</option>
	                  					<option value='HongKong'".set_select('city', 'HongKong').">HongKong</option>
	                  				</select><br>";
	                  				echo form_label("Address", 'address');
	                  				echo form_input('address', set_value('address'), "class='form-control' placeholder='Address'", "required");
	                  				echo "<br>";
	                  				echo form_label("Contact", 'contact');
	                  				echo form_input('contact', set_value('contact'), "class='form-control' placeholder='Contact'");
	                  				echo "<br>";
	                  				echo form_label("Description", 'description');
	                  				echo form_textarea('description',set_value('description'), "class='form-control' placeholder='Describe the place'", "required");
	                  				echo "<br>";
                  					echo form_submit('submit', 'Submit', "class='btn btn-info'");
                  					echo form_close();
                  				?>
                  			</div>
                  		</div>
                  	</div>
            </div><!--cityInfoContainer-->
    </div><!-- headerSpace -->
    <script>
    $(document).ready(function() {
        $('#newImgBtn').bind("click",function(){ $('#placeImgBtn').click()});
    });
</script>

    <?=$this->load->view("Template/footer")?>
