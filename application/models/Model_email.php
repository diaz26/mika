<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_email extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function carga_campanas()
    {
        $sql = "SELECT c.id,c.campana, (SELECT COUNT(d.correo) FROM campanas_detalle_correo d WHERE
    d.id_campana = c.id) AS cant_correo
FROM campanas_correos c;
";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
