<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authorize extends CI_Controller {

    function __construct() {
    		// Call the Controller constructor
	    	parent::__construct();
    		$this->load->library('form_validation');
			$this->load->model('user');
			$this->load->model('user_model');
			$this->load->helper(array('form','url'));
	    	session_start();
    }


	public function register(){
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', "required|is_unique[user.email]|valid_email");


		if ($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Please check your infomation!')</script>";
			$this->load->view("login_page");
		}
		else
		{
			$user = new User();
			$user->username = $this->input->post('username');
			$user->password = $this->input->post('password');
			$user->email = $this->input->post('email');
			$user->phone = NULL;
			$user->age = NULL;
			$user->gender = NULL;
			$user->location = NULL;
			$user->bio = NULL;
			$user->picture_url = NULL;

			$error = $this->user_model->addUser($user);

			redirect('home/index');
		}
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_page');
		}
		else
		{

			$username = $this->input->post('username');
			$enterPwd = $this->input->post('password');

			$user = $this->user_model->getUser($username);
			if($user && $user->comparePassword($enterPwd)){
				$_SESSION['user'] = $user;
				redirect('home/index');
			}else{
				$errMsg = "Incorrect Username or Password!";
				$this->load->view('login_page', $errMsg);
			}
		}
	}

	public function comparePassword($password, $user){
		if(isset($password) && isset($user) && $user->password == $password){
			return true;
		}else{
			return false;
		}
	}


	public function logout(){
		unset($_SESSION['user']);
		redirect('home/index');
	}
	
	public function update(){
		$this->form_validation->set_rules('fir_name', 'firstname', 'required');
		$this->form_validation->set_rules('las_name', 'lastname', 'required');
		$this->form_validation->set_rules('age', 'age', 'required');
		$this->form_validation->set_rules('interest', 'interest', 'required');
		$this->form_validation->set_rules('bio', 'bio', 'required');
		$fir = $this->input->post('fir_name');
		$las = $this->input->post('las_name');
		$age = $this->input->post('age');
		$interest = $this->input->post('interest');
		$bio = $this->input->post('bio');
		
		if($this->form_validation->run()!= FALSE){
			if(isset($_SESSION['user'])){
				$user = $_SESSION['user'];
				$this->user_model->user_update($user->userID, $fir, $las, $age, $interest, $bio);
				/*$user_new = new User();
				$user_new = $this->user_model->getUser($user->username);
				$_SESSION['user'] = $user_new;
				redirect('home/profile/$user_new->username')*/
				redirect('home/home_page');		
			}
		}else{
			echo "<script>alert('Fields cannot be empty!')</script>";
			$this->load->view('edit_user');
		}
	}
	
	public function change_pic(){

		$config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_width']            = 300;
        $config['max_height']           = 300;
		
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('userimg')){
			$pic = array('upload_data' => $this->upload->data());
		
			$user= $_SESSION['user'];
			
			$this->user_model->user_pic_change($user->userID, '/assets/images/' .$pic['upload_data']['file_name']);
			redirect('home/index');	
		}else{
			echo "<script>alert('" . $this->upload->display_errors('','') . "')</script>";
			echo "<script>window.history.back();</script>";

		}
	}
		


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
