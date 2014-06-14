<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<link href="<?= base_url()?>/css/rating.css" rel="stylesheet">
<link href="<?= base_url()?>/css/buttons.css" rel="stylesheet">
<style>
.row{
	padding-top:55px;	
}
.sidebar{
	background-color:#339;
	padding-top:20px;
}
.nav-sidebar{
	color:#339;	
	line-height:350%;
}
.active a{
	color:#CCC;
	font-size:22px;
	font-family:"Times New Roman", Times, serif;
	font-weight: bold;
}

.b{
	text-indent: 60px;	
}
.description{
	padding-left:48px;
}
h2{ font-family:"Comic Sans MS", cursive;}
</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>
    
    
<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav-sidebar">
            <li class="active"><a href="#">Overview</a></li>
            <li class="active"><a href="#">Restaunants</a></li>
            <li class="active"><a href="#">Landmarks</a></li>
            <li class="active"><a href="#">Shopping Malls</a></li>
            <li class="active"><a href="#">Hotels</a></li>
            <li class="active"><a href="">...</a></li>
            <li class="active"><a href="">...</a></li>
            <li class="active"><a href="">...</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-md-10 main">
      	  <h2>Restaunants</h2>
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img class="1strest" src="<?= base_url()?>/images/MillieCreperie.jpg" />
            </div>

            <div class="col-xs-6 col-sm-9 description">
              <h4><a href="#">MillieCreerie</a></h4>
             <span >Address: 161 Baldwin street </span> 
             <p class="b">Toronto, ON M5T 1L9</p>
             <p>Contact:(416) 977-1922 </p> 
             <?=$this->load->view("Template/buttons")?>
			 <?=$this->load->view("Template/rating")?>
            </div>
          </div>      
            
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img class="1strest" src="<?= base_url()?>/images/lacarnita.jpg" />
            </div>

            <div class="col-xs-6 col-sm-9 description">
              <h4><a href="#">La Carnita</a></h4>
             <span >Address: 501 College street </span> 
             <p class="b">Toronto, ON M5S 2K2</p>
             <p>Contact:(416）964-1555 </p> 
             <?=$this->load->view("Template/buttons")?>
			 <?=$this->load->view("Template/rating")?>
            </div>
          </div> 
             
            </div>

         </div>


      </div>
</div>

</body>
</html>