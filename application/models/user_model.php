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

    /**
     * Creates an array of places a given user wishes to visit.
     * @author Sean Gallagher
     * @param int $userID, the user's ID
     * @return an array of places the given user wishes to visit, or false if there are no results.
     */
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

    /**
     * Creates an array of comments a given user has posted.
     * @author Sean Gallagher
     * @param int $userID, the user's ID
     * @return an array of comments the given user has posted, or false if there are no results.
     */
	function getComments($userID) {

        $this->db->select('place.name AS pname, city.name AS cname, content');
		$this->db->order_by('time', 'desc');
        $this->db->join('place', 'comments.placeID = place.placeID');
        $this->db->join('city', 'place.cityID = city.cityID');
		$query = $this->db->get_where('comments', array('userID'=>$userID));

		if ($query->num_rows() == 0)
		{
			return False;
		}

		return $query->result();

	}

    /**
     * Marks that the currently logged in user wishes to go to a given place.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place
     * @return True if the user's desire has been recorded and False otherwise.
     */
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

    /**
     * Marks that the currently logged in user has been to a given place.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place
     * @return True if the information has been recorded and False otherwise.
     */
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

    /**
     * Records the currently logged in user's rating of a place.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place
     * @param int $rating, the rating the user assigned the place
     * @return True if the information has been recorded and False otherwise.
     */
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
	
		/**
	 * replace old user information by new entered infor.
	 * @author FuJun Shen
	 */
	function user_update($userID, $first_name, $last_name, $age, $interest, $bio) {

		$this->db->where('userID', $userID);
		$this->db->update('user', array('first_name'=>$first_name, 'last_name'=>$last_name, 'age'=>$age,
		'interest'=>$interest, 'bio'=>$bio));
	}
	
		/**
	 * add new user profile picture.
	 * @author FuJun Shen
	 */
	function user_pic_change($userID, $picture_url) {
		$this->db->where('userID', $userID);
		$this->db->update('user', array('picture_url'=>$picture_url));
	}

	/**
	 * Creates an array of usernames of other users who want to go to the same places as
	 * @author Monica Li
	 * @return array containing usernames who want to go to the same places as you.
	 */
	function find_similar_users($userID) {
		/* Find users who want to go to the same place */
		$simPlaces = array();
		$this->db->select('*')->from('wantToGoPlace myWTGP')->where('myWTGP.userID', $userID);
		$this->db->join('wantToGoPlace', 'wantToGoPlace.placeID = myWTGP.placeID AND wantToGoPlace.userID != myWTGP.userID', 'left');
		$this->db->join('user', 'user.userID = wantToGoPlace.userID','left');
		$qSimPlace = $this->db->get();
		if ($qSimPlace->num_rows() > 0)
		{
			foreach($qSimPlace->result() as $p) {
				$simPlaces["$p->userID"] = $p->username;
			}
        }
       	/* Find users who want to go to the same place */
		$simCities = array();
		$this->db->select('*')->from('wantToGoCity myWTGC')->where('myWTGC.userID', $userID);
		$this->db->join('wantToGoCity', 'wantToGoCity.cityID = myWTGC.cityID AND wantToGoCity.userID != myWTGC.userID', 'left');
		$this->db->join('user', 'user.userID = wantToGoCity.userID','left');
		$qSimCity = $this->db->get();
		if ($qSimCity->num_rows() > 0)
		{
			foreach($qSimCity->result() as $c) {
				$simCities["$c->userID"] = $c->username;
			}
        }
        /* Merge two arrays */
        if(!$simPlaces) {
        	$simUsers = $simCities;
        }
        else if (!$simCities) {
        	$simUsers = $simPlaces;
        }
        else {
        	$simUsers = $simPlaces + $simCities;
        }
        return $simUsers;
	}
	
}

?>
