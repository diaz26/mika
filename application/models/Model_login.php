<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {

  function __construct(){
    parent::__construct();
  }

  public function consultaUser($user,$contra){
    $sql="SELECT u.* FROM usuarios u WHERE (u.correo='$user' || u.USER='$user')
    AND u.contrasena='$contra'";
    $query=$this->db->query($sql);
    return $query->row();
  }

  public function num_pagos($id = NULL){
    if ($id == NULL){
        $id=$this->session->userdata('ID');
    }else {
      $id= $id;
    }

    $sql="SELECT count(*) as cantpagos FROM master_pagos WHERE id_usuario=$id";
    $query=$this->db->query($sql);
    return $query->row()->cantpagos;

  }

}

