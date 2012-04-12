<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout {

    private $CI;
    private $var = '';
    
    public function __construct() {

        $this->CI = get_instance();
        $this->CI->load->helper(array('url', 'html'));
        $this->var['output'] = '';

        // By default, the title of the page is set to
        // Function name - Controller name
        
        $this->var['css'] = array();
        $this->var['js'] = array();
        $this->var['menu'] = array();
        $this->var['active_menu'] = 'home';
        
    }
    
    /**
     * Output the added views to the screen
     */
    public function output_view() {
    	// get the list from database
    	$this->CI->load->model('source');
    	$sources = $this->CI->source->get_sources();
    	$this->var['sources'] = $sources;
        // Load view with data
        $this->CI->load->view('layout/default', $this->var);
    }

    
    /**
     * Add the view to the view stack
     */
    public function add_view($name, $data = array()) {
        // Get the content of the view without displaying it
        $this->var['output'] .= $this->CI->load->view($name, $data, true);
        return $this;
    }
    
    public function add_active_menu($id)
    {
    	$this->var['active_menu'] = $id;
    	return $this;
    }
    
    /**
     * Method to set the title of the page
     */
    public function set_title($title) {
        if (is_string($title) && !empty($title)) {
            $this->var['title'] = $title;
        }
        return $this;
    }
    
    /**
     * Method to add css files to the page rendered
     */
    public function add_css($file_name) {
        if (is_string($file_name) && !empty($file_name)
                && file_exists('./css/' . $file_name . '.css')) {
            $this->var['css'][] = base_url() . 'public/css/' . $file_name . '.css';
            return $this;
        }
        return false;
    }
    
    /**
     * Method to add javascript files to the page rendered
     */
    public function add_js($file_name, $external = false) {
        if (!$external) {
            if (is_string($file_name) && !empty($file_name)
                    && file_exists('./js/' . $file_name . '.js')) {
                $this->var['js'][] = base_url() . 'public/js/' . $file_name . '.js';
                return $this;
            }
        } else {
            if (is_string($file_name) && !empty($file_name)) {
                $this->var['js'][] = $file_name;
                return $this;
            }
            
        }
        return false;
    }
    


}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */
