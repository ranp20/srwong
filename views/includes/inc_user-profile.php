<?php 
  $uprof_username = $listprof[0]['username'];
  $uprof_name = ($listprof[0]['f_name'] != "" || $listprof[0]['f_name'] != null) ? $listprof[0]['f_name'] : "";
  $uprof_lastname = ($listprof[0]['l_name'] != "" || $listprof[0]['l_name'] != null) ? $listprof[0]['l_name'] : "";
  $uprof_email = $listprof[0]['email'];
  $uprof_phone = ($listprof[0]['phone'] != "" || $listprof[0]['phone'] != null) ? $listprof[0]['phone'] : "";
?>
<div class="ml-auto mr-auto col-lg-9">
  <div class="profile-wrapper">
    <div id="faq" class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edite la información de su cuenta </a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse show">
          <div class="panel-body">
            <form action="" method="POST" id="clx-frm_usval-info">                              
              <div class="profile-information-wrapper">
                <div class="account-info-wrapper">
                  <h4><strong>DATOS PERSONALES</strong></h4>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Nombres</label>
                      <input type="text" placeholder="" value="<?= $uprof_name;?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Apellidos</label>
                      <input type="text" placeholder="" value="<?= $uprof_lastname;?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Correo Electrónico</label>
                      <input type="email" placeholder="" value="<?= $uprof_email;?>" required disabled="disabled" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Teléfono</label>
                      <input type="text" placeholder="" value="<?= $uprof_phone;?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Tipo de Documento</label>
                      <select class="form-control one-hidden" aria-required="true" name="prof_usval-location" id="prof_usval-location" required>
                        <option value="">Seleccione una opción</option>
                        <option value="1" required>DNI</option>
                        <option value="2" required>Carnet de extranjería</option>
                        <option value="3" required>Pasaporte</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>N° de Documento</label>
                      <input type="text" placeholder="" value="" required>
                    </div>
                  </div>
                </div>
                <div class="profile-back-btn">
                  <div class="profile-back">
                    <a href="#"><i class="ion-arrow-up-c"></i> VOLVER</a>
                  </div>
                  <div class="profile-btn">
                    <button type="submit">Guardar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Mis Pedidos </a></h5>
        </div>
        <div id="my-account-2" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="profile-information-wrapper">
              <div class="account-info-wrapper">
                <h4><strong>Cambiar contraseña</strong></h4>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="profile-info">
                    <label>Contraseña</label>
                    <input type="password">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="profile-info">
                    <label>Confirmar contraseña</label>
                    <input type="password">
                  </div>
                </div>
              </div>
              <div class="profile-back-btn">
                <div class="profile-back">
                  <a href="#"><i class="ion-arrow-up-c"></i> VOLVER</a>
                </div>
                <div class="profile-btn">
                  <button type="submit">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>