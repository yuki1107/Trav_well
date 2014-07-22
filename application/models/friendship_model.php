<?php
class Friendship_model extends CI_Model {

     function __construct(){
       parent::__construct();
       $this->load->model('Friendship');
       $this->load->database();
     }

    function checkExists($friendship) {

      //check user has not already added this friend
      $query1 = $this->db->get_where('friendship', array('user1'=>$friendship->user1, 'user2'=>$friendship->user2));

      if ($query1->num_rows() > 0)
      {
        return 1;
      }

      //check if friend has added user already
      $query2 = $this->db->get_where('friendship', array('user1'=>$friendship->user2, 'user2'=>$friendship->user1));

      if ($query2->num_rows() > 0)
      {
        return 2;
      }

      //return 3 otherwise
      return 3;

    }

    function confirmFriend($friendship, $coFriendship) {

      $this->db->where(array('user1'=>$coFriendship->user1, 'user2'=>$coFriendship->user2));
      $query1 = $this->db->update('friendship', $coFriendship);

      if ($this->db->affected_rows() == 0)
      {
        return False;
      }

      $query2 = $this->db->insert('friendship', $friendship);

      if ($this->db->affected_rows() == 0)
      {
        return False;
      }

      return True;

    }

    function addFriend($friendship) {

      $query = $this->db->insert('friendship', $friendship);

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function removeFriend($userID, $friendID) {

      $query = $this->db->delete('friendship', (array('user1'=>$userID, 'user2'=>$friendID)));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    function getFriends($userID) {

      $this->db->join('user', 'user.userID = friendship.user2');
      $this->db->order_by('username');
      $query = $this->db->get_where('friendship', array('user1'=>$userID, 'confirmed'=>1));

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }

      return False;
    }

    function getRequests($userID) {

      $this->db->join('user', 'user.userID = friendship.user1');
      $this->db->order_by('username');
      $query = $this->db->get_where('friendship', array('user2'=>$userID, 'confirmed'=>0));

      if ($query->num_rows() > 0)
      {
        return $query->result();
      }

      return False;

    }

}
?>
