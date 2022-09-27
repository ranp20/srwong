<div class="product-area pb-70">
  <div class="container">
    <div class="product-tab-list-wrap text-center mb-40">
      <div class="product-tab-list-wrap text-center mb-40">
        <div class="row">
          <div class="col-lg-12">      
            <div class="title-all text-center">
              <h3>PRODUCTOS MÁS RECIENTES</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-content jump">
      <div class="tab-pane active">
        <div class="owl-latest-products-home owl-carousel owl-theme row">
          <?php
            echo $dmlProducts->getUltimos();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>