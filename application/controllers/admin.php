<?php 
class Admin extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        if(($this->session->userdata('rank'))!='Admin')
        	redirect('accounts/login');
    }
    
    function index()
    {
    	$this->load->model('action');
    	$data = array(
    		'actions' => $this->action->list_action()
    	);
    	$this->layout->add_view('admin/index', $data)
    				 ->add_active_menu('home')
					 ->set_title('Admin Main Page')
		             ->output_view();
    }
    
    function tools()
    {
    	$this->load->model('account');
    	$this->load->model('rank');
    	$this->load->model('source');
    	$sources = $this->source->get_sources();
    	$users = $this->account->get_user_list();
    	foreach($users as $user)
    	{
    		$user->rank = $this->rank->get_rank_name($user->rank_id);
    	}
    	$data = array(
    		'users'		=> $users,
    		'sources'	=> $sources
    	);
    	$this->layout->add_view('admin/tools', $data)
    				 ->add_active_menu('admin_tools')
					 ->set_title('Admin Tools')
		             ->output_view();
    }
    
    function create_source()
    {
    	$this->load->model('source');
    	$data = array(
    		'name' => $this->input->post('name'),
    		'eng_name' => $this->input->post('eng_name')
    	);
    	$this->source->add_source($data);
    	redirect('admin/tools');
    }
}?>