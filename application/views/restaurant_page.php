<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/Trav_well/assets/css/style.css" rel="stylesheet">
<link href="/Trav_well/assets/css/rating.css" rel="stylesheet">
<link href="/Trav_well/assets/css/buttons.css" rel="stylesheet">
<link href="/Trav_well/assets/css/navg_style.css" rel="stylesheet">
<style>
.b{
	text-indent: 60px;
}
.description{
	padding-left:80px;
}

h1{ font-family:"Comic Sans MS", cursive;}

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

      	  <h1>Restaunants</h1><hr />
          <div class='listContainer'>
              <div class="row placeholders listElement">
                <div class="col-xs-6 col-sm-3 placeholder">
                  <img class="1strest" src="/Trav_well/assets/images/lacarnita.jpg" />
                </div>

                <div class="col-xs-6 col-sm-9 description">
                    <address>
                         <h4><?php echo anchor('restaurant/lacarnitaPage', 'La Carnita')?></h4>
                         501 College street<br />
                         Toronto, ON M5S 2K2<br />
                         <abbr>Contact: </abbr>(416）964-1555
                     </address>
                     <?=$this->load->view("Template/rating")?>
                     <div>
                         <button type="submit" class="btn btn-info">Wanna Go</button>
                         <button type="submit" class="btn btn-info">Been There</button>
                     </div>
                </div><!--description-->
              </div> <!--row-->


              <div class="row placeholders listElement">
                <div class="col-xs-6 col-sm-3 placeholder">
                  <img class="1strest" src="/Trav_well/assets/images/MillieCreperie.jpg" />
                </div>

                <div class="col-xs-6 col-sm-9 description">
                    <address>
                         <h4>MillieCreerie</h4>
                         161 Baldwin street <br />
                         Toronto, ON M5T 1L9<br />
                         <abbr>Contact: </abbr>(416) 977-1922
                    </address>
                     <?=$this->load->view("Template/rating")?>
                     <div>
                         <button type="submit" class="btn btn-info">Wanna Go</button>
                         <button type="submit" class="btn btn-info">Been There</button>
                     </div>
                </div><!--description-->
              </div><!--row-->
          </div><!--listContainer-->
          </div><!--cityInfoContainer-->
      </div><!--col-->
</div>


<?=$this->load->view("Template/footer")?>
