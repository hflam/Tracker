<?php 
class Discussion extends CI_Model {
	protected $table = 'discussion';
	protected $td_table = 'thread_discussion';
	
	function create_discussion($data)
	{
		$this->db->insert($this->table, $data); 

	}
	
	function create_thread_discussion($data)
	{
		$this->db->insert($this->td_table, $data); 
	}
	
	function list_topic()
	{
		$this->db->select('*')
        		 ->where('deleted', '0');
		return $this->db->get($this->table)->result();
		
	}
	
	function get_related_thread_discussion($related_thread_id)
	{
		$this->db->select('*')
        		 ->where('deleted', '0')
        		 ->where('related_thread', $related_thread_id);
		return $this->db->get($this->table)->result();
	}
	
	function get_discussion_by_id($discussion_id)
	{
		$this->db->select('*')
				 ->where('deleted', '0')
				 ->where('id', $discussion_id);
		return $this->db->get($this->table)->row();
	}
	
	function edit_discussion($data, $discussion_id)
	{
		$this->db->where('id', $discussion_id)
				 ->update($this->table, $data); 
	}
	
	
	function delete_discussion($discussion_id)
	{
		return $this->db->set('deleted', '1')
                 ->where('id', $discussion_id)
                 ->update($this->table);
	}
}?>