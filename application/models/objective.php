<?php 
class Objective extends CI_Model {
	protected $table = 'objective';
	
	function create_objective($data)
	{
		$this->db->insert($this->table, $data); 

	}
	
	function list_current_objective()
	{
		$this->db->select('*')
        		 ->where('finished', 0);
		return $this->db->get($this->table)->result();
		
	}
	
	function list_finished_objective()
	{
		$this->db->select('*')
        		 ->where('finished', 1);
		return $this->db->get($this->table)->result();
		
	}
	
	function get_objective_by_id($objective_id)
	{
		$this->db->select('*')
				 ->where('id', $objective_id);
		return $this->db->get($this->table)->row();
	}
	
	function edit_objective($data, $objective_id)
	{
		$this->db->where('id', $objective_id)
				 ->update($this->table, $data); 
	}
	
	function finish_objective($id)
	{
		$data = array(
			'finished' => 1
		);
		$this->db->where('id', $id)
				 ->update($this->table, $data);
	}
	
	function delete_thread($thread_id)
	{
		return $this->db->set('deleted', '1')
                 ->where('thread_id', $thread_id)
                 ->update($this->table);
	}
}?>