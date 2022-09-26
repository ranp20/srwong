<div class="loader-in">
  <span class="loader-in--loader"></span>
</div>
<!-- header start -->
<header class="header-area">
  <div class="header-top black-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
          <div class="welcome-area">
            <p>DELIVERY GRATIS | De lunes a viernes por Web</p>
          </div>
        </div>
<!--         <div class="col-lg-8 col-md-8 col-12 col-sm-8">
          <div class="account-curr-lang-wrap f-right">
            <ul>
              <li class="top-hover"><a href="javascript:void(0);">Language: (ENG) <i class="ion-chevron-down"></i></a>
                <ul>
                  <li><a href="javascript:void(0);">Bangla </a></li>
                  <li><a href="javascript:void(0);">Arabic</a></li>
                  <li><a href="javascript:void(0);">Hindi </a></li>
                  <li><a href="javascript:void(0);">Spanish</a></li>
                </ul>
              </li>
              <li class="top-hover"><a href="javascript:void(0);">Currency: (USD) <i class="ion-chevron-down"></i></a>
                <ul>
                  <li><a href="javascript:void(0);">Taka (BDT)</a></li>
                  <li><a href="javascript:void(0);">Riyal (SAR)</a></li>
                  <li><a href="javascript:void(0);">Rupee (INR)</a></li>
                  <li><a href="javascript:void(0);">Dirham (AED)</a></li>
                </ul>
              </li>
              <li class="top-hover"><a href="javascript:void(0);">Setting  <i class="ion-chevron-down"></i></a>
                <ul>
                  <li><a href="wishlist">Wishlist  </a></li>
                  <li><a href="login-register">Login</a></li>
                  <li><a href="login-register">Register</a></li>
                  <li><a href="my-account">my account</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="header-middle" style="border-bottom: thin solid #888;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
          <div class="logo">
            <a href="./" style="display:flex;align-items: center;justify-content: center;flex-flow:wrap row;max-width:128px;">
              <img alt="" src="<?= $url;?>assets/img/logo/logo.png">
            </a>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 col-12 col-sm-6">
          <div class="main-menu">
            <nav>
              <ul>
                <li class="top-hover"><a style="color:#2f333a;" href="./">MENU <i class="ion-chevron-down"></i></a></li>
                <li><a style="color:#2f333a;" href="about-us">PROMOCIONES</a></li>
                <li class="mega-menu-position top-hover"><a style="color:#2f333a;" href="shop">LOCALES<i class="ion-chevron-down"></i></a></li>
                <li class="top-hover"><a style="color:#2f333a;" href="blog-rightsidebar">DESCARGA LA CARTA <i class="ion-chevron-down"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>
    

        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
          <div class="header-middle-right f-right">
            <div class="header-login" id="header-login" style="position: relative;top: 1rem;margin-left:1rem;">
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
                        <a href='my-account'>
                          <i class='icon-user icons'></i>
                          <span>Mi cuenta</span>
                        </a>
                      </li>
                      <li class='single-listoptions-login'>
                        <a href='logout'>
                          <i class='icon-logout icons'></i>
                          <span>Cerrar sesión</span>
                        </a>
                      </li>
                    </ul>
                  </div>";
                }else{
                  $tmp_logg = "
                  <a href='login-register'>
                    <div class='header-icon-style'>
                      <i class='icon-user icons'></i>
                    </div>
                    <div class='login-text-content' id='login-text-content'>
                      <p>Register <br> or <span>Sign in</span></p>
                    </div>
                  </a>";
                }
                echo $tmp_logg;
              ?>
            </div>
            <!-- 
            <div class="header-wishlist" style="position: relative;top: 1rem;margin-left:1rem;">
              <a href="wishlist">
                <div class="header-icon-style">
                  <i class="icon-heart icons"></i>
                </div>
                <div class="wishlist-text">
                  <p>Your <br> <span>Wishlist</span></p>
                </div>
              </a>
            </div>
             -->
            <div class="header-cart" style="position: relative;top: 1rem;margin-left:1rem;">
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
                      <a href='./login-register' id='logg-lk_cart-s'>Iniciar sesión</a>
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
<!--   <div class="header-bottom transparent-bar black-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn">
              <ul>
                <li class="top-hover"><a href="./">home <i class="ion-chevron-down"></i></a>
                  <ul class="submenu">
                    <li><a href="./">home version 1</a></li>
                    <li><a href="index-2">home version 2</a></li>
                  </ul>
                </li>
                <li><a href="about-us">about</a></li>
                <li class="mega-menu-position top-hover"><a href="shop">shop <i class="ion-chevron-down"></i></a>
                  <ul class="mega-menu">
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="javascript:void(0);">Categories 01</a></li>
                        <li><a href="shop">salad</a></li>
                        <li><a href="shop">sandwich</a></li>
                        <li><a href="shop">bread</a></li>
                        <li><a href="shop">steak</a></li>
                        <li><a href="shop">tuna steak</a></li>
                        <li><a href="shop">spaghetti </a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="javascript:void(0);">Categories 02</a></li>
                        <li><a href="shop">rice</a></li>
                        <li><a href="shop">pizza</a></li>
                        <li><a href="shop">hamburger</a></li>
                        <li><a href="shop">eggs</a></li>
                        <li><a href="shop">sausages</a></li>
                        <li><a href="shop">apple juice</a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="javascript:void(0);">Categories 03</a></li>
                        <li><a href="shop">milk</a></li>
                        <li><a href="shop">grape juice</a></li>
                        <li><a href="shop">cookie</a></li>
                        <li><a href="shop">candy</a></li>
                        <li><a href="shop">cake</a></li>
                        <li><a href="shop">cupcake</a></li>
                      </ul>
                    </li>
                    <li>
                      <ul>
                        <li class="mega-menu-title"><a href="javascript:void(0);">Categories 04</a></li>
                        <li><a href="shop">pie</a></li>
                        <li><a href="shop">stoberry</a></li>
                        <li><a href="shop">sandwich</a></li>
                        <li><a href="shop">bread</a></li>
                        <li><a href="shop">steak</a></li>
                        <li><a href="shop">hamburger</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="top-hover"><a href="blog-rightsidebar">blog <i class="ion-chevron-down"></i></a>
                  <ul class="submenu">
                    <li><a href="blog">Blog No sidebar</a></li>
                    <li><a href="blog-rightsidebar">Blog sidebar</a></li>
                    <li><a href="blog-details">Blog details</a></li>
                    <li><a href="blog-details-gallery">Blog details gallery</a></li>
                    <li><a href="blog-details-video">Blog details video</a></li>
                  </ul>
                </li>
                <li class="top-hover"><a href="javascript:void(0);">pages <i class="ion-chevron-down"></i></a>
                  <ul class="submenu">
                    <li><a href="about-us">about us </a></li>
                    <li><a href="shop">shop Grid</a></li>
                    <li><a href="shop-list">shop list</a></li>
                    <li><a href="product-details">product details</a></li>
                    <li><a href="cart-page">cart page</a></li>
                    <li><a href="checkout">checkout</a></li>
                    <li><a href="wishlist">wishlist</a></li>
                    <li><a href="my-account">my account</a></li>
                    <li><a href="login-register">login / register</a></li>
                    <li><a href="contact">contact</a></li>
                    <li><a href="testimonial">Testimonials</a></li>
                  </ul>
                </li>
                <li><a href="contact">contact us</a></li>
                <li><a href="shop">burger</a></li>
                <li><a href="shop">pizza</a></li>
                <li><a href="shop">cold drink</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- mobile-menu-area-start -->
  <div class="mobile-menu-area">
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12">
  			<div class="mobile-menu">
  				<nav id="mobile-menu-active">
  					<ul class="menu-overflow" id="nav">
  						<li><a href="./">Home</a>
  							<ul>
  								<li><a href="./">home version 1</a></li>
                  <li><a href="index-2">home version 2</a></li>
  							</ul>
  						</li>
  						<li><a href="javascript:void(0);">pages</a>
  							<ul>
  								<li><a href="about-us">about us </a></li>
                    <li><a href="shop">shop Grid</a></li>
                    <li><a href="shop-list">shop list</a></li>
                    <li><a href="product-details">product details</a></li>
                    <li><a href="cart-page">cart page</a></li>
                    <li><a href="checkout">checkout</a></li>
                    <li><a href="wishlist">wishlist</a></li>
                    <li><a href="my-account">my account</a></li>
                    <li><a href="login-register">login / register</a></li>
                    <li><a href="contact">contact</a></li>
                    <li><a href="testimonial">Testimonials</a></li>
  							</ul>
  						</li>
  						<li><a href="shop"> Shop </a>
                <ul>
                  <li><a href="javascript:void(0);">Categories 01</a>
                    <ul>
                      <li><a href="shop">salad</a></li>
                      <li><a href="shop">sandwich</a></li>
                      <li><a href="shop">bread</a></li>
                      <li><a href="shop">steak</a></li>
                      <li><a href="shop">tuna steak</a></li>
                      <li><a href="shop">spaghetti </a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0);">Categories 02</a>
                    <ul>
                      <li><a href="shop">rice</a></li>
                      <li><a href="shop">pizza</a></li>
                      <li><a href="shop">hamburger</a></li>
                      <li><a href="shop">eggs</a></li>
                      <li><a href="shop">sausages</a></li>
                      <li><a href="shop">apple juice</a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0);">Categories 03</a>
                    <ul>
                      <li><a href="shop">milk</a></li>
                      <li><a href="shop">grape juice</a></li>
                      <li><a href="shop">cookie</a></li>
                      <li><a href="shop">candy</a></li>
                      <li><a href="shop">cake</a></li>
                      <li><a href="shop">cupcake</a></li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0);">Categories 04</a>
                    <ul>
                      <li><a href="shop">pie</a></li>
                      <li><a href="shop">stoberry</a></li>
                      <li><a href="shop">sandwich</a></li>
                      <li><a href="shop">bread</a></li>
                      <li><a href="shop">steak</a></li>
                      <li><a href="shop">hamburger</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
  						<li><a href="blog-rightsidebar">blog</a>
  							<ul>
  								<li><a href="blog">Blog No sidebar</a></li>
                    <li><a href="blog-rightsidebar">Blog sidebar</a></li>
                    <li><a href="blog-details">Blog details</a></li>
                    <li><a href="blog-details-gallery">Blog details gallery</a></li>
                    <li><a href="blog-details-video">Blog details video</a></li>
  							</ul>
  						</li>
  						<li><a href="contact">contact us</a></li>
  						<li><a href="shop">burger</a></li>
  					</ul>
  				</nav>
  			</div>
  		</div>
  	</div>
  </div>
  </div>
  <!-- mobile-menu-area-end -->
</header>