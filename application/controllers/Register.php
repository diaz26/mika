<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
    }

    public function index($ban = null)
    {
      //if ((isset($_POST['name'])) AND (isset($_POST['email']))) {
        $this->load->view('view_completed_register', $ban);
      /*}else {
        redirect("Errorpage");
      }*/

    }





}
