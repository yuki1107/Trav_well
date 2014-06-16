<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<link href="<?= base_url()?>/css/rating.css" rel="stylesheet">
<link href="<?= base_url()?>/css/buttons.css" rel="stylesheet">
<link href="<?= base_url()?>/css/navg_style.css" rel="stylesheet">
<link href="<?= base_url()?>/css/comment_box.css" rel="stylesheet">
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
    

<div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li><?php echo anchor('sidebar/overviewPage', 'Overview')?></li>
                <li><?php echo anchor('sidebar/restaurantPage', 'Restaurants')?></li>
                <li><a href="#">Landmarks</a></li>
                <li><a href="#">Shopping Malls</a></li>
                <li><a href="#">Hotels</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">...</a></li>
              </ul>
        </div>

        <div class="col-sm-9 col-md-10 main">
      	  <h1>Restaunants</h1>

            <div class="col-xs-6 col-sm-3 placeholder">
              <img class="1strest" src="<?= base_url()?>/images/lacarnita.jpg" />
             <span >Address: 501 College street </span> 
             <p class="b">Toronto, ON M5S 2K2</p>
             <p>Contact:(416）964-1555 </p> 
             <?=$this->load->view("Template/buttons")?>
             <?=$this->load->view("Template/rating")?>
           </div>
          
            <div class="col-xs-6 col-sm-9 description">
              <h2>La Carnita</h2>
             <p class="b">
             La Carnita Restaurant is a moderately priced casual Mexican restaurant located by College St and Spadina Ave in the 
             Kensington Market area of Downtown Toronto.
             </p>
             <p class="b">
             La Carnita has permanently "popped up" in the former location of Briscola near the corner of College and Palmerston. 
             The restaurant unites the talents of Andrew Richmond, a designer turned chef, and entrepreneur Amin Todai, both of 
             whom have been at the forefront of the culinary zeitgeist that is the pop-up food craze. Over the last year or so, 
             they've been sending Toronto's food enthusiasts into a frenzy with their series of one-off appearances that marry top
             notch tacos with street art and a general party vibe.
             </p>
             <p class="b">
             Upon entering, it's hard to imagine how the space was once an upscale Italian eatery, especially 
             considering the saucy 'Gringo' spelled out in the entranceway tiles. Not content to entirely forego the 
             "get-it-while-it's-here" mentality of its previous life, the restaurant is currently not accepting reservations, but 
             seating about 80 people and featuring a sizeable bar, La Carnita's vibe and atmosphere are only seconded by the food 
             itself. Where else can you grab a forty of O.E. ($13.50 for a litre) and listen to R. Kelly blaring on the speakers?
             </p>
             <p class="b">
             Richmond has stated that authenticity isn't La Carnita's main objective. Rather, it's his own 
             interpretation of Mexican Street Food, which drops in a few Asian accents. This is perfectly apparent in his 
             signature dish, In Cod We Trust ($5). Hints of lemongrass permeate the famous Voltron Sauce that's drizzled over a 
             beer-battered cod, then topped with refreshingly crisp cabbage and tart julienned green apple.
             </p>
             
             <hr />
	
            </div>
            <?=$this->load->view("Template/comment_box")?> 
        </div>
     </div>
</div>
<?=$this->load->view("Template/footer")?>