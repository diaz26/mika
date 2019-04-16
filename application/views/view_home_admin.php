<?php
if($this->session->userdata('is_logged_in')){
  ?>
  <head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/estilol.css">
  </head>
  <div class="content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-10 col-12 ">
      
      </div>
      <div class="col-md-4 col-sm-4 col-lg-2 col-12 ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12 col-12 ">
            <div class="card">
              <div class="card-body">
                <form class="form-horizontal">
                  <div class="row" style="align-items: center">
                    <div class="col-sm-12 col-lg-12">
                      <div class="form-check form-check-radio">
                        <label class="form-check-label">
                          CHAT CONTACTOS
                        </label>
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p>Activos</p>
                          </div>
                        </div>
                        <div class="row">
                          
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-12">
                            <p>Inactivos</p>
                          </div>
                        </div>
                        <div class="row">
                          
                        </div>



                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php
}else {
  redirect("".base_url()."index.php/login/");
}
?>
