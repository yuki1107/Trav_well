<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Trav_well</title>
<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

<style>
.form-signin {
    width: 300px;
	height: 520px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 20px;
    box-shadow: 0 1px 2px rgba(0,0,0,.05);
}

.row{
	margin:150px auto;
}

.signin_text {
	font:bold;
	margin-top:100px;
	margin-bottom:50px;
}

.login_button {
	margin-top:135px;
	margin-bottom:45px;
	margin-right:200px;

}

.reg_button{
	margin-top:28px;
	margin-bottom:45px;
}

#container {
	background-color: #2B2387;
}

</style>

<script>
			function checkPassword() {
				var p1 = $("#pwd1");
				var p2 = $("#pwd2");

				if (p1.val() == p2.val()) {
					p1.get(0).setCustomValidity("");  // All is well, clear error message
					return true;
				}
				else	 {
					p1.get(0).setCustomValidity("Passwords do not match =(");
					return false;
				}
			}
		</script>
</head>


<body>
	<div id='container'>
		<?=$this->load->view("Template/header")?>
			<div class="row">
				<div class="form-signin col-lg-3 col-md-5 col-sm-12 col-lg-offset-3">
					<?php
						echo form_open('authorize/login', "role='form'");
						echo "<h2 class='signin_text'>Please sign in</h2>";
						echo form_input('username',set_value('username'), "class=form-control placeholder='Username'", "required");
						echo "<br>";
						echo form_password('password',set_value(),"id='pwd1' class=form-control placeholder='Password'","required");
						echo form_submit('submit', 'Login', "class = 'btn btn-info login_button'");
						echo form_close();
					?>
				</div>

				<div class='form-signin col-lg-3 col-md-5 col-sm-12 col-lg-offset-1 col-md-offset-1'>
					<?php
						echo form_open('authorize/register', "class='form-group' role='form'");
						echo "<h2 class='signin_text'>If not a user yet...</h2>";
						echo form_input('username',set_value('username'), "class=form-control placeholder='Username'", "required");
						echo "<br>";
						echo form_input('email',set_value('email'), "class=form-control placeholder='Email'", "required");
						echo "<br>";
						echo form_password('password',set_value(),"id='pwd1' class=form-control placeholder='Password'","required");
						echo "<br>";
						echo form_password('passconf',set_value(),"id='pwd2' class=form-control placeholder='Confirm your password'","required oninput='checkPassword();'");
						echo form_submit('submit', 'Register', "class = 'btn btn-info reg_button'");
						echo form_close();
					?>
				</div>
			</div><!-- row -->
		</div><!-- content -->
		<?=$this->load->view("Template/footer")?>
