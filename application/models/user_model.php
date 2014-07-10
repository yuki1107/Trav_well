<?php
class User_model extends CI_Model {

	 function __construct(){
	   parent::__construct(); 
	   $this->load->model('User');
	   $this->load->database();
     }

	function insert($user) {
		return $this->db->insert('users',$user);
	}
	
	function read($username){
		return $this->db->get_where('users', array('username'=>$username))->row(0, 'User');
		// row() for transfer first row into user object
	}
	
}
?>