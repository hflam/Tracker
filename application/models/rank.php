<?php 
class Rank extends CI_Model {
	protected $table = 'rank';
	
	function get_rank_name($rank_id)
	{
		$this->db->select('*')
        		 ->where('rank_id', $rank_id);
		$query = $this->db->get($this->table);
		return $query->row()->rank_name;
	}
	
}?>