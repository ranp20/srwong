<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
require_once '../model/categories.php';
require_once '../model/business-settings.php';
$categories = new Categories();
$min_order_val = (isset($dmlBusinessSettings->getValueByNameReg("minimum_order_value")[0]['value']) && $dmlBusinessSettings->getValueByNameReg("minimum_order_value")[0]['value'] != "" && $dmlBusinessSettings->getValueByNameReg("minimum_order_value")[0]['value'] != 0) ? $dmlBusinessSettings->getValueByNameReg("minimum_order_value")[0]['value'] : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Señor Wong - Carrito de compras</title>
  <?php require_once 'includes/inc_header_links.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>
  <!-- INCLUIR SWEET ALERT 2 -->
  <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script type="text/javascript" src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <input tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" name="cx1chk_crt-ord-min-sess" id="cx1chk_crt-ord-min-sess" value="<?= $min_order_val;?>" readonly="readonly">
</head>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active">Carrito </li>
        </ul>
      </div>
    </div>
  </div>
   <!-- shopping-cart-area start -->
  <div class="cart-main-area pt-95 pb-100">
    <div class="container">
      <h3 class="page-title">Tu lista de compras</h3>
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
          <form action="#" autocomplete="off">
            <div class="table-content table-responsive">
              <table>
                <thead>
                  <tr>
                    <th colspan="2" class="talign-l">Producto</th>
                    <th class="talign-l">Cantidad</th>
                    <th class="talign-l">Subtotal</th>
                    <th class="talign-l">Acción</th>
                  </tr>
                </thead>
                <tbody id="c-xtbl_cartcli">
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
            <div class="row">
              <div class="col-lg-12">
                  <!--
                <div class="cart-shiping-update-wrapper">
                  <div class="cart-clear">
                    <a href="javascript:void(0);" id="cart-clear" title="Borrar listado de compras">Borrar listado</a>
                  </div>
                </div>
                  -->
                
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="grand-totall">
            <!--
            <div class="title-wrap">
              <h4 class="cart-bottom-title section-bg-gary-cart">Total</h4>
            </div>
            -->
            <div class="cl-wrap_total" id="c-xtt_tochck"></div>
            <div class="cart-shiping-update" style="border: 1px solid #e3e3e3;margin-top: 10px;margin-bottom: 10px;">
                    <a href="./" title="Seguir comprando" style=" padding: 19px 36px;margin: 0px;width: 100%;text-align: center;">Seguir comprando</a>
                    
                    
              
                    
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
  <!-- all js here -->
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/cart-page.js"></script>
</body>
</html>
