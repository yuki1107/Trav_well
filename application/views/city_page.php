<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">

</head>

<body>
	<?=$this->load->view("Template/header")?>
    <div class="container-fluid">
    	<div class="row headerSpace">
            <div class="col-sm-3 col-md-2">
              <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview</a></li>
                <li class='non-active'><?php echo anchor('sidebar/restaurantPage', 'Restaurants')?></li>
                <li class='non-active'><a href="#">Landmarks</a></li>
                <li class='non-active'><a href="#">Shopping Malls</a></li>
                <li class='non-active'><a href="#">Hotels</a></li>
              </ul>
            </div>

            <div class="col-sm-9 col-md-10">
                <div class='cityInfoContainer'>
              		<h1 id="cityHeader" class="cityInfoHeader"></h1><hr />
                    <img id="cityImg" class="cityInfoImg" src="" />
                    <p id="cityDesc"class='cityInfoFont'></p>
            	</div>
        	</div>
		</div> <!-- row headerSpace -->
    </div> <!-- container-fluid -->
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var city = <?php echo json_encode($cityInfo); ?>;
        $('#cityHeader').html(city.name);
        $("#cityImg").attr("src", city.picURL);
        $('#cityDesc').html(city.desc);
    });
</script>
<?=$this->load->view("Template/footer")?>
