<?php 
class Comments extends CI_Controller
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
    
    
    function create($discussion_id)
    {
    	if($_POST && $this->input->post('content'))
    	{
    		$this->load->model('comment');
    		$data = array(
    			'deleted'	 => 0,
    			'creator_id' => $this->session->userdata('user_id'),
    			'discussion_id' => $discussion_id,
    			'content'	 => str_replace("\r",'<br>',$this->input->post('content')),
    			'create_date'=> date("Y-m-d H:i:s"),
    		);
    		
    		$this->comment->create_comment($data);
			redirect("discussions/detail/".$discussion_id);

    	}
    	$this->layout->add_view('comment/create')
					 ->set_title('Create Comment')
		             ->output_view();
    }
    

    
    function edit($comment_id)
    {
    	$this->load->model('comment');
    	if($_POST && $this->input->post('topic'))
    	{
    		$data = array(
    			'content'	 => str_replace("\r",'<br>',$this->input->post('content')),
    		);
    		$this->comment->edit_comment($data, $comment_id);
			if($this->session->userdata('rank') =='Admin')
				redirect("admin/index");
			else
    			redirect("users/index");
    	}
    	
    	$comment = $this->comment->get_comment_by_id($comment_id);
		$comment->content = str_replace('<br>',"", $topic->content);
    	$data = array(
    		'comment'	=> $comment,
    	);
    	$this->layout->add_view('comment/edit', $data)
					 ->set_title('Edit Comment')
		             ->output_view();
    }
    
    function delete($comment_id)
    {
    	$this->load->model('comment');
    	$this->comment->delete_comment($comment_id);
			if($this->session->userdata('rank') =='Admin')
				redirect("admin/index");
			else
    			redirect("users/index");

    }
    
    function detail($comment_id)
    {
    	$this->load->model('comment');
    	$this->load->model('source');
    	$comment = $this->comment->get_comment_by_id($comment_id);
    	
    	$data = array(
    		'comment'	=> $comment,
    	);
    	$this->layout->add_view('comment/detail', $data)
					 ->set_title('Comment')
		             ->output_view();
    }
    

}?>