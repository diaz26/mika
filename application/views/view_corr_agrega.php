<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
</head>
<?php
if ($this->session->userdata('is_logged_in')) {
    setlocale(LC_MONETARY, "en_US");
    ?>

  <div class="content">
    <div class="row">
      <div class="col-md-1">

      </div>
      <div class="col-md-10 ">
        <div class="row" style=" text-align: center">
          <div class="col-12">
              <?php echo $this->session->flashdata('msg'); ?>
          </div>
        </div>

        <div class="row" >
          <div class="col-md-12" >
            <div class="card card-stats">
              <div class="card-body">
              <div class="row">
                <div class="col-md-12 ">
                <h3 class="card-title"><?php echo $flag_opera;  ?> correos a campañas</h3>
             </div>

              </div>
                <div class="row">
                  <div class="col-md-4 col-4 ">
                   <font style="">  Campaña: </font>
                    <?php
                        if (!empty($info_campanas)) {
                              
                         $id_campana=$info_campanas->id;
                            echo $info_campanas->campana; 
                        }
                     ?>
                  </div>
                  <div class="col-md-4 col-4 ">
                     <?php
                        if (!empty($deta_correos)) {
                            foreach ($deta_correos as $row){
                                echo $row->nombre_correo.":   ".$row->dia."   |   ";
                            }
                        }
                     ?>
                  </div>
                  <div class="col-md-4 col-4 ">
                 
                  </div>

                </div>
              </div>

            </div>

            <form action="<?php echo base_url(); ?>index.php/email/guard_correos" method="post">

            <div class="row">
                <div class="col-md-12">
                
                </div>   
                       
            </div>

            <div class="card" style=" font-size: 13px">
              <div class="card-body">
              <div class="">
                <div class="">
                
                </div>
              </div>

              <br>
              <?php
              $id_correo="" ;
              $nombre_correo="" ;
              $asunto_correo="" ;
              $dia_correo="";
              $remitente_correo="";
              $mensaje_correo="";
                 if (!empty($deta_el_correos)) {
                  $id_correo= $deta_el_correos->id;
                  $nombre_correo= $deta_el_correos->nombre_correo;
                  $asunto_correo= $deta_el_correos->email_asunto;
                  $dia_correo= $deta_el_correos->dia;
                  $remitente_correo= $deta_el_correos->email_remitente;
                  $mensaje_correo= $deta_el_correos->email_mensaje;
                  
                }
              
              ?>
              <input type="hidden"  class="form-control" name="id_campana" 
                value="<?php echo $id_campana; ?>">
                <input type="hidden"  class="form-control" name="id_correo" 
                value="<?php echo $id_correo; ?>">

              <div class="row">
                <div class="col-md-4"  style="font-weight: bold ">
                    Escriba el nombre para identificar el correo<br>
                    <input type="text"  class="form-control" name="name_correo" id="" 
                    value="<?php echo $nombre_correo ?>">
                </div>                            
                <div class="col-md-8"  style="font-weight: bold ">
                    Escriba el asunto del correo<br>
                    <input type="text"  class="form-control" name="asunto_correo" id=""
                     value="<?php echo $asunto_correo; ?>">
                </div> 
      
               </div>

               <br><br>

               <div class="row">
                    <div class="col-md-4">
                    <font style="font-weight: bold "> Seleccione día de envío</font><br>
                    <input type="number" class="form-control" name="dia_correo" id=""
                    value="<?php echo $dia_correo ?>">
                    </div>                            
                    <div class="col-md-4"  style="font-weight: bold ">
                        Remitente<br>
                        <input type="text"  class="form-control" name="remitente_correo" id=""
                        value="<?php echo $remitente_correo ?>">
                    </div>                            
                    <div class="col-md-4"  style="font-weight: bold ">
                        LandingPage<br>
                        <input type="text"  class="form-control" name="landing_correo" id="">
                    </div>                            
                     
               </div>

                <br><br>

               <div class="row">
                    <div class="col-md-12">
                    <font style="font-weight: bold ">Escriba el mensaje del correo</font><br>
                    <div></div>
                   
                    <textarea class="form-control" name="mensaje_correo"  id="mensaje_correo" cols="30" rows="10">
                    <?php echo $mensaje_correo; ?>  
                  </textarea>
                    <script>
                        $('#mensaje_correo').summernote({
                            placeholder: 'ingrese el mensaje de su correo',
                            tabsize: 2,
                            height: 200
                        });
                    </script>    

                    
                    </div> 
                                         
               </div>

            <br><br><br>

               <div class="row">
                    <div class="col-md-12">
                    <a href="<?php echo base_url(); ?>index.php/email/config_correos/<?php echo $id_campana; ?>" class="btn btn-secondary animation-on-hover btn-sm" >Cancelar</a>
                    <button class="btn btn-success animation-on-hover btn-sm" type="submit">Guardar</button>
                      
                    </div>                            
               </div>

              </div>
            </div>
            
            </form>
            
          </div>


        </div>
      </div>
      <div class="col-md-1">

      </div>

    </div>
  </div>
  <div class="modal fade" id="renovar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true" style="top: -15%;">

    <form name="" action="<?php echo base_url(); ?>index.php/payments/pagoMembresia" method="post" onsubmit="return validationclassgo()">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Renovar Membresia</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
if (!empty($datos)) {
        ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-5 pr-md-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" disabled class="form-control" value="<?php echo $datos->nombre . " " . $datos->apellido1; ?>" >
                        <input type="hidden" name="id" value="<?php echo $datos->id; ?>">
                      </div>
                    </div>

                    <div class="col-md-3 pr-md-1">
                      <div class="form-group">
                        <label>Valor ($USD)</label>
                        <input disabled class="form-control" name="valor" value="<?php echo number_format($producto, 2); ?>">
                        <input type="hidden" name="saldo" value="<?php echo $saldototal; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Membresia(días)</label>
                        <input disabled class="form-control" name="dias" value="<?php echo intval($membDias); ?>">
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row" style=" text-align:center; font-size: 15px">
                    <div class="col-12">
                      <label>
                        <b>Selecciona tu Medio de pago</b>
                      </label>
                    </div>
                  </div>
                  <div class="row" style=" text-align:center; ">
                    <div class="col-6">
                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="member" id="exampleRadios1" value="paypal" >
                          <span class="form-check-sign"></span>
                          <img src="<?php echo base_url(); ?>images/PayPal.png" width="40%" alt="">
                        </label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="member" id="exampleRadios1" value="tiindo" >
                          <span class="form-check-sign"></span>
                          <p style="font-size:14px ;  "><b>Mi cuenta Tiindo</b></p><hr>
                          <?php
                            if ($saldototal >= $producto) {
                                        $color = 'green';
                                    } else {
                                        $color = 'red';
                                    }
                         ?>
                          <b>Saldo Disponible:</b> <br> <p style="color:<?php echo $color; ?>"> <?php echo money_format('%i', ($saldototal)); ?> </p>
                          <!--img src="<?php echo base_url(); ?>images/payu.png" width="40%" alt=""-->
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <?php
}
    ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-fill btn-primary">Renovar</button>
          </div>


        </div>
      </div>
    </form>
  </div>

  <?php
} else {
    redirect("" . base_url() . "index.php/login/");
}
?>
