<?php
class User_model extends CI_Model {

	 function __construct(){
	   parent::__construct();
	   $this->load->model('User');
	   $this->load->database();
     }

	function addUser($user) {
		return $this->db->insert('user',$user);
	}

	function getUser($username){
		return $this->db->get_where('user', array('username'=>$username))->row(0, 'user');
		// row() for transfer first row into user object
	}


	function getWants($userID) {

		$this->db->select('place.name AS pname, city.name AS cname');
		$this->db->join('place', 'wanttogoplace.placeID = place.placeID');
		$this->db->join('city', 'place.cityID = city.cityID');
		$query = $this->db->get_where('wanttogoplace', array('userID'=>$userID));

		if ($query->num_rows() == 0)
		{
			return False;
		}

		return $query->result();

	}

	function getComments($userID) {

		$this->db->order_by('time', 'desc');
		$query = $this->db->get_where('comments', array('userID'=>$userID));

		if ($query->num_rows() == 0)
		{
			return False;
		}

		return $query->result();

	}

	function user_update($userID, $first_name, $last_name, $age, $interest, $bio){
		
		$this->db->where('userID', $userID);
		$this->db->update('user', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age,
		'interest'=>$interest, 'bio'=>$bio));
	}
}

?>
