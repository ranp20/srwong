<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>SrWong - Mi Cuenta</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
</head>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active">Mi Perfil </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- my account start -->
  <div class="myaccount-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto col-lg-9">
          <div class="checkout-wrapper">
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
                              <input type="text" placeholder="" required>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="profile-info">
                              <label>Apellidos</label>
                              <input type="text" placeholder="" required>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="profile-info">
                              <label>Correo Electrónico</label>
                              <input type="email" placeholder="" required>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="profile-info">
                              <label>Teléfono</label>
                              <input type="text" placeholder="" required>
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
                              <input type="text" placeholder="" required>
                            </div>
                          </div>
                        </div>
                        <div class="profile-back-btn">
                          <div class="profile-back">
                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
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
                          <a href="#"><i class="ion-arrow-up-c"></i> back</a>
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
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
	<!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/my-account.js"></script>
</body>
</html>
