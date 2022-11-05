<?php 
  $lisShortList = $dmlCategories->getAll();
  $shortListCatg = array_slice($lisShortList, 0, 5);
?>
<div class="footer-area black-bg-2 pt-70">
  <div class="footer-top-area pb-18">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-about mb-40">
            <div class="footer-logo">
              <a href="https://srwong.pe/">
                <img src="<?= $url;?>assets/img/logo/logo.png" alt="" class="img-fluid">
              </a>
            </div>            
          </div>
        </div>
        <!--
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>CATEGORÍAS</h4>
            </div>
            <div class="footer-content">
              <ul>
                <?php
                  $tmp_ctgshort = "";
                  foreach($shortListCatg as $k => $v){
                    $catg_name = mb_convert_case($v['name'], MB_CASE_TITLE, "UTF-8");
                    $tmp_ctgshort .= "<li><a href='./category/{$v['id']}'>{$catg_name}</a></li>";
                  }
                  echo $tmp_ctgshort;
                ?>
              </ul>
            </div>
          </div>
        </div>
        -->
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>MENÚ</h4>
            </div>
            <div class="footer-content">
              <ul>
                <li><a href="./my-account">Perfil</a></li>
                <li><a href="./about-us">Nosotros</a></li>
                <li><a href="./privacy-policies">Políticas de privacidad</a></li>
                <li><a href="./terms-and-conditions">Términos y condiciones</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <?php echo $dmlFooterSettings->getInfoOfContact(); ?>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-title mb-22">
            <h4>FORMAS DE PAGO</h4>
          </div>
        <div class="blod">
            <img src="<?= $url;?>assets/img/tarjetas.png" alt="" class="img-fluid" style="width: 80%;text-align: center;padding-top: 5px;padding-bottom: 15px;">
            <a href="https://srwong.pe/complaints-book">
            <img src="<?= $url;?>assets/img/libro-de-e.png" alt="" class="img-fluid" style="padding-top: 5px;padding-bottom: 5px;background: #ffffff8f;margin-bottom: 5px;border-radius: 10px;">
            </a>
          </div>
          <div class="footer-title mb-22">
            <h4>SIGUENOS EN </h4>   
            <a href="https://www.facebook.com/senorwongperu" target="_blank" ><img src="<?= $url;?>assets/img/red-1.png" class="img-fluid" style="padding: 5px;"></a><a href="https://www.instagram.com/srwongperu/" target="_blank" ><img src="<?= $url;?>assets/img/red-2.png" style="padding: 5px;"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom-area border-top-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="copyright">
            <p>Copyright © Señor Wong - Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>