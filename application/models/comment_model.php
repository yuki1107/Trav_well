<?php
class Comment_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('Comment');
		$this->load->model('Place');
		$this->load->model('User');
		$this->load->database();
	}

	function addComment($comment) {
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

	function create_comment_for_place_page($comment){
		$commentInfo = array(
					'commentID' => $comment->commentID,
					'placeID' => $comment->placeID,
					'userID' => $comment->userID,
					'content' => $comment->content,
                    'time' => $comment->time,
                    'username'=>$comment->username,
                    'picture_url'=>$comment->picture_url
				);
		return $commentInfo;
	}
	/*
	get comment by place, and return a array include username, comment content
	*/
	function get_comments_by_place($placeName){
		$p = new Place();
		$p = $this->db->select('placeID')->get_where('place', array('name'=>$placeName))->row(0,'Place');
		$this->db->join('user', 'user.userID = comments.userID');
		$this->db->order_by('time', 'desc');
		var_dump($p);
		$qComment = $this->db->get_where('comments', array('placeID'=>$p->placeID));
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