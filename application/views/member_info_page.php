<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">
<link href="<?= base_url()?>/css/navg_style.css" rel="stylesheet">
<style>

.description{ padding-left:45px; }

p { font-family:sans-serif; }

h3 { background-color: black;
     color: white;
     font-family:sans-serif;
     text-indent: 10px; }

.sidebar { bottom: 0px;}

.placeholder { margin-left: 20px; }

</style>

</head>

<body>

    <?=$this->load->view("Template/header")?>

    <div class="row headerSpace">
            <div class="col-xs-2 sidebar">
                  <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="non-active"><a href="#">Friends</a></li>
                    <li class="non-active"><a href="#">Messages</a></li>
                  </ul>
            </div>
            
            <div class="cityInfoContainer">
                <div class="col-xs-10">
                  <h2>jdo13's Profile</h2>
                </div>
    
                <div class="col-xs-2 placeholder">
                  <img src="<?= base_url()?>/images/profile.png" align="center" />
                </div>
    
                <div class="col-xs-6 description">
                    <h3>Basic</h3>
                    <p>Name: John Doe</p>
                    <p>Age: 25</p>
                    <p>Interests: Water Polo, Biochemistry</p>
                    <p>Bio: I am a writer from California</p>
                    <h3>Wants to Visit</h3>
                        <ul> <li> MillieCreerie (Toronto) </li></ul>
                    <h3>Posted Reviews</h3>
                        <ul><li> La Carnita nightmare...</li></ul>
                </div>
    
                <div class="col-xs-8">
                  <p>
                    <button type="submit" class="btn btn-info">Add to Friends</button>
                    <button type="submit" class="btn btn-info">Send Message</button>
                  </p>
                </div>
            </div><!--cityInfoContainer-->
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>