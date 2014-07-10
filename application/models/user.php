<?php

class User  {
	public $username;
	public $userID;
	public $first_name;
	public $last_name;
	public $password;  
	public $email;	
	public $phone;
	public $age;
	public $gender;
	public $location;
	public $interest;
	public $bio;
	public $picture_url;
	
	public function comparePassword($enterPassword){
		return ($enterPassword == $this->password);
	}	
}