<?php 
class Accounts extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url');
    }
    
    function login()
    {
    	if($_POST)
    	{
    		$this->load->model('account');
    		$this->load->library('encrypt');
    		if($this->account->validate_user($this->input->post('username', TRUE),$this->encrypt->sha1($this->input->post('password', TRUE))))
    		{
    			$this->load->model('rank');
    			$user_id = $this->account->get_user_id($this->input->post('username', TRUE));
    			$profile = $this->account->get_user_info($user_id);
    			$rank = $this->rank->get_rank_name($profile->rank_id);
    			//login success!
    			$userdata = array(
                   'username'  => $this->input->post("username", TRUE),
    			   'user_id'   => $user_id,
    			   'rank_id'   => $profile->rank_id,
    			   'rank'	   => $rank
               );
				
				$this->session->set_userdata($userdata);
				if($profile->rank_id ==1)
					redirect("admin/index");
				else
    				redirect("users/index");
    		}
    	}
    	$this->layout->add_view('accounts/login')
					 ->set_title('Login')
		             ->output_view();
    }
    
    function register()
    {
    	if($_POST)
    	{
    		$this->load->model('account');
		 	$this->load->library('encrypt');
    		//login success!
    		$userdata = array(
               'username'  => $this->input->post("username", TRUE),
    		   'nickname'  => $this->input->post("nickname", TRUE),
    		   'password'   =>  $this->encrypt->sha1($this->input->post('password', TRUE)),
    		   'rank_id'	=> 4
               );

			$this->account->add_user($userdata);

    		redirect("../");

    	}
    	$this->layout->add_view('accounts/register')
					 ->set_title('Register')
		             ->output_view();
    }
    
    function logout()
    {
    	$this->session->sess_destroy();
    	$this->layout->add_view('accounts/login')
					 ->set_title('Login')
		             ->output_view();
    }
}?>