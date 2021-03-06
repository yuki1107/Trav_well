<?php
class Place_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('Place');
		$this->load->database();
	}

	function get_place_name($placeID) {
		return $this->db->select('name')->get_where('place', array('placeID'=>$placeID))->row()->name;
	}

	/**
	 * Creates an array of place information from the database
	 * @author Monica Li
	 * @return array containing place information
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
	 * Optional: get places by city and type
	 * @author Monica Li
	 * @return array of places in a city
	 */
	function get_places_by_city($cityname, $placeType='') {
		/* TODO: This should be getting post data instead */
		$places = array();
		$this->db->select('cityID');
		$this->db->like('name',$cityname);
		$qCity= $this->db->get('city');
		if ($qCity && $qCity->num_rows() > 0)
		{
			if($placeType)
			{
				$qPlaces = $this->db->get_where('place', array('cityID'=>$qCity->row()->cityID, 'type'=>$placeType));
			}
			else
			{
				$qPlaces = $this->db->get_where('place', array('cityID'=>$qCity->row()->cityID));
			}
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
	 * @return array containing place information from {@link create_place_from_data()}
	 */
	function get_place_by_name($placeName){
		$qPlace = $this->db->get_where('place', array('name'=>$placeName));
		if ($qPlace && $qPlace->num_rows() > 0)
		{
			return $this->create_place_from_data($qPlace->row());
		}
		else
		{
			return false;
		}
	}

	function get_place_by_similar_name($placeName)
	{
		$this->db->like('name',$placeName);
		$qPlace= $this->db->order_by('name', 'asc')->get('place');

		if ($qPlace && $qPlace->num_rows() > 0)
		{
			foreach($qPlace->result() as $p){
				$places[] = $this->create_place_from_data($p);
			}
			return $places;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Searches the database for places of a specific type
	 * @author Monica Li
	 * @return array of places of a specific type
	 */
	function get_places_by_type($type) {
		$places = array();
		$qPlaces = $this->db->get_where('place', array('type' => $type));
		if ($qPlaces && $qPlaces->num_rows() > 0)
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

	function addPlace($place){
		$this->db->insert('place', $place);
	}
}
?>
