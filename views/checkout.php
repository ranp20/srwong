<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>    
  <?php require_once 'includes/inc-header_links.php';?>
  <title>SrWong - Detalle del pedido</title>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
</head>
<body>
  <?php require_once 'includes/inc-header_top.php';?>
  <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Checkout </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- checkout-area start -->
  <div class="checkout-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto col-lg-8">
          <div class="checkout-wrapper">
            <div class="chcksel-frm-cont">
              <div class="chcksel-reg-tab-list nav">
                <a class="tablink--fill active" data-toggle="tab" href="#chck1">
                  <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70px" height="70px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m557 520.8c-35.746 0-64.797-29.07-64.797-64.812 0-35.738 29.055-64.805 64.797-64.805 35.75 0 64.82 29.062 64.82 64.805 0 35.742-29.07 64.812-64.82 64.812zm0-103.26c-21.191 0-38.438 17.246-38.438 38.445 0 21.203 17.246 38.449 38.438 38.449 21.207 0 38.449-17.246 38.449-38.449 0-21.199-17.242-38.445-38.449-38.445z"/><path d="m471.08 467.29c-6.2383 0-11.312-5.0625-11.312-11.316 0-53.609 43.617-97.215 97.223-97.215 25.977 0 50.395 10.113 68.758 28.469 4.4141 4.4297 4.4141 11.57 0 15.988-4.4141 4.4141-11.582 4.4141-15.98 0-14.094-14.102-32.832-21.852-52.773-21.852-41.156 0-74.613 33.477-74.613 74.609 0.011719 6.2539-5.0586 11.316-11.301 11.316z"/><path d="m289.65 120.93c-1.8555-3.9258-3.0469-8.3008-3.5938-13.094-1.6016-14.004 2.0664-26.641 10.992-37.871 8.9258-11.234 20.402-17.652 34.43-19.258 11.957-1.3711 22.887 1.0938 32.789 7.4102 9.9023 6.3281 17.012 14.773 21.359 25.352l-13.332 1.5234c0.44922 0.98438 1.082 5.0742 1.9023 12.254 1.0547 9.2188-1.3398 17.629-7.2305 25.238-5.8867 7.6055-13.629 11.945-23.184 13.031-11.621 1.332-21.605-2.543-29.914-11.625-1.6523-2.2383-2.8906-4-3.7188-5.2969z"/><path d="m505.21 206.61c-20.301 0.93359-36.395 14.117-36.395 30.285 0 16.18 16.094 29.355 36.395 30.297z"/><path d="m500.75 328.38c-2.0234-6.7578-29.238-65.191-37.527-82.938-1.8477-3.9805-5.8398-6.5312-10.238-6.5312l-19.828 0.003906c4.0039-2.8711 6.6484-7.543 6.6484-12.852-0.011719-8.7422-7.0938-15.82-15.82-15.82h-0.015625l-56.352 0.027343-19.48-53.641c-0.45312-1.2422-1.0742-2.3516-1.7695-3.4062-1.7344-3.5156-4.2617-6.5352-7.9141-8.5234-8.293-4.5312-20.688-5.8594-28.645-3.5859-7.9141 2.2578-18.375 6.7812-22.898 21.766l-24.836 105.33c-0.95312 4.4141-0.52734 11.121 1.3594 16.301 3.0234 8.293 12.434 18.844 23.773 20.355l67.262 6.0156c-2.5312-0.035156-5.9023-0.042968-10.129 0.023438h-97.48v-131.55h-176.86v132.24h96.801c-5.3203 1.7461-9.2773 6.8047-9.1016 12.32 0.18359 5.8242 7.8555 17.812 13.668 26.074-41.984 24.395-76.391 92.434-76.391 92.434s-0.91797 2.0898-0.84375 4.5195c0.19141 6.2422 5.0586 11.316 11.301 11.316h22.832c1.1953 34.672 29.715 62.543 64.695 62.543 34.977 0 63.5-27.871 64.703-62.551l148.22-0.003906c1.0234 0 25.301-0.26953 40.918-23.672 3.707-5.0273 50.941-69.496 54.086-82.117 2.75-10.957 2.7188-14.555-0.13672-24.078zm-409.32-127.59h133.99v15.695l-133.99 0.003907zm0 37.133h58.207v19.93h18.426v-19.93h57.359v52.238h-133.99zm101.52 256.51c-20.434 0-37.152-16.039-38.332-36.188h76.664c-1.1836 20.152-17.898 36.188-38.332 36.188zm85.117-67.754c-1.0117 2.7344-3.6016 4.4297-6.3633 4.4297-0.78516 0-1.5859-0.13281-2.3633-0.41406-3.5039-1.3047-5.2969-5.2188-3.9922-8.7305 0.085937-0.24219 9.4883-26.75-5.2539-48.047-9.2305-13.332-36.637-13.324-46.406-12.203-3.7188 0.42578-7.0898-2.2227-7.5156-5.9531-0.42969-3.7227 2.2344-7.0898 5.957-7.5156 1.7656-0.20703 43.41-4.7383 59.113 17.949 18.844 27.199 7.3281 59.137 6.8242 60.484zm200.99-80.102c-2.832 7.7227-34.938 53.484-50.637 74.828-0.11719 0.14453-0.21875 0.3125-0.33203 0.46484-8.7461 13.242-21.824 13.754-22.227 13.77h-53.777c-16.312-11.855-34.355-31.566-31.02-59.543 3.7695-31.664 41.746-49.219 43.727-58.043 0.89453-4.082-1.1797-5.7734-2.9961-6.5117l36.812 3.293-30.055 89.156c-3.0195 12.039 6.4102 21.844 12.051 23.727 10.086 3.3672 26.383 1.8867 32.406-23.727 1.2891-5.4492 32.039-99.5 32.039-99.5 4.5312-14.695-7.9062-31.281-24.84-33.719l-87.207-14.359 2.1602-10.121c-0.24219-0.32031-24.703-49.59-24.703-49.59-1.6562-3.3594-0.28125-7.4297 3.0781-9.0898 3.3555-1.668 7.4258-0.28516 9.082 3.0703l22.824 46.082c1.8359 3.5352 7.0547 5.168 11.047 5.168l54.945-0.027344c-2.2617 2.0664-3.6953 5.0117-3.6953 8.3164 0 6.2383 5.0625 11.312 11.305 11.312h26.719c15.598 33.48 31.852 68.98 33.297 73.344 1.5859 5.2422 1.5859 5.2422-0.003907 11.699z"/></g></svg>
                  </span>
                  <span>DELIVERY</span>
                </a>
                <a class="tablink--fill" data-toggle="tab" href="#chck2">
                  <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70px" height="70px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m161.7 50.402-4.8984 7.5234-72.801 112-2.8008 4.1992v33.074c0 26.961 16.125 50.398 39.199 61.074v224.53c0.003906 4.457 1.7734 8.7305 4.9219 11.879 3.1523 3.1523 7.4258 4.9219 11.879 4.9219h425.6c4.4531 0 8.7266-1.7695 11.879-4.9219 3.1484-3.1484 4.918-7.4219 4.9219-11.879v-224.52c23.074-10.676 39.199-34.113 39.199-61.074v-33.074l-2.8008-4.1992-72.801-112-4.8984-7.5234h-376.6zm18.023 33.602h340.55l64.926 99.922v23.273c0 18.906-14.695 33.602-33.602 33.602s-33.602-14.695-33.602-33.602h-33.602c0 18.906-14.695 33.602-33.602 33.602s-33.602-14.695-33.602-33.602h-33.602c0 18.906-14.695 33.602-33.602 33.602s-33.602-14.695-33.602-33.602h-33.602c0 18.906-14.695 33.602-33.602 33.602s-33.602-14.695-33.602-33.602h-33.602c0 18.906-14.695 33.602-33.602 33.602s-33.602-14.695-33.602-33.602v-23.273l64.926-99.926zm19.078 166.25c12.355 14.441 30.039 24.148 50.398 24.148s38.047-9.7109 50.398-24.148c12.355 14.441 30.039 24.148 50.398 24.148s38.047-9.7109 50.398-24.148c12.355 14.441 30.039 24.148 50.398 24.148s38.047-9.7109 50.398-24.148c11.207 13.098 26.805 22.375 44.801 23.977v201.77h-212.8v-162.4h0.007813c0-4.457-1.7695-8.7305-4.9219-11.879-3.1484-3.1523-7.4219-4.9219-11.879-4.9219h-112c-4.4531 0-8.7266 1.7695-11.879 4.9219-3.1484 3.1484-4.918 7.4219-4.918 11.879v162.4h-33.602v-201.77c17.996-1.5977 33.594-10.879 44.801-23.977zm173.6 46.551h-0.003906c-4.4531 0-8.7266 1.7695-11.879 4.9219-3.1484 3.1484-4.918 7.4219-4.918 11.879v78.398c0 4.457 1.7695 8.7266 4.918 11.879 3.1523 3.1523 7.4258 4.9219 11.879 4.9219h123.2c4.4531 0 8.7266-1.7695 11.879-4.9219 3.1484-3.1523 4.918-7.4219 4.918-11.879v-78.398c0-4.457-1.7695-8.7305-4.918-11.879-3.1523-3.1523-7.4258-4.9219-11.879-4.9219zm-151.2 33.602h78.398v145.6h-78.398zm168 0h89.602v44.801h-89.602z"/></g></svg>
                  </span>
                  <span>RECOJO EN TIENDA</span>
                </a>
              </div>
              <div class="tab-content">
                <div id="chck1" class="tab-pane active">
                  <div class="chcksel-register-form">
                    <form action="./payment" method="POST" id="frm_1-Log">
                      <input type="text" name="chck-payment" id="chck-payment" value="150">
                      <div class="mb-2">
                        <label for="chck-telephone" class="form-label">Teléfono/Celular</label>
                        <input type="text" class="form-control" name="chck-telephone" id="chck-telephone" placeholder="">
                      </div>
                      <div class="mb-2">
                        <label for="chck-address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="chck-address" id="chck-address" placeholder="">
                      </div>
                      <div class="mb-2">
                        <div class="form-group">
                          <label for="chck-location">Ubicación</label>
                          <select class="form-control" name="chck-location" id="chck-location">
                            <option value="1">San Juan de Lurigancho 1</option>
                            <option value="2">San Juan de Lurigancho 2</option>
                          </select>
                        </div>
                      </div>
                      <div class="mb-2">
                        <label for="chck-reference" class="form-label">Referencia</label>
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="" name="chck-reference" id="chck-reference" style="height: 100px"></textarea>
                        </div>
                      </div>
                      <div class="button-box">
                        <button type="submit"><span>PAYMENT</span></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div id="chck2" class="tab-pane">
                  <div class="chcksel-register-form">
                    <div class="mb-4">
                      <form action="" method="POST" id="frm_2-Reg">
                        <div class="mb-3">
                          <div class="control-pls-search">
                            <span class="la-icon-ref">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m530.32 125.44c-34.719-68.879-104.16-111.44-181.44-111.44-31.922 0-62.16 7.2812-90.719 21.84-48.16 24.078-83.441 66.078-100.8 118.16-16.801 51.52-12.879 107.52 10.641 154 26.32 52.078 146.16 196.56 159.6 212.8l21.281 25.199 20.719-25.762c5.6016-6.7188 131.04-159.6 159.6-211.68 31.355-56 31.355-122.64 1.1172-183.12zm-24.641 170.24c-27.441 50.398-156.8 207.76-156.8 207.76s-130.48-156.8-156.24-207.76c-42.559-82.879-8.9609-192.08 77.84-235.2 25.199-12.879 52.078-18.48 78.398-18.48 64.398 0 126 35.281 156.8 96.32 25.762 50.961 26.879 108.08 0 157.36z"/><path d="m349.44 125.44c-50.398 0-91.281 40.879-91.281 91.281 0 50.398 40.879 91.281 91.281 91.281 50.398 0 91.281-40.879 91.281-91.281-0.003906-50.402-40.883-91.281-91.281-91.281zm0 155.12c-35.281 0-63.84-28.559-63.84-63.84s28.559-63.84 63.84-63.84 63.84 28.559 63.84 63.84-28.562 63.84-63.84 63.84z"/></g></svg>
                            </span>
                            <input type="text" placeholder="Ingrese una dirección" id="chck-searchlocation">
                            <span class="fk-icon-sub">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m145.6 75.602c-54.879 54.879-54.879 144.48 0 199.36 3.3594 3.3594 6.7188 6.7188 10.641 9.5195 1.1211 1.1211 2.2383 1.6797 3.9219 2.8008 2.2383 1.6797 5.0391 3.9219 7.2812 5.6016 1.6797 1.1211 3.3594 1.6797 5.0391 2.8008 2.2383 1.1211 4.4805 2.8008 6.7188 3.9219 1.6797 1.1211 3.3594 1.6797 5.6016 2.8008 2.2383 1.1211 4.4805 2.2383 6.7188 3.3594 1.6797 0.55859 3.9219 1.6797 5.6016 2.2383 2.2383 0.55859 4.4805 1.6797 6.7188 2.2383 2.2383 0.55859 3.9219 1.1211 6.1602 1.6797 2.2383 0.55859 4.4805 1.1211 6.7188 1.6797 2.2383 0.55859 4.4805 0.55859 6.7188 1.1211 2.2383 0.55859 4.4805 0.55859 6.1602 1.1211 2.2383 0 4.4805 0.55859 6.7188 0.55859 2.2383 0 3.9219 0 6.1602 0.55859h7.2812 5.6016c2.2383 0 5.0391-0.55859 7.2812-0.55859 1.6797 0 3.9219-0.55859 5.6016-0.55859 2.8008-0.55859 5.0391-1.1211 7.8398-1.1211 1.6797-0.55859 3.3594-0.55859 5.0391-1.1211 2.8008-0.55859 5.0391-1.1211 7.8398-2.2383 1.6797-0.55859 3.3594-1.1211 4.4805-1.6797 2.8008-1.1211 5.0391-1.6797 7.8398-2.8008 1.1211-0.55859 2.8008-1.1211 3.9219-1.6797 2.8008-1.1211 5.6016-2.2383 7.8398-3.9219 1.1211-0.55859 2.2383-1.1211 3.3594-2.2383 2.8008-1.6797 5.6016-3.3594 8.3984-5.0391 0.55859-0.55859 1.6797-1.1211 2.2383-1.6797 2.8008-2.2383 5.6016-3.9219 8.3984-6.7188l24.641 24.641 3.9219 10.078 205.52 205.52s6.1602 6.1602 18.48-6.1602c12.32-12.32 6.1602-18.48 6.1602-18.48l-205.52-207.76-10.078-3.9219-24.641-24.641c2.2383-2.8008 4.4805-5.6016 6.7188-8.3984 0.55859-0.55859 1.1211-1.6797 1.6797-2.2383 1.6797-2.8008 3.3594-5.6016 5.0391-8.3984 0.55859-1.1211 1.1211-2.2383 2.2383-3.3594 1.6797-2.8008 2.8008-5.0391 3.9219-7.8398 0.55859-1.1211 1.1211-2.8008 1.6797-3.9219 1.1211-2.8008 2.2383-5.0391 2.8008-7.8398 0.55859-1.6797 1.1211-3.3594 1.6797-4.4805 0.55859-2.8008 1.6797-5.0391 2.2383-7.8398 0.55859-1.6797 1.1211-3.3594 1.1211-5.0391 0.55859-2.2383 1.1211-5.0391 1.1211-7.8398 0.55859-1.6797 0.55859-3.9219 0.55859-5.6016 0.55859-2.2383 0.55859-5.0391 0.55859-7.2812v-5.6016-7.2812c0-2.2383 0-3.9219-0.55859-6.1602 0-2.2383-0.55859-4.4805-0.55859-6.7188 0-2.2383-0.55859-4.4805-1.1211-6.1602-0.55859-2.2383-0.55859-4.4805-1.1211-6.7188-0.55859-2.2383-1.1211-4.4805-1.6797-6.7188-0.55859-2.2383-1.1211-3.9219-1.6797-6.1602s-1.6797-4.4805-2.2383-6.7188c-0.55859-1.6797-1.1211-3.9219-2.2383-5.6016-1.1211-2.2383-2.2383-4.4805-3.3594-6.7188-1.1211-1.6797-1.6797-3.3594-2.8008-5.6016-1.1211-2.2383-2.8008-4.4805-3.9219-6.7188-1.1211-1.6797-1.6797-3.3594-2.8008-5.0391-1.6797-2.2383-3.3594-5.0391-5.6016-7.2812-1.1211-1.1211-1.6797-2.8008-2.8008-3.9219-2.8008-3.3594-6.1602-7.2812-9.5195-10.641-53.199-54.879-142.8-54.879-197.68 0.5625zm187.04 187.04c-48.16 48.16-126.56 48.16-174.72 0s-48.16-126.56 0-174.72 126.56-48.16 174.72 0c48.16 48.156 48.16 126.56 0 174.72z"/></g></svg>
                            </span>
                          </div>
                        </div>
                        <div class="button-box">
                          <button type="submit"><span>PAYMENT</span></button>
                        </div>
                      </form>
                    </div>
                    <div class="chcksel-list-result">
                      <div class="l-menu">
                        <div class="l-item">
                          <div class="l-item-title">
                            <h4>Jesús María</h4>
                          </div>
                          <div class="l-item-address">
                            <h6>Av. Giuseppe Garibaldi Nro 393</h6>
                          </div>
                          <div class="l-item-distance">
                            <p>0.89 km de distancia</p>
                          </div>
                          <div class="l-item-telephone">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m524.37 97.562h-227.11v-0.035156c0-13.398-10.898-24.297-24.297-24.297h-64.883c-13.398 0-24.297 10.898-24.297 24.297v0.027344h-8.1406c-17.867 0-32.402 14.543-32.402 32.41v291.96c0 17.867 14.543 32.41 32.402 32.41h8.1406v24.363c0 4.4609 3.6172 8.082 8.082 8.082h48.66c4.4609 0 8.0742-3.6172 8.0742-8.082v-24.363h275.77c17.867 0 32.402-14.543 32.402-32.41v-291.96c0-17.871-14.543-32.402-32.402-32.402zm-324.44-0.035156c0-4.4883 3.6523-8.1406 8.1406-8.1406h64.883c4.4883 0 8.1406 3.6523 8.1406 8.1406v291.96c0 4.4883-3.6523 8.1406-8.1406 8.1406h-64.883c-4.4961 0-8.1406-3.6523-8.1406-8.1406zm-40.547 324.39v-291.96c0-8.9609 7.2891-16.258 16.25-16.258h8.1406v275.77c0 13.398 10.898 24.297 24.297 24.297h24.363v24.398h-56.801c-8.9609 0.007813-16.25-7.2812-16.25-16.25zm73.059 48.695h-32.504v-16.281h32.504zm308.18-48.695c0 8.9688-7.2891 16.258-16.25 16.258h-275.78v-24.398h24.363c13.398 0 24.297-10.906 24.297-24.297l-0.003906-275.77h227.11c8.9609 0 16.25 7.2969 16.25 16.258v291.95z"/><path d="m508.14 138.11h-178.43c-4.4609 0-8.082 3.6172-8.082 8.082v40.543c0 4.4609 3.6172 8.082 8.082 8.082h178.41c4.4609 0 8.082-3.6172 8.082-8.082v-40.543c0-4.4727-3.6094-8.082-8.0703-8.082zm-8.082 40.543h-162.26v-24.391h162.26z"/><path d="m362.16 219.21h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4648-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 292.2h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4727-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 365.19h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c0-4.4609-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.293h16.293z"/><path d="m435.16 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011719-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/><path d="m508.14 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011718-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/></g></svg>
                            </span>
                            <span>Telf: 990 235 125</span>
                          </div>
                          <div class="l-item-schedule">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g><path d="m621.52 73.309c0-22.656-18.414-41.152-41.152-41.152h-60.75v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305s-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-60.75c-22.656 0-41.152 18.5-41.152 41.152l0.085937 437.05c0 22.656 18.496 41.152 41.152 41.152h460.73c22.656 0 41.152-18.496 41.152-41.152zm-41.152 461.75h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-19.77c6.8711 5.2617 15.359 8.3984 24.691 8.3984h460.73c9.332 0 17.816-3.2227 24.691-8.3984v19.77c0 13.66-11.117 24.691-24.691 24.691zm0-52.438h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-287.21h510.02v287.21c0.085938 13.578-11.031 24.691-24.605 24.691zm-485.42-409.31c0-13.574 11.031-24.691 24.691-24.691h60.75v23.418c-2.7148 0.76172-5.3438 1.8672-7.8047 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0078-2.5469-7.7227-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.3438 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.2617 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.594 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.5273-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h60.75c13.574 0 24.691 11.031 24.691 24.691v80.945h-510.02zm93.672 36.316c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4141 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003907 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003906 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.453c3.6484 2.6289 5.9375 6.8711 5.9375 11.371 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4141 2.2891-8.6562 5.8555-11.285v11.371c0.085938 4.5781 3.8203 8.2266 8.3164 8.2266z"/><path d="m235.11 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m235.11 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/></g></svg>
                            </span>
                            <span>Horario: Web y Call 11:00am-11:00pm</span>
                          </div>
                          <a class="l-item-link" href="javascript:void(0);">
                            <span>RECOGER AQUÍ</span>
                          </a>
                        </div>
                        <div class="l-item">
                          <div class="l-item-title">
                            <h4>Magdalena</h4>
                          </div>
                          <div class="l-item-address">
                            <h6>Av. Giuseppe Garibaldi Nro 393</h6>
                          </div>
                          <div class="l-item-distance">
                            <p>0.89 km de distancia</p>
                          </div>
                          <div class="l-item-telephone">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m524.37 97.562h-227.11v-0.035156c0-13.398-10.898-24.297-24.297-24.297h-64.883c-13.398 0-24.297 10.898-24.297 24.297v0.027344h-8.1406c-17.867 0-32.402 14.543-32.402 32.41v291.96c0 17.867 14.543 32.41 32.402 32.41h8.1406v24.363c0 4.4609 3.6172 8.082 8.082 8.082h48.66c4.4609 0 8.0742-3.6172 8.0742-8.082v-24.363h275.77c17.867 0 32.402-14.543 32.402-32.41v-291.96c0-17.871-14.543-32.402-32.402-32.402zm-324.44-0.035156c0-4.4883 3.6523-8.1406 8.1406-8.1406h64.883c4.4883 0 8.1406 3.6523 8.1406 8.1406v291.96c0 4.4883-3.6523 8.1406-8.1406 8.1406h-64.883c-4.4961 0-8.1406-3.6523-8.1406-8.1406zm-40.547 324.39v-291.96c0-8.9609 7.2891-16.258 16.25-16.258h8.1406v275.77c0 13.398 10.898 24.297 24.297 24.297h24.363v24.398h-56.801c-8.9609 0.007813-16.25-7.2812-16.25-16.25zm73.059 48.695h-32.504v-16.281h32.504zm308.18-48.695c0 8.9688-7.2891 16.258-16.25 16.258h-275.78v-24.398h24.363c13.398 0 24.297-10.906 24.297-24.297l-0.003906-275.77h227.11c8.9609 0 16.25 7.2969 16.25 16.258v291.95z"/><path d="m508.14 138.11h-178.43c-4.4609 0-8.082 3.6172-8.082 8.082v40.543c0 4.4609 3.6172 8.082 8.082 8.082h178.41c4.4609 0 8.082-3.6172 8.082-8.082v-40.543c0-4.4727-3.6094-8.082-8.0703-8.082zm-8.082 40.543h-162.26v-24.391h162.26z"/><path d="m362.16 219.21h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4648-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 292.2h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4727-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 365.19h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c0-4.4609-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.293h16.293z"/><path d="m435.16 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011719-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/><path d="m508.14 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011718-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/></g></svg>
                            </span>
                            <span>Telf: 990 235 125</span>
                          </div>
                          <div class="l-item-schedule">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g><path d="m621.52 73.309c0-22.656-18.414-41.152-41.152-41.152h-60.75v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305s-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-60.75c-22.656 0-41.152 18.5-41.152 41.152l0.085937 437.05c0 22.656 18.496 41.152 41.152 41.152h460.73c22.656 0 41.152-18.496 41.152-41.152zm-41.152 461.75h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-19.77c6.8711 5.2617 15.359 8.3984 24.691 8.3984h460.73c9.332 0 17.816-3.2227 24.691-8.3984v19.77c0 13.66-11.117 24.691-24.691 24.691zm0-52.438h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-287.21h510.02v287.21c0.085938 13.578-11.031 24.691-24.605 24.691zm-485.42-409.31c0-13.574 11.031-24.691 24.691-24.691h60.75v23.418c-2.7148 0.76172-5.3438 1.8672-7.8047 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0078-2.5469-7.7227-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.3438 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.2617 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.594 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.5273-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h60.75c13.574 0 24.691 11.031 24.691 24.691v80.945h-510.02zm93.672 36.316c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4141 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003907 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003906 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.453c3.6484 2.6289 5.9375 6.8711 5.9375 11.371 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4141 2.2891-8.6562 5.8555-11.285v11.371c0.085938 4.5781 3.8203 8.2266 8.3164 8.2266z"/><path d="m235.11 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m235.11 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/></g></svg>
                            </span>
                            <span>Horario: Web y Call 11:00am-11:00pm</span>
                          </div>
                          <a class="l-item-link" href="javascript:void(0);">
                            <span>RECOGER AQUÍ</span>
                          </a>
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
  <?php require_once 'includes/inc-footer.php';?>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
