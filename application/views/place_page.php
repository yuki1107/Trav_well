<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/rating.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/buttons.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/comment_box.css" rel="stylesheet">
<style>
h2{
	color:#06F;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;

}
.b{
	text-indent: 40px;
}
.description{
	padding-left:48px;
}
.placeholder{
	padding-top:30px;
}

h1{
	font-family:"Comic Sans MS", cursive;
	font-size:38px;
}


</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>


    <div class="row headerSpace">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><?php echo anchor('sidebar/overviewPage', 'Overview')?></li>
                <li><?php echo anchor('sidebar/restaurantPage', 'Restaurants')?></li>
                <li><a href="#">Landmarks</a></li>
                <li><a href="#">Shopping Malls</a></li>
                <li><a href="#">Hotels</a></li>
            </ul>
        </div>

        <div id="mainBody" class="col-sm-9 col-md-10 main">
            <h1 id='pType'></h1>
            <div class="row">
                <div id='otherInfo' class="col-xs-6 col-sm-3 placeholder">
                    <img id='placeImg' class="1strest" src='' />
                    <div id='placeInfo'>
                        <p id='placeAddress'></p>
                        <p id='placeContact'></p>
                    </div>
                    <?=$this->load->view("Template/buttons")?>
                    <?=$this->load->view("Template/rating")?>
                </div>

                <div id='mainInfo' class="col-xs-6 col-sm-9 description">
                    <h2 id='placeName'></h2>
                    <hr/>
                    <p id='placeDesc'class="b"></p>
                </div>
            </div>

            <?=$this->load->view("Template/comment_box")?>
        </div>
    </div>
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var place = <?php echo json_encode($placeInfo); ?>;
        $('#placeName').html(place.name);
        $('#placeDesc').html(place.desc);
        if(place.name == "Error") {
            $('#otherInfo').remove();
        }
        else {
            $('#pType').html(place.type);
            $("#placeImg").attr("src", "<?php echo base_url();?>" + place.picURL);
            $('#placeAddress').html("<strong>Address: </strong>" + place.address);
            $('#placeContact').html("<strong>Contact: </strong> " + place.contact);
        }
    });
</script>

<?=$this->load->view("Template/footer")?>
