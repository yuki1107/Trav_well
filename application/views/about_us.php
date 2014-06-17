<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<style>
body {
	background-color: #306;
   
}
.iconBar{
	text-align:center;
	margin:20px auto;
	margin-top: 200px;
	margin-right:20px;
}

.member {
    float: left;
    width: 31%;
    margin: 1% 1% 45px 1%;
	margin-right:20px;
}

</style>

</head>


<body>
<?=$this->load->view("Template/header")?>
    <div class="iconBar">
        <div class="member">
            <img class="icon" src="<?= base_url()?>/images/1.gif" width="304" height="350"/>
            <h3 style="background-color:white;">FuJun Shen</h3> 
        </div>
        <div class ="member">
            <img class="icon" src="<?= base_url()?>/images/2.gif" width="304" height="350"/>
        	<h3 style="background-color:white;">Sean Gallagher</h3>
        </div>
        <div class="member"> 
        	<img class="icon" src="<?= base_url()?>/images/3.gif" width="304" height="350"/>
       		<h3 style="background-color:white;">Sophie Ding</h3>
        </div>
        <div class="member"> 
        	<img class="icon" src="<?= base_url()?>/images/4.gif" width="304" height="350"/>
        	<h3 style="background-color:white;">Emmy Wang</h3>
        </div> 
        <div class="member"> 
        	<img class="icon" src="<?= base_url()?>/images/5.gif" width="304" height="350"/>
        	<h3 style="background-color:white;">Yuki He</h3>
        </div> 
    </div>


</body>
</html>