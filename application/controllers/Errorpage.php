<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class errorpage extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index($ban=null)
  {
    $this->load->view('error_page');
  }
  public function error($ban=null)
  {
    $this->load->view('view_error_loading');
    $this->load->view('footer_admin');
  }
}
