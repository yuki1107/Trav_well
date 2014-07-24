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

		//check whether the user already said they want to go here, or said they have been there
		$query1 = $this->db->get_where('wantToGoPlace', array('userID'=>$userID, 'placeID'=>$placeID));
		$query2 = $this->db->get_where('placesBeen', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($query1->num_rows() != 0 || $query2->num_rows() != 0) {
			return True;
		}

		$this->db->insert('wantToGoPlace', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($this->db->affected_rows() > 0)
      	{
        	return True;
      	}

      return False;
	}

	function placeBeen($placeID) {

		$userID = $_SESSION['user']->userID;

		//check whether the user already said they have been here
		$query = $this->db->get_where('placesBeen', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($query->num_rows() != 0) {
			return True;
		}

		//if a user has been somewhere, remove it from where they want to go
		$this->db->delete('wantToGoPlace', array('userID'=>$userID, 'placeID'=>$placeID));
		$this->db->insert('placesBeen', array('userID'=>$userID, 'placeID'=>$placeID));

		if ($this->db->affected_rows() > 0)
      	{
        	return True;
      	}

      return False;
	}

	function addRating($placeID, $rating) {

		$userID = $_SESSION['user']->userID;

		//delete rating if it exists already
		$this->db->delete('rating', array('userID'=>$userID, 'placeID'=>$placeID));

		$this->db->insert('rating', array('userID'=>$userID, 'placeID'=>$placeID, 'rating'=>$rating));

		if ($this->db->affected_rows() > 0)
      	{
        	return True;
      	}

      return False;
	}

	function user_update($userID, $first_name, $last_name, $age, $interest, $bio) {

		$this->db->where('userID', $userID);
		$this->db->update('user', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age,
		'interest'=>$interest, 'bio'=>$bio));
	}

	function user_pic_change($userID, $picture_url) {
		$this->db->where('userID', $userID);
		$this->db->update('user', array('picture_url'=>$picture_url));
	}

	function find_similar_users($userID) {
		/* Find users who want to go to the same place */
		$simPlaces = array();
		$this->db->select('*')->from('wantToGoPlace myWTGP')->where('myWTGP.userID', $userID);
		$this->db->join('wantToGoPlace', 'wantToGoPlace.placeID = myWTGP.placeID AND wantToGoPlace.userID != myWTGP.userID', 'inner');
		$qSimPlace = $this->db->get();
		if ($qSimPlace->num_rows() > 0)
		{
			foreach($qSimPlace->result() as $p) {
	            $simPlaces[] = $p->userID;
			}
        }
        return $simPlaces;
	}
}

?>
