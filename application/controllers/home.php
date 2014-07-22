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
			$this->load->model('place');
			$this->load->model('place_model');
			$this->load->model('friendship');
			$this->load->model('friendship_model');
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
		$data = array('cities' => $this->city_model->get_all_cities());
		$this->load->view('home_page', $data);
	}

	public function loginPage()
	{
		$this->load->view('login_page');
	}

	public function profile($username)
	{

		$data['user'] = $this->user_model->getUser($username);
		$userID = $data['user']->userID;

		//Check if logged in user is friends with user passed as argument
		$friendship = new Friendship();
		$friendship->user1 = $_SESSION['user']->userID;
		$friendship->user2 = $userID;
		$friends = $this->friendship_model->checkExists($friendship);

		$data['friends'] = ($friends == 1);
		$data['wants'] = $this->user_model->getWants($userID);
		$data['comments'] = $this->user_model->getComments($userID);

		$this->load->view('member_info_page', $data);
	}

	/** Gets information about a specific city from the database
	 *
	 */
	public function view_city()
	{
		/* Currently specifically gets Toronto.
		 * Should instead get post data: $_POST['cityName'], $_POST['cityCountry']
		 */
		if(isset($_POST['cityName'])) {
			$cityName = $_POST['cityName'];
			$data = array('cityInfo' => $this->city_model->get_city_by_name($cityName));
		}
		else {
			$data = array('cityInfo' => $this->city_model->get_city_by_name('Toronto'));
		}
		$this->load->view('city_page', $data);
	}


	public function messages()
	{
		$this->load->view('messages_page');
	}

	public function friends()
	{
		$this->load->view('friends_page');
	}

	public function create_message()
	{
		$this->load->view('create_message_page');
	}
	
	public function edit_info_page()
	{
		$this->load->view('edit_user');
	}
	
	public function home_page(){
		
		
		$this->load->view('home_page');
	}

	public function listPlaces($cityName, $type)
	{
		$data['restaurant_list'] = $this->place_model->get_places_by_city_type($cityName, $type);
		$this->load->view('list_places', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
