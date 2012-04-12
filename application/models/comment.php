<?php 
class Comment extends CI_Model {
	protected $table = 'comment';
	
	function create_comment($data)
	{
		$this->db->insert($this->table, $data); 

	}
	
	function list_comments($discussion_id)
	{
		$this->db->select('*')
				 ->where('discussion_id', $discussion_id)
        		 ->where('deleted', '0');
		return $this->db->get($this->table)->result();
		
	}
	
	function get_comment_by_id($comment_id)
	{
		$this->db->select('*')
				 ->where('deleted', '0')
				 ->where('id', $comment_id);
		return $this->db->get($this->table)->row();
	}
	
	function edit_comment($data, $comment_id)
	{
		$this->db->where('id', $comment_id)
				 ->update($this->table, $data); 
	}
	
	
	function delete_comment($comment_id)
	{
		return $this->db->set('deleted', '1')
                 ->where('id', $comment_id)
                 ->update($this->table);
	}
}?>