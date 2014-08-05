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
        <?=$this->load->view("Template/mainSideNav")?>
                <div id='cityCol' class="col-md-offset-2 col-sm-9 col-md-10">
                    <div class='cityInfoContainer'>
                  		<h1 id='cityHeader' class='cityInfoHeader'></h1><hr/>
                        <img id='cityImg' class='cityInfoImg' src=''/>
                        <p id='cityDesc'class='cityInfoFont'></p>
                	</div>
            	</div>
        	</div> <!-- row headerSpace -->
        </div> <!-- content -->
<!-- JavaScript -->
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
