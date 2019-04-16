<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_email extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function carga_campanas($id = null)
    {
        if ($id == null) {
            $sqlwhere = "";
        } else {
            $sqlwhere = " where c.id='$id' ";
        }

        $sql = "SELECT c.id,c.campana, (SELECT COUNT(d.email_mensaje) FROM campanas_detalle_correo d WHERE
                d.id_campana = c.id) AS cant_correo
                FROM campanas_correos c
                $sqlwhere
                ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function carga_campanas_correos($id = null)
    {
        $sql = "SELECT * FROM campanas_detalle_correo WHERE id_campana='$id';";
        $query = $this->db->query($sql);
        return $query->result();
    }


}
