<div class="product-area pb-70">
  <div class="container hrsec-separator-home">
    <div class="product-tab-list-wrap text-center mb-40">
      <div class="product-tab-list-wrap text-center mb-40">
        <div class="row">
          <div class="col-lg-12">      
            <div class="title-all text-center">
              <h3>PRODUCTOS MÁS POPULARES</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-content jump">
      <div id="tab1" class="tab-pane active">
        <div class="owl-popular-products-home owl-carousel owl-theme row">
          <?php 
            $tmp = "";
            foreach ($l_products as $key => $value){

              $p_name = substr($value["name"], 0, 60);
              $p_price_new = floatval($value['price']);
              $p_price_new_convert = addTwoDecimalsOrGuion($p_price_new);
              $p_price_old = $p_price_new - 10;
              $p_price_old_convert = addTwoDecimalsOrGuion($p_price_old);
              $prod_categories = substr($value['category_ids'], 1, strlen($value['category_ids']) - 2);
              $prod_list_categories = json_decode($prod_categories, TRUE);
              
              $tmp .= "
                <div class='item'>
                  <div class='product-wrapper mb-25'>
                    <div class='product-img'>
                      <a href='./product-details/{$value["id"]}'>
                        <img src='{$url}assets/img/product/mostricrunh.jpg' alt=''>
                      </a>
                      <div class='product-action'>
                        <div class='pro-action-left'>
                          <a title='Add Tto Cart' href='javascript:void(0);' class='a__tocart'
                            dt-srwg_name='{$p_name}'
                            dt-srwg_price='{$p_price_new_convert}'
                            dt-srwg_image='{$url}assets/img/product/mostricrunh.jpg'
                            dt-srwg_id='{$value["id"]}'
                          >
                            <i class='ion-android-cart'></i>
                            <span> Add Tto Cart</span>
                          </a>
                        </div>
                        <div class='pro-action-right'>
                          <a title='Wishlist' href='wishlist'><i class='ion-ios-heart-outline'></i></a>
                          <a title='Quick View' data-toggle='modal' data-target='#exampleModal' href='javascript:void(0);'><i class='ion-android-open'></i></a>
                        </div>
                      </div>
                    </div>
                    <div class='product-content'>
                      <h4>
                        <a href='./product-details/{$value["id"]}'>{$p_name}</a>
                      </h4>
                      <div class='product-price-wrapper'>
                        <span>S/. {$p_price_new_convert}</span>
                          <span class='product-price-old'>S/. {$p_price_old_convert} </span>
                      </div>
                      <!--<p><strong>ID CATEGORÍA: {$prod_list_categories['id']}</strong></p>-->
                    </div>
                  </div>
              </div>
              ";
            }
            echo $tmp;
          ?>
        </div>
      </div>
    </div>
  </div>
</div>