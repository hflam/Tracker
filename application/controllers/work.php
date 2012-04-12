<?php 
class Work extends CI_Controller
{
	function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('url');
    }
    
	function index()
	{
		$this->load->model('objective');
		$data = array();
		$data['current_jobs'] = $this->objective->list_current_objective();
		$data['finished_jobs'] = $this->objective->list_finished_objective();
		$this->load->view("work/index", $data);
	}
	
	function edit($id)
	{
		$this->load->model('objective');
		$data = $_POST;
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description')
		);

		$this->objective->edit_objective($data);
		echo "Edit Success!";
		
	}
	
	function create()
	{
		$this->load->model('objective');
		$data = $_POST;
		$data = array(
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'finish_by' => $this->input->post('finish_by').' 23:59:59'
		);
		$data['create_date'] = date("Y-m-d H:i:s");
		$data['finished'] = 0;
		$data['failed'] = 0;
		$this->objective->create_objective($data);
		$data['current_jobs'] = $this->objective->list_current_objective();
		$this->load->view("work/current", $data);
		
	}
	function log()
	{
		$this->load->model('objective');
		$data['finished_jobs'] = $this->objective->list_finished_objective();
		$this->load->view("work/log", $data);
	}
	function finish($id)
	{
		$this->load->model('objective');
		$this->objective->finish_objective($id);
		echo 'finish';
	}
	function detail($id)
	{
		$this->load->model('objective');
		$data['job'] = $this->objective->get_objective_by_id($id);
		$this->load->view('work/detail', $data);
	}

	function list_objectives()
	{
		$this->load->model('objective');
		$data = $this->objective->list_current_objective();
		$this->load->view('work/list');
	}
	
	function current()
	{
		$this->load->model('objective');
		$data['current_jobs'] = $this->objective->list_current_objective();
		$this->load->view("work/current", $data);
	}
}?>