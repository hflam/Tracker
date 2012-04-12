<?php 
class Actions extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->helper('array');
        if(!($this->session->userdata('rank')))
        	redirect('accounts/login');
    }
    
    
    function create()
    {
    	if($_POST && $this->input->post('message'))
    	{
    		$this->load->model('action');
    		$data = array(
    			'message'	=>	$this->input->post('message'),
    			'create_date'=> date("Y-m-d H:i:s"),
    		);
    		$this->action->create_action($data);
			redirect("admin/index");
    	}
    	
		redirect("");

    }
    
 
    

}?>