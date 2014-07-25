<?php
class Comment_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('Comment');
		$this->load->model('Place');
		$this->load->model('User');
		$this->load->database();
		$this->load->model('user_model');
	}

	function addComment($comment, $placeID, $userID) {
		$qRating = $this->db->select('rating')->get_where('rating', array('placeID'=>$placeID, 'userID'=>$userID));
		if($qRating->num_rows()==0){
			$this->user_model->addRating($placeID, 0);
		}
		return $this->db->insert('comments',$comment);
	}
    
    function create_comment_from_data($comment)
	{
		$commentInfo = array(
					'commentID' => $comment->commentID,
					'placeID' => $comment->placeID,
					'userID' => $coment->userID,
					'content' => $comment->content,
                    'time' => $comment->time
				);
		return $commentInfo;
	}

	/**
	 * Creates an array of comment information from the database
	 * @return array containing comment information
	 */
	function create_comment_for_place_page($comment){
		$commentInfo = array(
					'commentID' => $comment->commentID,
					'placeID' => $comment->placeID,
					'userID' => $comment->userID,
					'content' => $comment->content,
                    'time' => $comment->time,
                    'username'=>$comment->username,
                    'picture_url'=>$comment->picture_url,
                    'rating'=>$comment->rating
				);
		return $commentInfo;
	}

	function place_name_id_convertion($placeName){
		$p = new Place();
		$p = $this->db->select('placeID')->get_where('place', array('name'=>$placeName))->row(0, 'Place');
		return $p->placeID;
	}

	/*
	get comment by place, and return a array include username, comment content
	*/
	function get_comments_by_place($placeName){
		$p = $this->place_name_id_convertion($placeName);
		$this->db->join('user', 'user.userID = comments.userID');
		$this->db->join('rating', 'user.userID = rating.userID AND comments.placeID = rating.placeID');
		$this->db->order_by('time', 'desc');
		$qComment = $this->db->get_where('comments', array('comments.placeID'=>$p));
		if ($qComment->num_rows() > 0){
			foreach($qComment->result() as $item){
				$comments[] = $this->create_comment_for_place_page($item);
			}
		}
		else{
			return false;
		}
		return $comments;
	}
}
?>