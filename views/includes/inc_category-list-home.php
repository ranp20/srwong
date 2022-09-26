<div class="product-area pb-70">
  <div class="container hrsec-separator-home">
    <div class="product-tab-list-wrap text-center mb-40">
      <div class="row">
        <div class="col-lg-12">      
          <div class="title-all text-center">
            <h3>TODAS LAS CATEGORÍAS</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="cxhm_category">
      <div class="cxhm_category__cBtnIconSlide ps-x-left">
        <span class="slider-arrow-left">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m202.88 254.85 244.79-244.79c14.25-13.414 36.047-13.414 49.461 0s13.414 35.211 0 49.461l-220.48 220.48 220.48 220.48c13.414 13.414 13.414 36.047 0 49.461-13.414 13.414-35.211 13.414-49.461 0l-244.79-245.63c-13.414-13.414-13.414-35.211 0-49.461z" fill-rule="evenodd"/></g></svg>
        </span>
      </div>

      <div class="categories-list-home owl-carousel owl-theme row">
        <!-- LIST ALL CATEGORIES -->
        <?php 
          require_once './model/Categories.php';
          echo $dmlCategories->getCategoriesCarousel();
        ?>
        <!-- LIST ALL CATEGORIES -->
      </div>

      <div class="cxhm_category__cBtnIconSlide ps-x-right">
        <span class="slider-arrow-right">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m497.12 254.85-244.79-244.79c-14.25-13.414-36.047-13.414-49.461 0s-13.414 35.211 0 49.461l220.48 220.48-220.48 220.48c-13.414 13.414-13.414 36.047 0 49.461 13.414 13.414 35.211 13.414 49.461 0l244.79-245.63c13.414-13.414 13.414-35.211 0-49.461z" fill-rule="evenodd"/></g></svg>
        </span>
      </div>
    </div>
  </div>
</div>