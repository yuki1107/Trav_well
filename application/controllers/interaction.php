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
            $this->load->model('place');
            $this->load->model('place_model');
            $this->load->helper(array('form', 'url', 'date'));
            session_start();
    }

    /**
     * Load the create message page with the recipient username already populated.
     * @author Sean Gallagher
     * @param string $username, the username of the recipient
     */
    public function sendTo($username) {

        $data['username'] = $username;
        $this->load->view('create_message_page', $data);
    }

    /**
     * Send a message from the currently logged in user.
     * Information about the message to be sent is supplied from the create message view.
     * @author Sean Gallagher 
     */
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

    /**
     * Request that a user be added to the currently logged in user's friends list.
     * @author Sean Gallagher
     * @param int $friendID, the id of the user being added
     * @return True if operation successful, False otherwise
     */
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

    /**
     * Confirm a friend request.
     * @author Sean Gallagher
     * @param int $friendID, the id of the user who initiated the request
     */
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

    /**
     * Get messages for the logged in user and go to the messages page.
     * @author Sean Gallagher
     */
    public function getMessages() {

        $userID = $_SESSION['user']->userID;

        $data['messages'] = $this->messages_model->getMessages($userID);

        $this->load->view('messages_page', $data);
    }

    /**
     * Delete a message for the logged in user.
     * @author Sean Gallagher
     * @param int $messageID, the id of the message to be deleted
     */
    public function deleteMessage($messageID) {

        $result = $this->messages_model->deleteMessage($messageID);

        if (!$result) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getMessages/', 'refresh');
    }

    /**
     * Get the friends of the logged in user and go to the friends page.
     * @author Sean Gallagher
     */
    public function getFriends() {

        $userID = $_SESSION['user']->userID;

        $data['friends'] = $this->friendship_model->getFriends($userID);
        $data['requests'] = $this->friendship_model->getRequests($userID);

        $this->load->view('friends_page', $data);
    }

    /**
     * Remove a friend for the logged in user.
     * @author Sean Gallagher
     * @param int $friendID, the user id of the friend to be removed
     */
    public function removeFriend($friendID) {

        $userID = $_SESSION['user']->userID;

        $result1 = $this->friendship_model->removeFriend($userID, $friendID);
        $result2 = $this->friendship_model->removeFriend($friendID, $userID);

        if (!$result1 || !$result2) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getFriends/', 'refresh');
    }

    /**
     * Reject a friend request for the logged in user.
     * @author Sean Gallagher
     * @param int $friendID, the user id of the friend whose request is to be rejected
     */
    public function rejectFriend($friendID) {

        $userID = $_SESSION['user']->userID;

        $result = $this->friendship_model->removeFriend($friendID, $userID);

        if (!$result) {
            echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
        }

        redirect( base_url() . 'interaction/getFriends/', 'refresh');
    }

   /**
     * Mark that the logged in user wants to go somewhere.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place the user wants to go
     */
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

   /**
     * Mark that the logged in user has been somewhere.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place the user has been
     */
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

   /**
     * Add the currently logged in user's rating for a given place to the database.
     * @author Sean Gallagher
     * @param int $placeID, the id of the place the user has rated
     * @param int $rating, the rating the user gave
     */
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

    /**
     * Add users' comments to database.
     * On success, loads city_page with the saving comments
     */
	public function insertComment($placeID){
        //Set rules for the comment box
		$this->form_validation->set_rules('content', 'Content', 'required|min_length[1]|max_length[2000]');

        //Check if user insert comment to the comment box
		if ($this->form_validation->run() == FALSE)
		{
			echo "<script>alert('Please insert your comment.')</script>";
			echo "<script> window.history.back(); </script>";
		}
		else
		{
            //Get userID if the user login, otherwise load login_page to promote user login
            if (!isset($_SESSION['user']->userID))
            {
                echo "<script>alert('Please login first.')</script>";
                $this->load->view('login_page');
            }
            else
            {
                //Add userID, placeID and user comment to comment table
                $userID = $_SESSION['user']->userID;
                $com = new Comment();
                $com->content = $this->input->post('content');
                $com->placeID = $placeID;
                $com->userID = $userID;
                $com->time = date('Y-m-d H:i:s');
                $result = $this->comment_model->addComment($com, $placeID, $userID);
                if(!$result) {
                    echo "<script>alert('There was an error saving your comment.')</script>";
                }
                else {
                    echo "<script>alert('Your comment was successfully saved.')</script>";
                }
                echo "<script> window.history.back(); </script>";
            }
		}
	}

    public function find_similar_users() {
        $UID = $_SESSION['user']->userID;
        echo json_encode($this->user_model->find_similar_users($UID));
    }
}
?>
