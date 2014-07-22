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
		$src_res = NULL;
		$this->load->view('search_result');
		$search = $this->input->post('query');
		$srch_res = $this->place_model->get_places_by_city($search);
		if($srch_res==false){
			$srch_res = $this->place_model->get_place_by_name($search);
		}
		$data['search_result'] = $srch_res;
		$this->load->view('search_result_page', $data);
	}
	

		
	
	
}
	