<?php
class User_model extends CI_Model {

	 function __construct(){
	   parent::__construct();
	   $this->load->model('User');
	   $this->load->database();
     }

	function addUser($user) {
		return $this->db->insert('User',$user);
	}

	function getUser($username){
		return $this->db->get_where('User', array('username'=>$username))->row(0, 'User');
		// row() for transfer first row into user object
	}


	function getWants($userID) {

		$this->db->select('Place.name AS pname, City.name AS cname');
		$this->db->join('Place', 'WantToGoPlace.placeID = Place.placeID');
		$this->db->join('City', 'Place.cityID = City.cityID');
		$query = $this->db->get_where('WantToGoPlace', array('userID'=>$userID));

		if ($query->num_rows() == 0)
		{
			return False;
		}

		return $query->result();

	}

	function getComments($userID) {

		$this->db->order_by('time', 'desc');
		$query = $this->db->get_where('Comments', array('userID'=>$userID));

		if ($query->num_rows() == 0)
		{
			return False;
		}

		return $query->result();

	}

	function user_update($userID, $first_name, $last_name, $age, $interest, $bio){
		
		$this->db->where('userID', $userID);
		$this->db->update('User', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age,
		'interest'=>$interest, 'bio'=>$bio));
	}
}

?>
