<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style>
#logo{
	width:150px;
	margin:5px;
}

#login{
	margin-top:15px;
	margin-right: 20px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size:18px;
}
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
    
    
    <div class="jumbotron">
      <div class="container">
        <div> <!--image bar-->
        	
        </div>
      </div>
    </div>
</body>
</html>