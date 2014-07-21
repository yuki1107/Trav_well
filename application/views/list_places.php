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
<style>
.b{
	text-indent: 60px;
}
.description{
	padding-left:80px;
}

h1{ 
  font-family:"Georgia, serif", cursive;
  font-size: 50px;
}

</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>

<div class="row headerSpace">
        <div class="col-sm-3 col-md-2">
              <ul class="nav nav-sidebar">
                <li class='non-active'><?php echo anchor('sidebar/overviewPage', 'Overview')?></li>
                <li class="active"><a href="#">Restaurants</a></li>
                <li class='non-active'><a href="#">Landmarks</a></li>
                <li class='non-active'><a href="#">Shopping Malls</a></li>
                <li class='non-active'><a href="#">Hotels</a></li>
              </ul>
         </div>

        <div class="col-sm-9 col-md-10">
        <div class="cityInfoContainer">

      	  <h1>Restaurants</h1><hr />
          <div class='listContainer'>

<!--
              <div class="row placeholders listElement">
                <div class="col-xs-6 col-sm-3 placeholder">
                  <img id='placeImg' class="1strest" src="<?php echo base_url();?>assets/images/lacarnita.jpg" />
                </div>

                <div class="col-xs-6 col-sm-9 description">
                    <address>
                         <h4 id='placeHeader'><?php echo anchor('restaurant/lacarnitaPage', 'La Carnita')?></h4>
                         <p id='placeAddr'>501 College street<br/>
                         Toronto, ON M5S 2K2<br/></p>
                         <abbr>Contact: </abbr><span id='placeContact'>(416）964-1555</span>
                     </address>
                     <?=$this->load->view("Template/rating")?>
                     <div>
                         <button type="submit" class="btn btn-info">Wanna Go</button>
                         <button type="submit" class="btn btn-info">Been There</button>
                     </div>
                </div>          //description
              </div>            //row
-->

              <?php 
                foreach($restaurant_list as $restaurant){
                  echo "<div class='row placeholders listElement'>
                    <div class='col-xs-6 col-sm-3 placeholder'>
                      <img class='1strest' src=' ". base_url() . $restaurant['picURL'] . "'/>
                    </div>
                    <div class='col-xs-6 col-sm-9 description'>
                      <address>
                           <h4>". anchor('restaurant/lacarnitaPage', 'La Carnita') . "</h4>
                           <p >" . $restaurant['address'] . "</p>
                           <abbr>Contact: </abbr>" . $restaurant['contact'] . " 
                      </address>
                      
                      <div>
                           <button type='submit' class='btn btn-info'>Wanna Go</button>
                           <button type='submit' class='btn btn-info'>Been There</button>
                      </div>
                    </div>
                  </div>";
                }
              ?>

              <script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
              <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
              <script>
                  $(document).ready(function() {
                      var place = <?php echo json_encode($placeInfo); ?>;
                      $('#placeHeader').html(city.name);
                      $("#placeImg").attr("src", city.picURL);
                      $('#placeAddr').html(place.a)
                  });
              </script>


          </div><!--listContainer-->
          </div><!--cityInfoContainer-->
      </div><!--col-->
</div>


<?=$this->load->view("Template/footer")?>
