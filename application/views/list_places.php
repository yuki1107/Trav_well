<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/navg_style.css" rel="stylesheet">
<style>
.b{
	text-indent: 60px;
}
.description{
	padding-left:80px;
}

.starRate {
  unicode-bidi: bidi-override;
  direction: rtl;
  text-align: left;
  font-size: 20;
}
.starRate > a {
  display: inline-block;
  position: relative;
  width: 1.1em;
}
.starRate > a:hover:before,
.starRate > a:hover ~ a:before {
   content: "\2605";
   position: absolute;
}

</style>
</head>

<body>
    <div id='container'>
        <?=$this->load->view("Template/header")?>
        <div id='content'>
            <div class="row headerSpace">
              <div id='sideNav' class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                  <li id='overview' class='non-active'><a id='oLink' href="#">Overview</a></li>
                  <li id="restaurant" class='non-active'><a id='rLink' href='#'>Restaurants</a></li>
                  <li id="landmark" class='non-active'><a id='lLink' href="#">Landmarks</a></li>
                  <li id="shopping" class='non-active'><a id='sLink' href="#">Shopping Malls</a></li>
                  <li id="hotel" class='non-active'><a id='hLink' href="#">Hotels</a></li>
                </ul>
              </div>

              <div class="col-sm-9 col-md-10">
                <div class="cityInfoContainer">
                  <h1 id="typeName"></h1><hr />
                  <div id="listPlaces" class='listContainer'></div><!--listContainer-->
                </div><!-- cityInfoContainer -->
              </div><!-- col -->
            </div><!-- headerSpace -->
        </div><!-- content -->
<!-- JavaScript -->
<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var placeInfo = <?php echo json_encode($placeInfo);?>;
        var cn = <?php echo json_encode($cityName);?>;
        var pt = <?php echo json_encode($placeType);?>;
        /* Side Nav */
        $('#'+pt).attr('class','active');
        $('#oLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn);
        $('#rLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/restaurant");
        $('#lLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/landmark");
        $('#sLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/shopping");
        $('#hLink').attr('href',"<?php echo base_url('home'); ?>/view_city/" + cn + "/hotel");
        if(placeInfo.name == 'Error') {
          $('#typeName').html(placeInfo.name);
          $('#listPlaces').append(placeInfo.desc);
        }
        else
        {
          $('#typeName').html(pt);
          $.each(placeInfo, function(i, item) {
            var htmlText = "<div id='place"+i+"' class='row placeholders listElement'>" +
                              "<div class='col-xs-6 col-sm-3 placeholder'><img class='placeInfoImg' src='<?php echo base_url();?>"+item.picURL+"'/></div>" +
                              "<div id='"+item.name+"' class='col-xs-6 col-sm-9 description'>"+
                                  "<address><h4><a href='<?php echo base_url('home'); ?>/view_place/" + item.name +"'>"+item.name+"</a></h4>"+item.address+"<br/><abbr>Contact: </abbr>"+item.contact+"</address>" +
                                   "<div class='starRate'>" +
                                      "<a href='#'>☆</a>" +
                                      "<a href='#'>☆</a>" +
                                      "<a href='#'>☆</a>" +
                                      "<a href='#'>☆</a>" +
                                      "<a href='#'>☆</a>" +
                              "</div>" +
                              "<br>" +
                                   "<div><a class='btn btn-info' href='<?php echo base_url(); ?>interaction/wantToGo/" + item.placeID + "'>Wanna Go</a> <a class='btn btn-info' href='<?php echo base_url(); ?>interaction/placeBeen/" + item.placeID + "'>Been There</a>" +
                                   "</div></div><!--description--></div><!--row-->";
            $('#listPlaces').append(htmlText);
          });
        }
    });
</script>

<?=$this->load->view("Template/footer")?>
