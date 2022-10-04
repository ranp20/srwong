<div class="loader-in">
  <span class="loader-in--loader"></span>
</div>
<!-- header start -->
<header class="header-area">
  <div class="header-top black-bg hphom__sec">
    <div class="hphom__sec--cBnnadd">
      <div class="container contain-def-theme hphom__sec--cBnnadd__c">
        <div class="row hphom__sec--cBnnadd__c__cont">
          <div class="col-lg-12 col-md-12 col-12 col-sm-12 hphom__sec--cBnnadd__c__cont__sec">
            <div class="welcome-area hphom__sec--cBnnadd__c__cont__sec--cTitle">
              <h3><strong>DELIVERY GRATIS</strong> | De lunes a viernes por Web</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-middle hphom__sec">
    <div class="hphom__sec--cHTopNav">    
      <div class="container contain-def-theme hphom__sec--cHTNav__c">
        <div class="row hphom__sec--cHTNav__c__cont">
          <div class="col-lg-2 col-md-2 col-12 col-sm-2 logos hphom__sec--cHTNav__c__cont--cLogo">
            <div class="logo hphom__sec--cHTNav__c__cont--cLogo__c">
              <a href="../" class="hphom__sec--cHTNav__c__cont--cLogo__c--cLink" title="Ir al inicio">
                <img alt="" src="<?= $url;?>assets/img/logo/logo.png">
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-12 col-sm-7 menus hphom__sec--cHTNav__c__cont--cMenus">
            <div class="main-menu hphom__sec--cHTNav__c__cont--cMenus__c">
              <nav class="hphom__sec--cHTNav__c__cont--cMenus__c__nav">
                <ul class="hphom__sec--cHTNav__c__cont--cMenus__c__nav--m">
                  <li class="top-hover hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--i">
                    <a href="../" class="hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--link">INICIO </i></a>
                  </li>
                  <li class="hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--i">
                    <a href="../categories" class="hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--link">CATEGORÍAS</a>
                  </li>
                  <li class="mega-menu-position top-hover hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--i">
                    <a href="../branch" class="hphom__sec--cHTNav__c__cont--cMenus__c__nav--m--link">LOCALES</i></a>
                  </li>
                  
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-12 col-sm-3 bloq hphom__sec--cHTNav__c__cont--cLinkMenus">
            <div class="header-middle-right f-right">
              <div class="header-wishlist">
                <a href="tel:+51612800">
                  <div class="header-icon-style">
                    <i class="icon-phone icons"></i>
                  </div>
                  <div class="wishlist-text">
                    <p class="pedido">DELIVERY<br> <span>612 8000 </span></p>
                  </div>
                </a>
              </div>
              <div class="header-login" id="header-login">
                <?php
                  $tmp_logg = "";
                  if(isset($_SESSION['usr-logg_srwong'])){
                    $tmp_logg = "
                    <a href='javascript:void(0);' id='listcards_logg'>
                      <div class='header-icon-style'>
                        <i class='icon-user icons'></i>
                      </div>
                      <div class='login-text-content' id='login-text-content'>
                        <p><strong>{$_SESSION['usr-logg_srwong']['username']}</strong></p>
                      </div>
                    </a>
                    <div class='listoptions-login-content'>
                      <ul>
                        <li class='single-listoptions-login'>
                          <a href='../my-account'>
                            <i class='icon-user icons'></i>
                            <span>Mi cuenta</span>
                          </a>
                        </li>
                        <li class='single-listoptions-login'>
                          <a href='../logout'>
                            <i class='icon-logout icons'></i>
                            <span>Cerrar sesión</span>
                          </a>
                        </li>
                      </ul>
                    </div>";
                  }else{
                    $tmp_logg = "
                    <a href='../login-register'>
                      <div class='header-icon-style'>
                        <i class='icon-user icons'></i>
                      </div>
                    </a>";
                  }
                  echo $tmp_logg;
                ?>
              </div>
              <div class="header-cart">
                <a href="javascript:void(0);" id="c-totcart">
                  <?php 
                    if(!isset($_SESSION['usr-logg_srwong'])){
                      echo "
                        <div class='header-icon-style'>
                          <i class='icon-handbag icons'></i>
                          <span class='count-style'> 0 </span>
                        </div>
                        <div class='cart-text'>
                          <span class='digit'>Mi Carrito</span>
                          <span class='cart-digit-bold'>S/. 0.00</span>
                        </div>
                      ";
                    }
                  ?>
                </a>
                <div class="shopping-cart-content" id="c-listCartU">
                  <?php 
                    if(!isset($_SESSION['usr-logg_srwong'])){
                      echo "
                      <ul>
                        <li class='single-shopping-cart'>
                          <div class='shopping-cart-title' style='padding-bottom: 20px;'>
                            <h4>No hay productos</h4>
                          </div>
                        </li>
                      </ul>
                      <div class='shopping-cart-btn'>
                        <a href='../login-register' id='logg-lk_cart-s'>Iniciar sesión</a>
                      </div>
                      ";
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mobile-menu-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="mobile-menu">
            <nav id="mobile-menu-active">
              <ul class="menu-overflow" id="nav">
                <li class="top-hover">
                  <a style="color:#2f333a;" href="../">INICIO </i></a>
                </li>
                <li>
                  <a style="color:#2f333a;" href="../categories">CATEGORÍAS</a>
                </li>
                <li class="mega-menu-position top-hover">
                  <a style="color:#2f333a;" href="../branch">LOCALES</i></a>
                </li>
               
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>