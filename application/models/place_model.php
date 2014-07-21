<?php
class Place_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('Place');
		$this->load->database();
	}

	function insert_place() {
		;
	}

	/**
	 * Creates an array of place information from the database
	 * @author Monica Li
	 * @return an array containing place information
	 */
	function create_place_from_data($place) {
		$placeInfo = array(
						'placeID' => $place->placeID,
						'name' => $place->name,
						'address' => $place->address,
						'type' => $place->type,
						'cityID' => $place->cityID,
						'desc' => $place->description,
						'picURL' => $place->picture_url,
						'contact' =>$place->contact
					);
		return $placeInfo;
	}

	/**
	 * Searches the database for places in a particular city
	 * @author Monica Li
	 * @return an array of places in a city
	 */
	function get_places_by_city($cityname) {
		/* TODO: This should be getting post data instead */
		$places = array();
		$qCity = $this->db->select('cityID')->get_where('city', array('name'=>$cityname));
		if ($qCity->num_rows() > 0)
		{
			$qPlaces = $this->db->get_where('Place', array('cityID'=>$qCity->row()->cityID));
			if ($qPlaces->num_rows() > 0)
			{
				foreach($qPlaces->result() as $p)
				{
					$places[] = $this->create_place_from_data($p);
				}
			}
		}
		else
		{
			return false;
		}
		return $places;
	}

	/**
	 * Searches the database for places with name
	 * @author Monica Li
	 * @return an array containing place information from {@link create_place_from_data()}
	 */
	function get_place_by_name($placeName)
	{
		/* TODO: This should be getting post data instead */
		$qPlace = $this->db->get_where('Place', array('name'=>$placeName));
		if ($qPlace->num_rows() > 0)
		{
			return $this->create_place_from_data($qPlace->row());
		}
		else
		{
			return false;
		}
	}

	/**
	 * Searches the database for places of a specific type
	 * @author Monica Li
	 * @return an array of places of a specific type
	 */
	function get_places_by_type($type) {
		/* TODO: This should be getting post data instead */
		$places = array();
		$qPlaces = $this->db->get_where('Place', array('type' => $type));
		if ($qPlaces->num_rows() > 0)
		{
			foreach($qPlaces->result() as $p)
			{
				$places[] = $this->create_place_from_data($p);
			}
		}
		else
		{
			return false;
		}
		return $places;
	}

	function get_places_by_city_type($cityname, $type) {
		/* TODO: This should be getting post data instead */
		$places = array();
		$qCity = $this->db->select('cityID')->get_where('City', array('name'=>$cityname));
		if ($qCity->num_rows() > 0)
		{
			$qPlaces = $this->db->get_where('Place', array('cityID'=>$qCity->row()->cityID, 'type'=>$type));
			if ($qPlaces->num_rows() > 0)
			{
				foreach($qPlaces->result() as $p)
				{
					$places[] = $this->create_place_from_data($p);
				}
			}
		}
		else
		{
			return false;
		}
		return $places;
	}

}
?>
