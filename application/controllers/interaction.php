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
            $this->load->helper(array('form', 'url', 'date'));
            session_start();
    }

    public function sendMessage(){

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
            $this->db->where(array('username'=>$this->input->post('receiver')));
            $query = $this->db->get('User');
            $val = $query->result_array();

            //Put message in database
            $message = new Messages();
            $message->sender = $_SESSION['user']->userID;
            $message->receiver = $val[0]['userID'];
            $message->content = $this->input->post('content');
            $message->time = date('Y-m-d H:i:s');

            if(!$this->messages_model->sendMessage($message))
            {
                echo "<script>alert('An unknown error occurred. Please try again later.')</script>";
            }

            redirect( base_url() . 'interaction/getMessages/', 'refresh');

        }
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

        $this->load->view('friends_page', $data);

    }
}
?>