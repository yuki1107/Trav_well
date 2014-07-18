<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('user');
			$this->load->model('user_model');
						$this->load->model('city');
			$this->load->model('city_model');
			$this->load->helper('url');
			session_start();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home_page');
	}

	public function loginPage()
	{
		$this->load->view('login_page');
	}

	public function torontoPage(){
		$this->load->view('toronto_page');
	}

	public function profile()
	{
		$this->load->view('member_info_page');
	}

	public function view_city()
	{
		// Currently specifically gets Toronto. Will change function to take in city name
		$data = array('cityInfo' => $this->city_model->read('Toronto'));
		$this->load->view('city_page', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
