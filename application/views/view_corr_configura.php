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
                <h3 class="card-title">Configuración de correos</h3>
             </div>

              </div>
                <div class="row">
                  <div class="col-md-12 col-12 ">
                   <font style="">  Campaña: </font>
                   <?php
                        if (!empty($info_campanas)) {
                              
                         $id_campana=$info_campanas->id;
                            echo $info_campanas->campana; 
                                       
                        }
                            

                     ?>

                  </div>

                </div>
            <div class="row">
                <div class="col-md-12 ">
                <a href="<?php echo base_url(); ?>index.php/email/agrega_correos/<?php echo $id_campana; ?>">
                    <img width="6%"  src="<?php echo base_url(); ?>images/agrega_correo.png" alt="editar">
                    Agregar Correo
                 </a>
             </div>

              </div>

            </div>
            <div class="card" style=" font-size: 13px">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" border="0">
                    <tbody>
                      <tr>
                        <th class="text-center">Día</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Asunto</th>
                        <th class="text-center">Remitente</th>
                        <th class="text-center">Mensaje</th>
                        <th class="text-center"></th>
                      </tr>

                      <?php
                            if(!empty($info_correos)){
                                foreach ($info_correos as $corr){
                        ?>
                        <tr>
                         <td class="text-center"><?php echo ($corr->dia); ?></td>
                         <td class="text-center"><?php echo ($corr->nombre_correo); ?></td>
                         <td class="text-center"><?php echo ($corr->email_asunto); ?></td>
                         <td class="text-center"><?php echo ($corr->email_remitente); ?></td>
                         <td class="text-center"><?php echo ($corr->email_mensaje); ?></td>
                         <td class="text-center" WIDTH="300">

                         <a href="">
                            <img width="20%"  src="<?php echo base_url(); ?>images/estadisticas.jpg" alt="editar">  
                         </a>   
                          <a href="">
                            <img width="20%"  src="<?php echo base_url(); ?>images/editar.png" alt="editar">  
                          </a> 
                           <a href="">
                              <img width="20%" src="<?php echo base_url(); ?>images/eliminar.png" alt="eliminar">
                           </a> 
                         </td>

                        </tr>

                        <?php
                            }
                        }
                        ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
