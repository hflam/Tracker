<?php 
class Threads extends CI_Controller
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
    	if($_POST && $this->input->post('source'))
    	{
    		$this->load->model('thread');
    		$content = $this->input->post('content');
    		$cnv = $this->input->post('cnv');
    		$cuv = $this->input->post('cuv');
    		$rcuv = $this->input->post('rcuv');
    		$data = array(
    			'deleted'	 => 0,
    			'creator_id' => $this->session->userdata('user_id'),
    			'source'	 => $this->input->post('source'),
    			'CNV'	 => $cnv,
    			'CUV'	 => $cuv,
    			'RCUV'	 => $rcuv,
    			'chapter'	 => $this->input->post('chapter'),
    			'content'	 => $content,
    			'created_date'=> date("Y-m-d H:i:s"),
    		);
    		$this->thread->create_thread($data);
    		redirect("threads/list_threads/".$this->input->post('source'));
    	}
    	
    	$this->load->model('source');
    	$list = $this->source->get_sources();

    	foreach($list as $value)
    	{
    		$source_list[$value->id] = $value->name;
    	}
    	$data = array(
    		'source' => $source_list
    	
    	);
    	$this->layout->add_view('threads/create', $data)
    	    		 ->add_active_menu('create_entry')
					 ->set_title('Create Entry')
		             ->output_view();
    }
    
    function list_threads($source_id)
    {
    	$this->load->model('thread');
    	$this->load->model('source');
    	$this->load->model('account');
    	$list = $this->thread->list_source($source_id);
    	foreach($list as $source)
    	{
    		$source->source = $this->source->get_sources_by_id($source->source)->name;
    		$source->creator = $this->account->get_nickname_by_id($source->creator_id);
    	}
    	$data = array(
    		'sources'	=> $list
    	);
    	$this->layout->add_view('threads/list_source', $data)
    	    		 ->add_active_menu('list_entry_'.$source_id)
					 ->set_title('List')
		             ->output_view();
    }
    
    function edit($thread_id)
    {
    	$this->load->model('thread');
    	$this->load->model('source');
    	if($_POST && $this->input->post('source'))
    	{
    		$content = $this->input->post('content');
    		$cnv = $this->input->post('cnv');
    		$cuv = $this->input->post('cuv');
    		$rcuv = $this->input->post('rcuv');
    		$data = array(
    			'deleted'	 => 0,
    			'source'	 => $this->input->post('source'),
    			'CNV'	 => $cnv,
    			'CUV'	 => $cuv,
    			'RCUV'	 => $rcuv,
    			'chapter'	 	 => $this->input->post('chapter'),
    			'content'	 => $content,
    			'created_date'=> date("Y-m-d H:i:s"),
    		);
    		$this->thread->edit_thread($data, $thread_id);
    		redirect("threads/detail/".$thread_id);
    	}
    	
    	$list = $this->source->get_sources();
		//TODO need to set the original source name for dropmenu
    	foreach($list as $value)
    	{
    		$source_list[$value->id] = $value->name;
    	}

    	$threads = $this->thread->get_thread_by_id($thread_id);
    	
    	$source_name = $this->source->get_sources_by_id($threads->source)->name;
    	$data = array(
    		'threads'	=> $threads,
    		'source'	=> $source_name,
    		'source_list' => $source_list,
    		'thread_id' => $thread_id
    	);
    	$this->layout->add_view('threads/edit', $data)
					 ->set_title('Edit Entry')
		             ->output_view();
    }
    
    function delete($thread_id)
    {
    	$this->load->model('thread');
    	$thread = $this->thread->get_thread_by_id($thread_id);
    	$this->thread->delete_thread($thread_id);
    	redirect("threads/list_threads/".$thread->source);
    }
    
    function detail($thread_id)
    {
    	$this->load->model('thread');
    	$this->load->model('source');
    	$this->load->model('discussion');
    	$thread = $this->thread->get_thread_by_id($thread_id);
    	$source_name = $this->source->get_sources_by_id($thread->source)->name;
    	$related_discussions = $this->discussion->get_related_thread_discussion($thread_id);
    	$thread->content = "<pre>".$thread->content."</pre>";
    	$thread->CUV = "<pre>".$thread->CUV."</pre>";
    	$thread->CNV = "<pre>".$thread->CNV."</pre>";
    	$thread->RCUV = "<pre>".$thread->RCUV."</pre>";
    	$data = array(
    		'thread'	=> $thread,
    		'source'	=> $source_name,
    		'related_discussions' => $related_discussions
    	);
    	$this->layout->add_view('threads/detail', $data)
					 ->set_title('Entry Detail')
		             ->output_view();
    }
    
    function show_quote($type, $thread_id)
    {
    	$this->load->model('thread');
    	$thread = $this->thread->get_quote($type, $thread_id);

    	$data = array(
    		'quote' => $thread
    	);
    	$this->load->view("threads/quote", $data);
    	
    }
}?>