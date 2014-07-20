<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet">
<link href="/assets/css/navg_style.css" rel="stylesheet">
<style>

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
                    <li class="non-active"><a href="/home/profile">Home</a></li>
                    <li class="active"><a href="">Friends</a></li>
                    <li class="non-active"><a href="/home/messages">Messages</a></li>
                  </ul>
            </div>

            <div class="cityInfoContainer">
                <div class="col-xs-10">
                  <h2>Friends</h2>
                </div>

                <div class="col-xs-6 description">
                  <p>You don't have any friends</p>
                </div>
            </div><!--cityInfoContainer-->
    </div>

    <?=$this->load->view("Template/footer")?>

</body>
</html>
