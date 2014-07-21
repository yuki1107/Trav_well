<?php
class Friendship_model extends CI_Model {

     function __construct(){
       parent::__construct();
       $this->load->model('Friendship');
       $this->load->database();
     }

    function addFriend($friendship) {

      $query = $this->db->insert('Friendship', $friendship);

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function removeFriend($friendship) {

      $query = $this->db->delete('Friendship', (array('user1'=>$friendship->$user1, 'user2'=>$friendship->$user2)));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function getFriends($userID) {

      $this->db->join('User', 'User.userID = Friendship.user2');
      $this->db->order_by('username');
      $query = $this->db->get_where('Friendship', array('user1'=>$userID));

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }

      return False;
    }

}
?>
