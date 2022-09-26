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
      <div class="tab-pane active">
        <div class="owl-popular-products-home owl-carousel owl-theme row">
          <?php 
            require_once './model/Products.php';
            echo $dmlProducts->getMasPopulares();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>