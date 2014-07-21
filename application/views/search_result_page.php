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

<div class="headerSpace">
        
        <div class="container">

      	  <h1>Search Result</h1><hr />
          <div class='listContainer'>
              <?php 
              if($search_result!=NULL){
                foreach($search_result as $place){
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
              else{
                echo '<p>Keyword not found</p>';
              }
              ?>


          </div><!--listContainer-->
          </div><!--cityInfoContainer-->
</div>


<?=$this->load->view("Template/footer")?>
