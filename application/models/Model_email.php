<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_email extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    var $config = array(
			'protocol' 				=> 'smtp',
			'smtp_host' 			=> 'mail.tiindo.com',
			'smtp_port' 			=> '25',
			'smtp_user' 			=> 'no-responder@tiindo.com',
			'smtp_pass' 			=>  "",
			'mailtype' 				=> 'html',
			'charset'   			=> 'iso-8859-1',
			'email_cambio_clave' 	=> 'support@tiindo.com',
			'registro_usuario' 		=> 'support@tiindo.com',
			'contacto' 				=> 'support@tiindo.com'
			);

    

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

     if ($id == null) {
          $responce= $query->result();
      } else {
        $responce= $query->row();
      }

      return $responce;
    }

    public function carga_campanas_correos($id = null)
    {
        $sql = "SELECT * FROM campanas_detalle_correo WHERE id_campana='$id';";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function cargar_correos_detalle($id = null){
      $sql="SELECT * FROM campanas_detalle_correo 
            WHERE id_campana='$id';";
      $query = $this->db->query($sql);
      return $query->result();
    }


    //correos
    public function plantilla_correo($correo_destinatario,$asunto_mensaje){
      $data_email= array();
      $dara_email['email_remitente']= $this->config["smtp_user"];
      $dara_email['email_destinatario']= $correo_destinatario;
      $dara_email['email_asunto']=$asunto_mensaje;

      $message="

      <!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <title>Document</title>
      </head>
      <body>
          
          
      </body>
      </html>
      ";

      $data_email['email_mensaje']= $message;
      $data_email['preparado']=1;
      $responce=$this->db->insert("dg_envio_email",$data_email);
      return $responce;


    }

    public function envio_correos_pendientes_bd(){
      $this->load->database();
      $this->load->library('email');
      $this->load->helper('email');
      #Creo la variable de control para el envio de email
      $flag_valida_usuario_en_lista = true;
      $config = array('protocol' => 'smtp',
                  'smtp_host' => $this->config["smtp_host"],
                  'smtp_port' => '25',
                  'smtp_user' => $this->config["smtp_user"],
                  'smtp_pass' => $this->config["smtp_pass"],
                  'validate' => false,
                  'wordwrap' => true,
                  'mailtype'  => 'html',
                  'charset'   => 'utf-8',
                  'newline' => '\r\n',
                  'crlf' => '\r\n'
                  );
      #Cargo la tabla de los correos pendientes
      $query_email_pendiente = $this->db->query("SELECT * FROM dge_envio_email WHERE preparado = 1");
      foreach($query_email_pendiente->result() as $email){
        $this->email->clear(TRUE);
        $this->email->initialize($config);
        $this->email->from($email->email_remitente);
        $this->email->to($email->email_destinatario);
        $this->email->subject($email->email_asunto);
        //$flag_valida_usuario_en_lista = true;

        #insertar datos en la tabla que cuenta los envíos de correos
        $cod_usuario_correo = 0;
        $query_usuario = $this->db->get_where("clientes", array("correo" => $email->email_destinatario) );
        if($query_usuario->num_rows() != 0){
          $cod_usuario_correo = $query_usuario->row()->id;
        }/*if*/
        //guarda para estadísticas
        $responce=$this->db->insert("campanas_piv_clientes_correos",array("id_clientes"=>1,"id_camp_correos"=>1));

        $this->email->message("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html><body>".$email->email_mensaje."<br>
        </body></html>");
        #################################
        #################################
        if($this->email->send()){}else{}/*if*/
        #Eliminamos el registro del envio
        $this->db->where(array("int" => $email->int) )->delete("dge_envio_email");
      }/*foreach*/
    }/*function envio_correos_pendientes_bd*/

    public function guarda_correo($data){

     $rta= $this->db->insert("campanas_detalle_correo",$data);
      return $rta;

    }



}
