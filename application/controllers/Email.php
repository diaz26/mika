<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_email');
    }

	
	public function index()
	{
        $result['campanas'] = $this->model_email->carga_campanas();
        $this->load->view('header_admin');
		$this->load->view('view_campanas_email',$result);
		$this->load->view('footer_admin');
		
    }
    
    public function edita_campana($id = NULL)
	{
        $result['campanas'] = $this->model_email->carga_campanas($id);
        $this->load->view('header_admin');
		$this->load->view('view_edita_campana',$result);
		$this->load->view('footer_admin');
		
    }

    public function config_correos($id = NULL)
	{
        $result['info_campanas'] = $this->model_email->carga_campanas($id);
        $result['info_correos'] = $this->model_email->carga_campanas_correos($id);
        $this->load->view('header_admin');
		$this->load->view('view_configura_correos',$result);
		$this->load->view('footer_admin');
		
	}
}
