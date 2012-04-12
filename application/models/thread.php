<?php 
class Thread extends CI_Model {
	protected $table = 'threads';
	
	function create_thread($data)
	{
		$this->db->insert($this->table, $data); 

	}
	
	function list_source($source_id)
	{
		$this->db->select('*')
        		 ->where('source', $source_id)
        		 ->where('deleted', '0');
		return $this->db->get($this->table)->result();
		
	}
	
	function get_thread_by_id($thread_id)
	{
		$this->db->select('*')
				 ->where('deleted', '0')
				 ->where('thread_id', $thread_id);
		return $this->db->get($this->table)->row();
	}
	
	function edit_thread($data, $thread_id)
	{
		$this->db->where('thread_id', $thread_id)
				 ->update($this->table, $data); 
	}
	
	function get_quote($type, $thread_id)
	{
		$this->db->select($type)
				 ->where('deleted', '0')
				 ->where('thread_id', $thread_id);
		return "<pre>".$this->db->get($this->table)->row()->$type."</pre>";
	}
	
	function delete_thread($thread_id)
	{
		return $this->db->set('deleted', '1')
                 ->where('thread_id', $thread_id)
                 ->update($this->table);
	}
}?>