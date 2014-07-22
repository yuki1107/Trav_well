<?php
class Commet_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->model('Comment');
		$this->load->database();
	}

	function addComment($comment) {
		return $this->db->insert('comment',$comment);
	}
    
    function create_comment_from_data($comment)
	{
		$commentInfo = array(
					'commentID' => $comment->commentID,
					'placeID' => $comment->placeID,
					'userID' => $coment->userID,
					'content' => $comment->content,
                    'time' => $comment->time,
				);
		return $commentInfo;
	}
}
?>