<?php 
class Source extends CI_Model {
	protected $table = 'source';
	
	function get_sources()
	{
		$this->db->select('*');
		return $this->db->get($this->table)->result();
	}
	
	function add_source($data)
	{
		$this->db->insert($this->table, $data); 
	}
	
	function get_sources_by_id($source_id)
	{
		$this->db->select('name')
				 ->where('id', $source_id);
		return $this->db->get($this->table)->row();
	}
}?>