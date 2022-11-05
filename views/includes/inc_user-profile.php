<?php 
  $uprof_username = $listprof[0]['username'];
  $uprof_name = ($listprof[0]['f_name'] != "" || $listprof[0]['f_name'] != null) ? $listprof[0]['f_name'] : "";
  $uprof_lastname = ($listprof[0]['l_name'] != "" || $listprof[0]['l_name'] != null) ? $listprof[0]['l_name'] : "";
  $uprof_email = $listprof[0]['email'];
  $uprof_phone = ($listprof[0]['phone'] != "" || $listprof[0]['phone'] != null) ? $listprof[0]['phone'] : "";
  $uprof_id_t_doc = ($listprof[0]['id_t_doc'] != "" || $listprof[0]['id_t_doc'] != null) ? $listprof[0]['id_t_doc'] : 0;
  $uprof_n_doc = ($listprof[0]['n_doc'] != "" || $listprof[0]['n_doc'] != null) ? $listprof[0]['n_doc'] : "";
?>
<div class="ml-auto mr-auto col-lg-9">
  <div class="profile-wrapper">
    <div id="faq" class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1" class="cprf-link_collapse">Mi cuenta </a></h5>
        </div>
        <div id="my-account-1" class="panel-collapse collapse show">
          <div class="panel-body">
            <form action="" method="POST" class="profile-cont__prfusval--frm" id="clx-frm_usval-info">
              <div class="profile-information-wrapper">
                <div class="account-info-wrapper">
                  <h4><strong>DATOS PERSONALES</strong></h4>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Nombres</label>
                      <input type="text" name="prf_usval-f-name" id="prf_usval-f-name" placeholder="" value="<?= $uprof_name;?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Apellidos</label>
                      <input type="text" name="prf_usval-l-name" id="prf_usval-l-name" placeholder="" value="<?= $uprof_lastname;?>" required>
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
                      <input type="text" name="prf_usval-telf" id="prf_usval-telf" placeholder="" value="<?= $uprof_phone;?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>Tipo de Documento</label>
                      <?php 
                        echo $dmlUsers->get_typeDocumentsByIdDoc($uprof_id_t_doc);
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="profile-info">
                      <label>N° de Documento</label>
                      <input type="text" name="prf_usval-ndoc-name" id="prf_usval-ndoc" placeholder="" value="<?= $uprof_n_doc;?>" required>
                    </div>
                  </div>
                </div>
                <div class="profile-back-btn">
                  <div class="profile-back">
                    <a href="#"><i class="ion-arrow-up-c"></i> VOLVER</a>
                  </div>
                  <div class="profile-btn">
                    <button type="submit" name="prf-profile_dataperinfo">Guardar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2" class="cprf-link_collapse">Mis Direcciones </a></h5>
        </div>
        <div id="my-account-2" class="panel-collapse collapse">
          <div class="panel-body">
            <form action="" method="POST" class="profile-cont__prfusval--frm" id="clx-frm_usval-info">
              <div class="profile-information-wrapper">
                <div class="account-info-wrapper">
                  <h4><strong>LISTA DE DIRECCIONES</strong></h4>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="profile-info">
                      <label>Dirección 1</label>
                      <input type="text" name="prf_usval-addresss-1" id="prf_usval-addresss-1" placeholder="Ingresa tu dirección n°1" value="<?= $uprof_name;?>" required>
                    </div>
                  </div>
                </div>
                <div class="profile-back-btn">
                  <div class="profile-back">
                    <a href="#"><i class="ion-arrow-up-c"></i> VOLVER</a>
                  </div>
                  <div class="profile-btn">
                    <button type="submit" name="prf-profile_dataperinfo">Guardar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3" class="cprf-link_collapse">Mis Pedidos </a></h5>
        </div>
        <div id="my-account-3" class="panel-collapse collapse">
          <div class="panel-body">
            <form action="" method="POST" class="profile-cont__prfusval--frm">
              <div class="profile-information-wrapper">
                <div class="account-info-wrapper">
                  <h4><strong>LISTA DE TUS PEDIDOS </strong></h4>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="profile-main-area">                    
                      <div class="table-content table-responsive tbl-responsiv__theme br_bottom">
                        <table>
                          <thead>
                            <tr>
                              <th colspan="2" class="talign-l">Producto</th>
                              <th class="talign-l">Cantidad</th>
                              <th class="talign-l">Subtotal</th>
                              <th class="talign-l">Estado</th>
                            </tr>
                          </thead>
                          <tbody id="c-xtbl_tmplistreguser">
                            <?php 
                              if(!isset($_SESSION['usr-logg_srwong'])){
                                echo "
                                  <tr>
                                    <td colspan='6'>
                                      <div class='l_anyitms'>
                                        <div class='l_anyitms__cImg'>
                                          <svg xmlns='http://www.w3.org/2000/svg' width='80px' height='80px' version='1.1' viewBox='0 0 700 700'><g><path d='m350 56c-51.898-0.058594-102.21 17.887-142.36 50.773-40.148 32.883-67.652 78.676-77.82 129.57-10.164 50.895-2.3672 103.74 22.066 149.52 24.434 45.789 63.988 81.688 111.93 101.57 47.938 19.887 101.29 22.531 150.96 7.4883 49.672-15.047 92.586-46.852 121.43-89.996 28.848-43.145 41.836-94.957 36.754-146.61-5.0781-51.648-27.914-99.938-64.613-136.64-41.996-42-98.945-65.625-158.34-65.688m0-28c66.836 0 130.93 26.551 178.19 73.809 47.258 47.258 73.809 111.36 73.809 178.19s-26.551 130.93-73.809 178.19c-47.258 47.258-111.36 73.809-178.19 73.809s-130.93-26.551-178.19-73.809c-47.258-47.258-73.809-111.36-73.809-178.19 0.074219-66.812 26.648-130.87 73.891-178.11s111.3-73.816 178.11-73.891z'/><path d='m294 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28'/><path d='m462 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28'/><path d='m478.7 375.3c5.4648 5.4688 5.4648 14.332 0 19.801-5.4688 5.4688-14.332 5.4688-19.801 0-28.902-28.84-68.066-45.035-108.89-45.035s-79.992 16.195-108.89 45.035c-5.4688 5.4688-14.332 5.4688-19.801 0-5.4648-5.4688-5.4648-14.332 0-19.801 34.16-34.082 80.441-53.223 128.7-53.223s94.535 19.141 128.7 53.223z'/></g></svg>
                                        </div>
                                        <div class='l_anyitms__cTxt'>
                                          <p>No hay información en el carrito.</p>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                ";
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="profile-back-btn">
                  <div class="profile-back">
                    <a href="#"><i class="ion-arrow-up-c"></i> VOLVER</a>
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