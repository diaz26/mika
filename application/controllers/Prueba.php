<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
  public function __construct(){
		parent::__construct();

	}

	public function a()
	{
    $this->load->view('pricing-download');
	}

  public function b()
	{
    $this->load->view('events');
	}
}
