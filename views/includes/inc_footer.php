<?php 
  $lisShortList = $categories->getAll();
  $shortListCatg = array_slice($lisShortList, 0, 5);
?>
<div class="footer-area black-bg-2 pt-70">
  <div class="footer-top-area pb-18">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer-about mb-40">
            <div class="footer-logo">
              <a href="index">
                <img src="<?= $url;?>assets/img/logo/footer-logo.png" alt="">
              </a>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
            <div class="payment-img">
              <a href="javascript:void(0);">
                <img src="<?= $url;?>assets/img/icon-img/payment.png" alt="">
              </a>
            </div>
          </div>
        </div>
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
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>MENÚ</h4>
            </div>
            <div class="footer-content">
              <ul>
                <li><a href="my-account">Perfil</a></li>
                <li><a href="about-us">Nosotros</a></li>
                <li><a href="wishlist">Políticas de privacidad</a></li>
                <li><a href="javascript:void(0);">Términos y condiciones</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer-widget mb-40">
            <div class="footer-title mb-22">
              <h4>Get in touch</h4>
            </div>
            <div class="footer-contact">
              <ul>
                <li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
                <li>Telephone Enquiry: (012) 800 456 789-987 </li>
                <li>Email: <a href="javascript:void(0);">Info@example.com</a></li>
              </ul>
            </div>
            <div class="mt-35 footer-title mb-22">
              <h4>Get in touch</h4>
            </div>
            <div class="footer-time">
              <ul>
                <li>Open:  <span>8:00 AM</span> - Close: <span>18:00 PM</span></li>
                <li>Saturday - Sunday: <span>Close</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom-area border-top-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-7">
          <div class="copyright">
            <p>Copyright © <a href="javascript:void(0);">SrWong.</a> . Todos los derechos reservados.</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-5">
          <div class="footer-social">
            <ul>
              <li><a href="javascript:void(0);"><i class="ion-social-facebook"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-twitter"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-instagram-outline"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-googleplus-outline"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-rss"></i></a></li>
              <li><a href="javascript:void(0);"><i class="ion-social-dribbble-outline"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>