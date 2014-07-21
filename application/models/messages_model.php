<?php
class Messages_model extends CI_Model {

     function __construct(){
       parent::__construct();
       $this->load->model('Messages');
       $this->load->database();
     }

    function checkReceiver($receiver) {

      $query = $this->db->get_where('User', array('username'=>$receiver));

      if ($query->num_rows() > 0)
      {
        return True;
      }

      return False; 

    }

    function sendMessage($message) {

      $query = $this->db->insert('Messages', $message);

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function readMessage($message) {

      $query = $this->db->update('Messages', array('read'=>1), array('messageID'=>$message->$messageID));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function getMessages($userID) {

      $this->db->join('User', 'User.userID = Messages.sender');
      $this->db->order_by('time', 'desc');
      $query = $this->db->get_where('Messages', array('receiver'=>$userID));

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }

      return False;
    }

    function deleteMessage($messageID) {

      $query = $this->db->delete('Messages', (array('messageID'=>$messageID)));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

}
?>
