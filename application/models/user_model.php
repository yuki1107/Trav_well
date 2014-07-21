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
	
	function user_update($userID, $first_name, $last_name, $age, $interest, $bio){
		$this->db->where('userID', $userID);
		$this->db->update('User', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age, 
		'interest'=>$interest, 'bio'=>$bio));
	}
	
	

}	
?>
