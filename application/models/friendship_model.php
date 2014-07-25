<?php
class Friendship_model extends CI_Model {

     function __construct(){
       parent::__construct();
       $this->load->model('Friendship');
       $this->load->database();
     }

    /**
     * Checks whether or not a user is friends with another.
     * @author Sean Gallagher
     * @param friendship $friendship, an object that contains the user ID of the two users
     * @return 1 if user1 is friends with user2, 2 if user2 is friends with user1, 3 if neither user is friends with each other
     */
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

    /**
     * Confirms a user's friend request in the database.
     * @author Sean Gallagher
     * @param friendship $friendship, an object that contains the user ID of the two users
     * @param friendship $coFriendship, an object that contains the user ID of the two users (in reverse order)
     * @return True if the confirmation was successful, False otherwise
     */
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

    /**
     * Adds a friendship to the database.
     * @author Sean Gallagher
     * @param friendship $friendship, an object that contains the user ID of the two users
     * @return True if the addition was successful, False otherwise
     */
    function addFriend($friendship) {

      $query = $this->db->insert('friendship', $friendship);

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    /**
     * Removes a friendship from the database.
     * @author Sean Gallagher
     * @param int $userID the userID of the user who is removing a friend
     * @param int $friendID the userID of the friend they wish to remove
     * @return True if the request was successful, False otherwise
     */
    function removeFriend($userID, $friendID) {

      $query = $this->db->delete('friendship', (array('user1'=>$userID, 'user2'=>$friendID)));

      if ($this->db->affected_rows() > 0)
      {
        return True;
      }

      return False; 
    }

    /**
     * Creates an array of the friends a given user has.
     * @author Sean Gallagher
     * @param int $userID the userID of the user whose friends are being retrieved
     * @return an array of friends or False if no data was found
     */
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

    /**
     * Creates an array of the friend requests a given user has.
     * @author Sean Gallagher
     * @param int $userID the userID of the user whose friend requests are being retrieved
     * @return an array of friends requests or False if no data was found
     */
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
