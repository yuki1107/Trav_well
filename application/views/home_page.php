<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<style>
.bigImageBar{
	text-align:center;
	padding-top:48px;
	background-color: #b0c4de;
	
}

.icon {
	width:200px;
	margin:5px;
    opacity: 0.4;
    filter: alpha(opacity=40); /* For IE8 and earlier */
}

.icon:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}

.iconBar{
	text-align:center;
	margin:20px auto;
}
</style>
</head>

<body>
	<?=$this->load->view("Template/header")?>
    
    <div class="bigImageBar">
        <img class="bigImage" src="<?= base_url()?>/images/TorontoImg.jpg" />
    </div>
    
    <div class="iconBar">
    	<?php echo anchor('home/cityInfoPage', '<img src="'.base_url().'/images/Toronto.gif" class="icon"/>')?>
        <?php echo anchor('cityInfo/restaurantPage', '<img src="'.base_url().'/images/Ottawa.gif" class="icon"/>')?>
        <img class="icon" src="<?= base_url()?>/images/Vancouver.gif" />
        <img class="icon" src="<?= base_url()?>/images/HongKong.gif" />
        <img class="icon" src="<?= base_url()?>/images/ShangHai.gif" />
    </div>
      
<?=$this->load->view("Template/footer")?>