<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interaction extends CI_Controller {

    function __construct() {
            // Call the Controller constructor
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('user');
            $this->load->model('user_model');
            $this->load->model('messages');
            $this->load->model('messages_model');
            $this->load->model('friendship');
            $this->load->model('friendship_model');
			$this->load->model('comment');
			$this->load->model('comment_model');
            $this->load->helper(array('form', 'url', 'date'));
            session_start();
    }

    public function sendTo($username) {

        $data['username'] = $username;
        $this->load->view('create_message_page', $data);

    }

    public function sendMessage() {

        $this->form_validation->set_rules('receiver', 'To', 'required|max_length[30]');
        $this->form_validation->set_rules('content', 'Message', 'required|max_length[20000]');

        if($this->form_validation->run() == FALSE)
        {
            echo "<script>alert('Please ensure all fields have been filled out and are an acceptable length.')</script>";
            $this->load->view('create_message_page');
        }
        elseif(!$this->messages_model->checkReceiver($this->input->post('receiver')))
        {
            echo "<script>alert('Recipient does not exist. Please ensure the entered username is correct and try again.')</script>";
            $this->load->view('create_message_page');
        }
        else 
        {
            //Get receiver userID from username
            $receiver = $this->user_model->getUser($this->input->post('receiver'));

            //Put message in database
            $message = new Messages();
            $message->sender = $_SESSION['user']->userID;
            $message->receiver = $receiver->userID;
            $message->content = $this->input->post('content');
            $message->time = date('Y-m-d H:i:s');

            if(!$this->messages_model->sendMessage($message))
            {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
            }

            redirect( base_url() . 'interaction/getMessages/', 'refresh');

        }
    }

    public function addFriend($friendID) {

        $user1 = $_SESSION['user']->userID;

        $friendship = new Friendship();
        $friendship->user1 = $user1;
        $friendship->user2 = $friendID;
        $friendship->confirmed = 0;

        $checkFriendship = $this->friendship_model->checkExists($friendship);

        if ($checkFriendship == 1)
        {

            echo "<script>alert('You have already added this person as a friend.')</script>";
            redirect( base_url() . 'interaction/getFriends/', 'refresh');
            return False;

        }
        elseif ($checkFriendship == 2)
        {
            return $this->confirmFriend($friendID);
        }
        else
        {

            $result = $this->friendship_model->addFriend($friendship);

            if (!$result) {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
                return False;
            }

            echo "<script>alert('Your friend request has been sent.')</script>";
            redirect( base_url() . 'interaction/getFriends/', 'refresh');
            return True;

        }
    }

    public function confirmFriend($friendID) {

        $user1 = $_SESSION['user']->userID;

        $friendship = new Friendship();
        $friendship->user1 = $user1;
        $friendship->user2 = $friendID;
        $friendship->confirmed = 1;

        $coFriendship = new Friendship();
        $coFriendship->user1 = $friendID;
        $coFriendship->user2 = $user1;
        $coFriendship->confirmed = 1;

        $result = $this->friendship_model->confirmFriend($friendship, $coFriendship);

        if (!$result) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getFriends/', 'refresh');

    }

    public function getMessages() {

        $userID = $_SESSION['user']->userID;

        $data['messages'] = $this->messages_model->getMessages($userID);

        $this->load->view('messages_page', $data);

    }

    public function deleteMessage($messageID) {

        $result = $this->messages_model->deleteMessage($messageID);

        if (!$result) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getMessages/', 'refresh');

    }

    public function getFriends() {

        $userID = $_SESSION['user']->userID;

        $data['friends'] = $this->friendship_model->getFriends($userID);
        $data['requests'] = $this->friendship_model->getRequests($userID);

        $this->load->view('friends_page', $data);

    }

    public function removeFriend($friendID) {

        $userID = $_SESSION['user']->userID;

        $result1 = $this->friendship_model->removeFriend($userID, $friendID);
        $result2 = $this->friendship_model->removeFriend($friendID, $userID);

        if (!$result1 || !$result2) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getFriends/', 'refresh');

    }

    public function rejectFriend($friendID) {

        $userID = $_SESSION['user']->userID;

        $result = $this->friendship_model->removeFriend($friendID, $userID);

        if (!$result) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getFriends/', 'refresh');

    }

    public function wantToGo($placeID) {

        if (!isset($_SESSION['user']->userID))
        {
            echo "<script>alert('Please create an account and login to access this feature!')</script>";
            $this->load->view('login_page');
        }
        else
        {

            $result = $this->user_model->wantToGo($placeID);

            if (!$result) {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
            }

            $ref = $this->input->server('HTTP_REFERER', TRUE);
            redirect($ref, 'location');

        }
    }

    public function placeBeen($placeID) {

        if (!isset($_SESSION['user']->userID))
        {
            echo "<script>alert('Please create an account and login to access this feature!')</script>";
            $this->load->view('login_page');
        }
        else
        {

           $result = $this->user_model->placeBeen($placeID);

            if (!$result) {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
            }

            $ref = $this->input->server('HTTP_REFERER', TRUE);
            redirect($ref, 'location');

        }
    }

    public function addRating($placeID, $rating) {

        if (!isset($_SESSION['user']->userID))
        {
            echo "<script>alert('Please create an account and login to access this feature!')</script>";
            $this->load->view('login_page');
        }
        else
        {

            $result = $this->user_model->addRating($placeID, $rating);

            if (!$result) {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
            }

            $ref = $this->input->server('HTTP_REFERER', TRUE);
            redirect($ref, 'location');

        }
    }
	
	public function insertComment($placeID){
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[1]|max_length[2000]');

		if ($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Please insert your comment.')</script>";
			$this->load->view("place_page");
		}
		else
		{
            if (!isset($_SESSION['user']->userID)) 
            {
                echo "<script>alert('Please login first.')</script>";
                $this->load->view('login_page');
            }
            else
            {
                $userID = $_SESSION['user']->userID;
                $com = new Comment();
                $com->content = $this->input->post('content');
                $com->placeID = $placeID;
                $com->userID = $userID;
                $com->time = date('Y-m-d H:i:s');
                $error = $this->comment_model->addComment($com);
                redirect('home/view_place/MillieCreerie');
            }
		}
	}
}
?>