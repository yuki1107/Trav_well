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
		$this->db->join('place', 'wantToGoPlace.placeID = place.placeID');
		$this->db->join('city', 'place.cityID = city.cityID');
		$query = $this->db->get_where('wantToGoPlace', array('userID'=>$userID));

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

	function wantToGo($placeID) {

		$userID = $_SESSION['user']->userID;

		//check whether the user already said they want to go here
		$query = $this->db->get_where('wantToGoPlace', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($query->num_rows() != 0) {
			return True;
		}

		$this->db->insert('wantToGoPlace', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($this->db->affected_rows() > 0)
      	{
        	return True;
      	}

      return False; 
	}

	function user_update($userID, $first_name, $last_name, $age, $interest, $bio){
		
		$this->db->where('userID', $userID);
		$this->db->update('user', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age,
		'interest'=>$interest, 'bio'=>$bio));
	}
}

?>
