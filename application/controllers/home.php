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

	public function about_us()
	{
		$this->load->view('about_us');
	}

	public function login_page()
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

	/**
	 * Gets city name and searches the database for this city.
	 * On success, loads city_page with that information
	 * @author Monica Li
	 * @return array of city information
	 */
	public function view_city($cityName='', $placeType='')
	{
		/* If given city and placetype, search for place info accordingly*/
		if($cityName && $placeType) {
			$qCityPlace = $this->place_model->get_places_by_city($cityName, $placeType);
			if($qCityPlace) {
				$data = array('cityName' => $cityName,
								'placeType' => $placeType,
								'placeInfo' => $qCityPlace);
			}
			else {
				$data = array('cityName' => $cityName,
								'placeType' => $placeType,
								'placeInfo' => array('name' => 'Error', 'desc' => 'No places of type \''.$placeType.'\' found for this city'));
			}
			$this->load->view('list_places', $data);
		}
		else {
			/* Only name of city given; search for city info */
			if($cityName) {
				$qCity = $this->city_model->get_city_by_name($cityName);
				if($qCity) {
					$data = array('cityInfo' => $qCity);
				}
				else {
					$data = array('cityInfo' => array('name' => 'Error', 'desc' => 'City not found'));
				}
			}
			else {
					$data = array('cityInfo' => array('name' => 'Error', 'desc' => 'City not found'));
			}
			$this->load->view('city_page', $data);
		}
	}

	/**
	 * Gets place name and searches the database for this place.
	 * On success, loads place_page with that information
	 * @author Monica Li
	 * @return array of place information
	 */
	public function view_place($placeName ='')
	{
		if($placeName) {
			$qPlace = $this->place_model->get_place_by_name(urldecode($placeName));
			if($qPlace) {
				$data = array('placeInfo' => $qPlace);
			}
			else {
				$data = array('placeInfo' => array('name' => 'Error', 'desc' => 'Place not found1'));
			}
		}
		else {
				$data = array('placeInfo' => array('name' => 'Error', 'desc' => 'Place not found'));
		}
		$this->load->view('place_page', $data);
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

	public function search(){
		$src_res = NULL;
		$search = $this->input->post('query');
		$srch_res = $this->place_model->get_places_by_city($search);
		if($srch_res==false){
			$srch_res = $this->place_model->get_place_by_name($search);
		}
		$data['search_result'] = $srch_res;
		$this->load->view('search_result_page', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
