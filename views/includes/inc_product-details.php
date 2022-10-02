<?php 
  $p_pathimg = "../admin/storage/app/public/product/".$l_details['p_photo'];
  $p_name = substr($l_details["p_name"], 0, 60);
  $p_desc = ($l_details["p_desc"] != "") ? substr($l_details["p_desc"], 0, 120) : "No especificado";
  $p_price_old = number_format($l_details['p_price'], 2, '.', ' '); 
  $p_price_new = $l_details['p_price'] - $l_details['p_discount'];
  $p_price_new = number_format($p_price_new, 2, '.', ' ');
  $p_status = ($l_details["p_status"] == 1) ? "Disponible" : "No disponible";
  $p_discount_type = $l_details['p_discount_type'];
  $p_discount = $l_details['p_discount'];
  $tmpDiscount = "";
  if($p_discount_type == "percent"){
    if($p_discount != 0 || $p_discount != 0.00 || $p_discount != "0.00"){
      $tmpDiscount = "<span>-{$p_discount}%</span>";
    }
  }

?>
<div class='product-details pt-100 pb-90'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-6 col-md-12'>
        <div class='product-details-img'>
          <img class='foto-producto' src='<?= $p_pathimg;?>' data-zoom-image='<?= $p_pathimg;?>' alt='zoom'/>
          <!-- 
          <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
            <a data-image="<?= $p_pathimg;?>" data-zoom-image="<?= $p_pathimg;?>">
              <img src="<?= $p_pathimg;?>" alt="">
            </a>
          </div>
           -->
          <?= $tmpDiscount;?>
        </div>
      </div>
      <div class='col-lg-6 col-md-12'>
        <div class='product-details-content'>
          <h4><?= $p_name;?></h4>
          <span>S/. <?= $p_price_new;?></span>
          <div class='in-stock'>
            <p>Estado: <span><?= $p_status;?></span></p>
          </div>
          <p><?= $p_desc;?></p>
          <div class='pro-dec-feature'>
            <ul>
              <?php 
                foreach(json_decode($l_details['p_add_ons']) as $k => $v){
                  echo $dmlProducts->getAddOns($v);
                }
              ?>
            </ul>
          </div>
          <div class='pro-details-cart-wrap'>
            <div class='product-details-wishlist'>
              <a title='Add To Cart' href='javascript:void(0);' class='a__tocart'
                dt-srwg_name='<?= $p_name;?>'
                dt-srwg_price='<?= $p_price_new;?>'
                dt-srwg_image='<?= $p_pathimg;?>'
                dt-srwg_id='<?= $l_details["id"];?>'
              >
                <i class='ion-android-cart'></i>
                <span>AGREGAR AL CARRITO</span>
              </a>
            </div>
          </div>
          <div class='pro-dec-categories'>
            <ul>
              <li class='categories-title'>Categories:</li>
              <?php
                echo ($dmlProducts->getCategoriesProducts($_GET['prod']));
              ?>
            </ul>
          </div>
          <!-- <div class='pro-dec-categories'>
            <ul>
              <li class='categories-title'>Etiquetas: </li>
              <li><a href='javascript:void(0);'> Cheesy,</a></li>
              <li><a href='javascript:void(0);'> Fast Food, </a></li>
              <li><a href='javascript:void(0);'> French Fries,</a></li>
            </ul>
          </div> -->
          <div class='pro-dec-social'>
            <ul>
              <li><a class='tweet' href='javascript:void(0);'><i class='ion-social-twitter'></i> Tweet</a></li>
              <li><a class='share' href='javascript:void(0);'><i class='ion-social-facebook'></i> Share</a></li>
              <li><a class='google' href='javascript:void(0);'><i class='ion-social-googleplus-outline'></i> Google+</a></li>
              <li><a class='pinterest' href='javascript:void(0);'><i class='ion-social-pinterest'></i> Pinterest</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class='description-review-area pb-100'>
  <div class='container'>
    <div class='description-review-wrapper'>
      <div class='description-review-topbar nav text-center'>
        <a class='active' data-toggle='tab' href='#des-details1'>Descripción</a>
      </div>
      <div class='tab-content description-review-bottom'>
        <div id='des-details1' class='tab-pane active'>
          <div class='product-description-wrapper'>
            <?= $p_desc;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>