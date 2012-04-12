<?php 
class Account extends CI_Model {
	protected $table = 'users';
	
	function validate_user($username, $password)
	{
		$this->db->select('*')
        		 ->where('username', $username)
        		 ->where('password', $password);
		$query = $this->db->get($this->table);

        return $query->num_rows() == 1;
	}
	
	function get_user_id($username)
	{
		$this->db->select('user_id')
        		 ->where('username', $username);
		$query = $this->db->get($this->table);
		return $query->row()->user_id;
	}
	
	function get_user_list()
	{
		$this->db->select('*')
        		 ->where('rank_id', '4');
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	function get_nickname_by_id($user_id)
	{
		$this->db->select('nickname')
        		 ->where('user_id', $user_id);
		$query = $this->db->get($this->table);
		return $query->row()->nickname;
	}
	
	function get_user_info($user_id)
	{
		$this->db->select('*')
				 ->where('user_id', $user_id);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	function add_user($data)
	{
		$this->db->insert($this->table, $data); 
	}
}?>