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
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
        	<div class="row headerSpace">
            <div id='sideNav' class="col-xs-2 sidebar">
              <ul class="nav nav-sidebar">
                <li id='overview' class='non-active'><a id='oLink' href="#">Overview</a></li>
                <li id="restaurant" class='non-active'><a id='rLink' href='#'>Restaurants</a></li>
                <li id="landmark" class='non-active'><a id='lLink' href="#">Landmarks</a></li>
                <li id="shopping" class='non-active'><a id='sLink' href="#">Shopping Malls</a></li>
                <li id="hotel" class='non-active'><a id='hLink' href="#">Hotels</a></li>
              </ul>
            </div>

                <div class="col-sm-9 col-md-10">
                    <div class='cityInfoContainer'>
                  		<h1 id='cityHeader' class='cityInfoHeader'></h1><hr/>
                        <img id='cityImg' class='cityInfoImg' src=''/>
                        <p id='cityDesc'class='cityInfoFont'></p>
                	</div>
            	</div>
        	</div> <!-- row headerSpace -->
        </div> <!-- content -->
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var city = <?php echo json_encode($cityInfo); ?>;
        $('#cityHeader').html(city.name);
        /* Side Nav */
        $('#overview').attr('class','active');
        $('#oLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + city.name);
        $('#rLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + city.name + "/restaurant");
        $('#lLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + city.name + "/landmark");
        $('#sLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + city.name + "/shopping");
        $('#hLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + city.name + "/hotel");

        /* City Info */
        $('#cityDesc').html(city.desc);
        if(city.name == "Error") {
            $('#cityImg').remove();
        }
        else {
            $("#cityImg").attr("src", "<?php echo base_url();?>" + city.picURL);
        }
    });
</script>
<?=$this->load->view("Template/footer")?>
