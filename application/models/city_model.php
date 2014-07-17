<?php
class City_model extends CI_Model {

	 function __construct(){
	   parent::__construct(); 
	   $this->load->model('City');
	   $this->load->database();
     }

	function insert($city) {
		return $this->db->insert('citys',$city);
	}
	
	function read($cityname){
		return $this->db->get_where('citys', array('name'=>$cityname))->row(0, 'City');
		// row() for transfer first row into user object
	}
	
}
?>