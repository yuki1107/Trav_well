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
		$this->load->model('comment');
		$this->load->model('comment_model');
		$this->load->helper('url');
		$this->load->helper('captcha');

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

		$data['cap']=$this->capt();
		$this->load->view('login_page', $data);

	}

	public function capt()
	{
		$vals = array(
    	'word' => '',
    	'img_path' => './assets/images/captcha/',
		'img_url' => base_url().'/assets/images/captcha/',
		'img_width' => '150',
		'img_height' => 30,
		'expiration' => 7200
    	);

		$cap = create_captcha($vals);
		$data = array(
		'captcha_time' => $cap['time'],
		'ip_address' => $this->input->ip_address(),
		'word' => $cap['word']
		);


		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);

		return $cap;
	}

	/**
     * Loads a given user's profile page.
     * @author Sean Gallagher
     * @param string $username, the user whose profile is to be loaded
     */
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
				$qCity = $this->city_model->get_city_name($qPlace['cityID']);
				$data = array('placeInfo' => $qPlace, 'cityName' => $qCity);
				$qComment = $this->comment_model->get_comments_by_place(urldecode($placeName));
				if($qComment){
					$data['commentList'] = $qComment;
				}
				else{
					$data['commentList'] = array('name'=>'Error');
				}
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


	/**
     * Loads the messages page.
     * @author Sean Gallagher
     */
	public function messages()
	{
		$this->load->view('messages_page');
	}

	/**
     * Loads the friends page.
     * @author Sean Gallagher
     */
	public function friends()
	{
		$this->load->view('friends_page');
	}

	/**
     * Loads the create message page.
     * @author Sean Gallagher
     */
	public function create_message()
	{
		$this->load->view('create_message_page');
	}

	public function edit_info_page()
	{
		$this->load->view('edit_user');
	}

	public function search(){
		$src_res = NULL;
		$search = $this->input->post('query');
		$srch_res = $this->place_model->get_places_by_city($search);

		if ($search == NULL)
		{
			$ref = $this->input->server('HTTP_REFERER', TRUE);
            redirect($ref, 'location');
			return False;
		}
		if($srch_res==false){
			$srch_res = $this->place_model->get_place_by_similar_name($search);
		}
		$data['search_result'] = $srch_res;
		$this->load->view('search_result_page', $data);
	}

	public function add_place_page(){
		$this->load->view('add_place');
	}

	public function add_place(){
		$this->form_validation->set_rules('placeName', 'Name of the place', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('contact', 'Contact');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Please complete your infomation!')</script>";
			$this->load->view("add_place_page");
		}
		else{
			$place = new Place();
			$place->name = $this->input->post('placeName');
			$place->address = $this->input->post('address');
			$place->contact = $this->input->post('contact');
			$place->description = $this->input->post('description');
			$place->type = $this->input->post('selectType');
			$place->cityID = $this->city_model->get_cityID_by_name($this->input->post('city'));

			$config['upload_path']          = './assets/images/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_width']            = 500;
	        $config['max_height']           = 500;
	        $this->load->library('upload', $config);
	        if ($this->upload->do_upload('placeImg')){
				$pic = array('upload_data' => $this->upload->data());
				$place->picture_url = 'assets/images/' . $pic['upload_data']['file_name'];
			}else{
				$place->picture_url = 'assets/images/place.jpg';
			}
			$this->place_model->addPlace($place);
			redirect('home/view_place/'.$place->name);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
