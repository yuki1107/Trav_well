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
	
}

.bigImage{
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

#footer{
	text-align:center;
	background-color:black;
	color:white;
}
</style>
</style>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <img id="logo" src='<?= base_url()?>/images/logo.gif' />
        </div>
        
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
          	<a id="login" href="" >Login</a>
            
            <div class="form-group">
              <input type="keyword" placeholder="Search" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-info">Search</button>
          </form>
        </div><!--/.navbar-collapse -->
        
      </div>
    </div>
    
    <div class="bigImageBar">
        <img class="bigImage" src="<?= base_url()?>/images/TorontoImg.jpg" />
    </div>
    
    <div class="iconBar">
    	<img class="icon" src="<?= base_url()?>/images/Toronto.gif" />
        <img class="icon" src="<?= base_url()?>/images/Ottawa.gif" />
        <img class="icon" src="<?= base_url()?>/images/Vancouver.gif" />
        <img class="icon" src="<?= base_url()?>/images/HongKong.gif" />
        <img class="icon" src="<?= base_url()?>/images/ShangHai.gif" />
    </div>
      
    <footer id="footer">
    	<p>@trav_well.com 2014</p>
    </footer>
</body>
</html>