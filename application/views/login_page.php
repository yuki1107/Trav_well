<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?= base_url()?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url()?>/css/style.css" rel="stylesheet">

<style>


.form-signin {    
    max-width: 300px;
    padding: 19px 29px 29px;
	float:left;
	margin-left:450px;
	margin-top: 150px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
	margin-bottom:30px;

}

.form-reg {
    max-width: 300px;
    padding: 19px 29px 29px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
	float:right;
	margin-top:150px;
	margin-right: 500px;
	margin-bottom:30px;
}



.signin_text {
	font:bold;
	margin-top:100px;
	margin-bottom:50px;
}
.login_button {
	margin-top:120px;
	margin-bottom:45px;
	margin-right:200px;
	
}
.reg_button{
	margin-top:50px;
	margin-bottom:40px;
}
	
body {
	background-color: #000;
   
}
</style>
</head>


<body>
	<?=$this->load->view("Template/header")?>

   
    <form class="form-signin" role="form">
          <h2 class="signin_text">Please sign in</h2>
          <p><input type="email" name="login" value="" placeholder="Email"></p>
          <p><input type="password" name="password" value="" placeholder="Password"></p>

          <p class="login_button"><button type="submit" class="btn btn-info">Login</button></p>
    </form>

    
    <form class="form-reg" role="form">
    	<h2 class="signin_text">If not a user yet...</h2>
        <p><input type="text" name="Username" value="" placeholder="Create a Username"></p>
        <p><input type="email" name="email" value="" placeholder="Email"></p>
        <p><input type="password" name="password1" value="" placeholder="Create a Password"></p>
        <p><input type="password" name="password2" value="" placeholder="Confirm your Password"></p>
        <p class="reg_button"><button type="submit" class="btn btn-info">Create Your Account</button></p>
     </form>

 

        
</body>

<?=$this->load->view("Template/footer")?>