<?php 
class Users extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        if(($this->session->userdata('rank'))!='User')
        	redirect('accounts/login');
    }
    
    function index()
    {
    	$this->load->model('action');
    	$data = array(
    		'actions' => $this->action->list_action()
    	);
    	$this->layout->add_view('users/index', $data)
    				 ->add_active_menu('home')
					 ->set_title('User Page')
		             ->output_view();
    }
}?>