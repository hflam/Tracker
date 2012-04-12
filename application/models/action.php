<?php 
class Action extends CI_Model {
	protected $table = 'action';
	
	function create_action($data)
	{
		$this->db->insert($this->table, $data); 

	}
	
	function list_action()
	{
		$this->db->select('*');
		return $this->db->get($this->table)->result();
		
	}
	
	function get_action_by_id($action_id)
	{
		$this->db->select('*')
				 ->where('id', $action_id);
		return $this->db->get($this->table)->row();
	}
	
	function edit_action($data, $action_id)
	{
		$this->db->where('id', $action_id)
				 ->update($this->table, $data); 
	}
	

}?>