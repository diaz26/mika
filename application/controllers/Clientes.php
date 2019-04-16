<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_clientes');
    }

	
	public function index()
	{
        $result['campanas'] = $this->model_email->carga_campanas();
        $this->load->view('header_admin');
		$this->load->view('view_campanas_email',$result);
		$this->load->view('footer_admin');
		
    }
    
   
}
