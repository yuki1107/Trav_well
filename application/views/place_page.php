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

#placeInfo{
    margin-top: 15px;
}

#placeDesc{
    text-align: justify;
}

.placeDetailImg{
    width:330px;
    height:auto;
    border:5px double #DDD;
}

.commentBox{
    height:150px;
    margin-bottom:10px;
}

.commentArea{
    margin-top:30px;
}

.btn-this{
    width:160px;
}

.btnArea{
    margin-top:5px;
    text-align: justify;
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

        <div id="mainBody" class="col-sm-9 col-md-10">
            <div class="cityInfoContainer">
                <h1 id='placeName'></h1><hr/>
                <div class="row">
                    <div id='otherInfo' class="col-xs-6 col-sm-4 placeholder ">
                        <img id='placeImg' class='placeDetailImg' src='' />
                        <div class='btnArea'>
                            <button type="button" class="btn btn-info btn-this">Wanna go</button>
                            <button type="button" class="btn btn-info btn-this">Has been</button>
                        </div>
                        <div id='placeInfo'>
                                <p id='placeAddress'></p>
                                <p id='placeContact'></p>
                        </div>
                    </div>

                    <div id='mainInfo' class="col-xs-6 col-sm-8 description">
                        <p id='placeDesc'class="cityInfoFont"></p>
                    </div>
                </div>

                <div class="form-group commentArea">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5"></textarea>
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>
        </div>

            
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
            $('#placeAddress').html("<strong>Address: </strong><br>" + place.address);
            $('#placeContact').html("<strong>Contact: </strong> " + place.contact);
        }
    });
</script>

<?=$this->load->view("Template/footer")?>
