<?php
class City_model extends CI_Model {

	 function __construct(){
	   parent::__construct();
	   $this->load->model('City');
	   $this->load->database();
     }

	function insert($city) {
		return $this->db->insert('City',$city);
	}

	function read($cityname){

		$qCity = $this->db->get_where('City', array('name'=>$cityname));
		$cityInfo = array(
                    "cityId" => $qCity->row()->cityID,
                    "name" => $qCity->row()->name,
                    "country" => $qCity->row()->country,
                    "picURL" => $qCity->row()->picture_url,
                    "desc" => $qCity->row()->description
                );
            return $cityInfo;
	}

}
?>
