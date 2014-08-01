<?php
class Messages_model extends CI_Model {

     function __construct(){
       parent::__construct();
       $this->load->model('Messages');
       $this->load->database();
     }

    /**
     * Checks that a given username exists in the database.
     * @author Sean Gallagher
     * @param string $receiver, the username to be checked
     * @return True if the user exists, False otherwise
     */
    function checkReceiver($receiver) {

      $query = $this->db->get_where('user', array('username'=>$receiver));

      if ($query->num_rows() > 0)
      {
        return True;
      }

      return False; 

    }

    /**
     * Inserts a given message into the database.
     * @author Sean Gallagher
     * @param message $message, the message to be inserted
     * @return True if the operation was successful, False otherwise
     */
    function sendMessage($message) {

      //If a user has more than 100 messages, delete the oldest one before adding a new one
      $this->db->order_by('time');
      $num_msgs = $this->db->get_where('messages', array('receiver'=>$message->receiver));

      if ($num_msgs->num_rows() >= 3)
      {
        $oldest = $num_msgs->row();
        $this->db->delete('messages', array('messageID'=>$oldest->messageID));
      }

      //Insert message to database
      $query = $this->db->insert('messages', $message);

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    /**
     * Retrieves an array of messages for a given user.
     * @author Sean Gallagher
     * @param int $userID, the id of the user whose messages are to be retrieved
     * @return an array of messages, or False if there was nothing to retrieve
     */
    function getMessages($userID) {

      $this->db->join('user', 'user.userID = messages.sender');
      $this->db->order_by('time', 'desc');
      $query = $this->db->get_where('messages', array('receiver'=>$userID));

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }

      return False;
    }

    /**
     * Deletes a given message from the database.
     * @author Sean Gallagher
     * @param int $messageID, the id of the message to be deleted
     * @return True if the operation was successful, False otherwise
     */
    function deleteMessage($messageID) {

      $query = $this->db->delete('messages', (array('messageID'=>$messageID)));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

}
?>
