<?php 
class Discussions extends CI_Controller
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
    
    
    function create($related_thread_id =null)
    {
    	if($_POST && $this->input->post('topic'))
    	{
    		$this->load->model('discussion');
    		$data = array(
    			'deleted'	 => 0,
    			'creator_id' => $this->session->userdata('user_id'),
    			'topic'	 => $this->input->post('topic'),
    			'content'	 => str_replace("\r",'<br>',$this->input->post('content')),
    			'create_date'=> date("Y-m-d H:i:s"),
    		);
    		if(!is_null($related_thread_id))
    			$data['related_thread'] = $related_thread_id;
    		$this->discussion->create_discussion($data);

    		redirect("discussions/index");
    	}
    	
    	if(is_null($related_thread_id))
    	{
	    	$this->layout->add_view('discussion/create')
						 ->set_title('Create Discussion')
			             ->output_view();
			return;
    	}
    	$this->load->model('thread');
    	$this->load->model('source');
    	$thread = $this->thread->get_thread_by_id($related_thread_id);
    	$source_name = $this->source->get_sources_by_id($thread->source)->name;
    	$data = array(
    		'thread'	=> $thread,
    		'source'	=> $source_name
    	);
    	$this->layout->add_view('discussion/create', $data)
					 ->set_title('Create Discussion')
		             ->output_view();

    }
    
    function index()
    {

    	$this->load->model('thread');
    	$this->load->model('source');
    	$this->load->model('account');
    	$this->load->model('discussion');
    	$list = $this->discussion->list_topic();
    	foreach($list as $topic)
    	{
    		$topic->creator = $this->account->get_nickname_by_id($topic->creator_id);
    	}
    	$data = array(
    		'topics'	=> $list
    	);
    	$this->layout->add_view('discussion/index',$data)
    	    		 ->add_active_menu('discussion')
					 ->set_title('Discussion')
		             ->output_view();
    }
    
    function edit($discussion_id)
    {
    	$this->load->model('discussion');
    	if($_POST && $this->input->post('topic'))
    	{
    		$data = array(
    			'topic'	 => $this->input->post('topic'),
    			'content'	 => str_replace("\r",'<br>',$this->input->post('content')),
    		);
    		$this->discussion->edit_discussion($data, $discussion_id);
			if($this->session->userdata('rank') =='Admin')
				redirect("admin/index");
			else
    			redirect("users/index");
    	}
    	
    	$topic = $this->discussion->get_discussion_by_id($discussion_id);
		$topic->content = str_replace('<br>',"", $topic->content);
    	$data = array(
    		'discussion'	=> $topic,
    	);
    	$this->layout->add_view('discussion/edit', $data)
    	    		 ->add_active_menu('discussion')
					 ->set_title('Edit Discussion')
		             ->output_view();
    }
    
    function delete($discussion_id)
    {
    	$this->load->model('discussion');
    	$this->discussion->delete_discussion($discussion_id);
		redirect("discussions/index");

    }
    
    function detail($discussion_id)
    {
    	$this->load->model('discussion');
    	$this->load->model('account');
    	$this->load->model('comment');
    	$discussion = $this->discussion->get_discussion_by_id($discussion_id);
    	$discussion->creator = $this->account->get_nickname_by_id($discussion->creator_id);
    	$comments = $this->comment->list_comments($discussion_id);
        foreach($comments as $comment)
    	{
    		$comment->creator = $this->account->get_nickname_by_id($comment->creator_id);
    	}
    	$data = array(
    		'discussion'	=> $discussion,
    		'comments'		=> $comments
    	);
    	$this->layout->add_view('discussion/detail', $data)
    	    		 ->add_active_menu('discussion')
					 ->set_title($discussion->topic)
		             ->output_view();
    }
    

}?>