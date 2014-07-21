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

h1:first-letter{
  text-transform: uppercase;
}

</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>

<div class="row headerSpace">
        <div class="col-sm-3 col-md-2">
              <ul class="nav nav-sidebar">
                <li class='non-active'><?php echo anchor('home/view_city', 'Overview')?></li>
                <li class=<?php 
                                if($place_list[0]['type']=="restaurant"){echo "'active'";}else {
                                  echo"'non-active'";
                                }
                            ?>>
                    <?php
                    $type = 'restaurant';
                    echo anchor('home/listPlaces/' . $place_list[0]['cityID']. '/' .$type, 'Restaurants');
                    ?>
                </li>
                <li class=<?php 
                                if($place_list[0]['type']=="landmark"){echo "'active'";}else {
                                  echo"'non-active'";
                                }
                            ?>>
                    <?php
                    $type = 'landmark';
                    echo anchor('home/listPlaces/' . $place_list[0]['cityID']. '/' .$type, 'Landmarks');
                    ?>
                </li>
                <li class=<?php 
                                if($place_list[0]['type']=="shopping mall"){echo "'active'";}else {
                                  echo"'non-active'";
                                }
                            ?>>
                    <?php
                    $type = 'shopping mall';
                    echo anchor('home/listPlaces/' . $place_list[0]['cityID']. '/' .$type, 'Shopping malls');
                    ?>
                    </li>
                <li class=<?php 
                                if($place_list[0]['type']=="hotel"){echo "'active'";}else {
                                  echo"'non-active'";
                                }
                            ?>>
                    <?php
                    $type = 'hotel';
                    echo anchor('home/listPlaces/' . $place_list[0]['cityID']. '/' .$type, 'Hotels');
                    ?>
                </li>
              </ul>
         </div>

        <div class="col-sm-9 col-md-10">
        <div class="cityInfoContainer">

      	  <h1><?= $place_list[0]['type']?></h1><hr />
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
              if($place_list!=NULL){
                foreach($place_list as $place){
                  echo "<div class='row placeholders listElement'>
                    <div class='col-xs-6 col-sm-3 placeholder'>
                      <img class='1strest' src=' ". base_url() . $place['picURL'] . "'/>
                    </div>
                    <div class='col-xs-6 col-sm-9 description'>
                      <address>
                           <h4>". anchor('restaurant/lacarnitaPage', 'La Carnita') . "</h4>
                           <p >" . $place['address'] . "</p>
                           <abbr>Contact: </abbr>" . $place['contact'] . " 
                      </address>
                      
                      <div>
                           <button type='submit' class='btn btn-info'>Wanna Go</button>
                           <button type='submit' class='btn btn-info'>Been There</button>
                      </div>
                    </div>
                  </div>";
                }
              }
              ?>


          </div><!--listContainer-->
          </div><!--cityInfoContainer-->
      </div><!--col-->
</div>


<?=$this->load->view("Template/footer")?>
