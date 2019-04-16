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

    public function validaAcceso()
    {

        $user = $this->input->post('user');
        $pass = md5($this->input->post('pass'));
        $passno = $this->input->post('pass');

        $result = $this->model_login->consultaUser($user, $pass);

        if (count($result) == 1) {
            $cantpagos = $this->model_login->num_pagos($result->id);
            $session = array(
                'ID' => $result->id,
                'USUARIO' => $result->correo,
                'NOMBRE' => $result->nombre,
                'USER' => $result->user,
                'CONTRASENA' => $result->contrasena,
                'ROL' => $result->tipo,
                'SECURITY' => $result->security,
                'cantpagos' => $cantpagos,
                'url_img' => $result->img_perfil,
                'is_logged_in' => true,
            );
            $this->session->set_userdata($session);

            if ($result->tipo == 'Teletrabajo') {
                if ($this->session->userdata('is_logged_in')) {
                    redirect("" . base_url() . "index.php/Login/home_admin");
                }
            }
            if ($result->tipo == 'Administrador') {
                if ($this->session->userdata('is_logged_in')) {
                    redirect("" . base_url() . "index.php/Admin");
                }
            }
            if ($result->tipo == 'Ultra') {
                if ($this->session->userdata('is_logged_in')) {
                    redirect("" . base_url() . "index.php/Ultra");
                }
            }
            if ($result->tipo == 'Socio') {
                if ($this->session->userdata('is_logged_in')) {
                    redirect("" . base_url() . "index.php/Socios");
                }
            }
        } else {
            //en caso contrario mostramos el error de usuario o contraseña invalido
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Usuario/Contraseña Invalido</div>');
            redirect("" . base_url() . "");

        }
    }

}
