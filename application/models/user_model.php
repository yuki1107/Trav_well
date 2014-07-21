<?php
class User_model extends CI_Model {

	 function __construct(){
	   parent::__construct();
	   $this->load->model('User');
	   $this->load->database();
     }

	function insert($user) {
		return $this->db->insert('User',$user);
	}

	function read($username){
		return $this->db->get_where('User', array('username'=>$username))->row(0, 'User');
		// row() for transfer first row into user object
	}
	
	fuction username_change($username, $newname){
		$this->db->where('User', array('username'=>$username));
		$this->db->update('User', $newname);
	}
	
	
	function fir_change($first_name, $newfir){
		$this->db->where('User', array('first_name'=>$first_name));
		$this->db->update('User', $newfir);
	}
	
	

}	
?>
