<?php
class City_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('City');
		$this->load->database();
	}

	function insert_city($city) {
		return $this->db->insert('City',$city);
	}

	/**
	 * Creates an array of city information from the database
	 * @author Monica Li
	 * @return an array containing place information
	 */
	function create_city_from_data($city)
	{
		$cityInfo = array(
					'cityId' => $city->cityID,
					'name' => $city->name,
					'country' => $city->country,
					'picURL' => $city->picture_url,
					'desc' => $city->description
				);
		return $cityInfo;
	}

	/**
	 * Searches the database for places with name
	 * @author Monica Li
	 * @return an array containing city information from {@link create_place_from_data()}
	 */
	function get_city_by_name($cityName) {
		/* TODO: This should be getting post data instead */
		$qCity = $this->db->get_where('City', array('name'=>$cityName));
		if ($qCity->num_rows() > 0)
		{
			return $this->create_city_from_data($qCity->row());
		}
		else
		{
			return false;
		}
	}

	/**
	 * Searches the database for places in a particular city
	 * @author Monica Li
	 * @return an array of cities in a country
	 */
	function get_cities_by_country($country) {
		/* TODO: This should be getting post data instead */
		$cities = array();
		$qCities = $this->db->get_where('City', array('country'=>$country));
		if ($qCities->num_rows() > 0)
		{
			foreach($qCities->row() as $c)
			{
				$cities[] = $this->create_city_from_data($qCities->row($c));
			}
		}
		else
		{
			return false;
		}
		return $cities;
	}

}
?>
