<div class="product-area pb-70">
  <div class="custom-container container">
    <div class="product-tab-list-wrap text-center mb-40">
      <div class="product-tab-list nav">
        <a class="active" href="#tab1" data-toggle="tab">
          <h4>All </h4>
        </a>
        <a href="#tab2" data-toggle="tab">
          <h4>Food </h4>
        </a>
        <a href="#tab3" data-toggle="tab">
          <h4> Drink </h4>
        </a>
      </div>
      <p>Typi non habent claritatem insitam est usus legentis in qui facit eorum claritatem, investigationes demonstraverunt lectores legere me lius quod legunt saepius.</p>
    </div>
    <div class="tab-content jump">
      <div id="tab1" class="tab-pane active">
        <div class="products-tabfilter-home owl-carousel owl-theme row">
          <?php 
            function addTwoDecimalsOrGuion($number){
              $output_final = "";
              if($number != "0" || $number != 0){
                $output_num = explode(".", $number);
                if(!isset($output_num[1]) || $output_num[1] == "undefined" || $output_num[1] == ""){
                  $output_final = number_format($number).".00";
                }else if(isset($output_num[1]) && strlen($output_num[1]) < 2){
                  $output_final = number_format($output_num[0]).".".$output_num[1]."0";
                }else{
                  $output_final = number_format($output_num[0]).".".$output_num[1];
                }
              }else{
                $output_final = 0.00;
              }
              return $output_final;
            }

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
                      <a href='product-details'>
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
                        <a href='product-details'>{$p_name}</a>
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
      <div id="tab2" class="tab-pane">
        <div class="products-tabfilter-home owl-carousel owl-theme row">
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
                      <a href='product-details'>
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
                        <a href='product-details'>{$p_name}</a>
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
      <div id="tab3" class="tab-pane">
        <div class="products-tabfilter-home owl-carousel owl-theme row">
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
                      <a href='product-details'>
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
                        <a href='product-details'>{$p_name}</a>
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