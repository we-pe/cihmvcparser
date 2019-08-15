<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	protected $data = array();
	
	function __construct(){
		parent::__construct();
		$this->load->library('parser');
	}
	
	protected function load_page($content=null, $layout=true){
		if ($layout==true){
			
			$this->data['header'] = $this->parser->parse('partials/header', $this->data, TRUE);
			$this->data['content'] = (is_null($content)) ? '' : $this->parser->parse($content, $this->data, TRUE);
			
			$this->parser->parse('index', $this->data);
		}
		else {
			$this->parser->parse($content, $this->data);
		}
	}

}