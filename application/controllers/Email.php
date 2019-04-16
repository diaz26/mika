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
		$this->load->view('view_corr_configura',$result);
		$this->load->view('footer_admin');
		
    }

    public function agrega_correos($id = NULL)
	{
        $result['info_campanas'] = $this->model_email->carga_campanas($id);
        $result['info_correos'] = $this->model_email->carga_campanas_correos($id);
        $this->load->view('header_admin');
		$this->load->view('view_corr_agrega',$result);
		$this->load->view('footer_admin');
		
    }
    
    public function guard_correos($id = NULL){
        $id_campana =$this->input->post('id_campana');
        $name_correo =$this->input->post('name_correo');
        $asunto_correo =$this->input->post('asunto_correo');
        $dia_correo =$this->input->post('dia_correo');
        $remitente_correo =$this->input->post('remitente_correo');
        $landing_correo =$this->input->post('landing_correo');
        $mensaje_correo =$this->input->post('mensaje_correo');

        if(!empty($name_correo) and 
           !empty($asunto_correo) and 
           !empty($dia_correo) and 
           !empty($remitente_correo) and 
           !empty($landing_correo) and 
           !empty($mensaje_correo)
           ){
           $data= array (
               "id_campana"=>$id_campana,
                "nombre_correo"=>$name_correo,
                "dia"=>$dia_correo,
                "email_mensaje"=>$mensaje_correo,
                "email_asunto"=>$asunto_correo,
                "email_remitente"=>$remitente_correo,
                "date_create"=>date("Y-m-d H:i:s"),
                "date_update"=>date("Y-m-d H:i:s"),

           );
         $result= $this->model_email->guarda_correo($data);
         redirect('/email/config_correos/'.$id_campana, 'refresh');


        }








    }
}
