<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
			$this->load->model('place');
			$this->load->model('place_model');
			$this->load->helper(array('form','url'));
	    	session_start();
    }
	
	public function lookup(){

		$this->load->view('search_result');
		$search = $this->input->get('query');
		$haha = $this->place_model->get_places_by_city($search);
		
		var_dump($haha);
		
		var_dump($search);

	}
}
	