<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index($ban = null)
    {
        $this->load->view('view_login', $ban);
    }

    public function home_admin(){
		if($this->session->userdata('is_logged_in')){
			if ($this->session->userdata('ROL')=='admin') {
				//$result['newUsers']=$this->model_login->usersNew();
				//$this->ultima_actividad();
				$this->load->view('header_admin');
				$this->load->view('view_home_admin');
				$this->load->view('footer_admin');
			}else {
				
				redirect("".base_url()."index.php/errorpage/error");
			}
		}else {
			redirect("".base_url()."index.php/login/");
		}
	}

    public function validaAcceso()
    {

        $user = $this->input->post('user');
        //$pass = md5($this->input->post('pass'));
        $pass = $this->input->post('pass');
        $passno = $this->input->post('pass');

        $result = $this->model_login->consultaUser($user, $pass);

        if ($result) {
            $session = array(
                'ID' => $result->id,
                'USUARIO' => $result->correo,
                'NOMBRE' => $result->nombre,
                'USER' => $result->user,
                'CONTRASENA' => $result->contrasena,
                'ROL' => $result->tipo,
                'url_img' => $result->img_perfil,
                'is_logged_in' => true,
            );
            $this->session->set_userdata($session);

            if ($result->tipo == 'admin') {
                if ($this->session->userdata('is_logged_in')) {
                    
                    redirect("" . base_url() . "index.php/Login/home_admin");
                }
            }

        } else {
            //en caso contrario mostramos el error de usuario o contraseña invalido
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Usuario/Contraseña Invalido</div>');
            redirect("" . base_url() . "");

        }
    }

}
