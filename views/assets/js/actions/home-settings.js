// ------------ ENCRIPTAR DATOS DE INPUTS
function encryptValuesIpts(valueipt){
  let ciphertext = CryptoJS.AES.encrypt(valueipt, 'CML_KEYSYSTEM').toString();
  return ciphertext;
}
// ------------ DESENCRIPTAR DATOS DE INPUTS
function decryptValuesIpts(valueipt){
  let bytes  = CryptoJS.AES.decrypt(valueipt, 'CML_KEYSYSTEM');
  let originalText = bytes.toString(CryptoJS.enc.Utf8);
  return originalText;
}
// ------------ COMPROBAR SI ES NUMÉRICO
function isNumeric(variable){return !isNaN(parseInt(variable));}
$(() => {
  // ------------ ENCRIPTACIÓN DE INPUTS
  var encrypt_sess_idcli = $("#u-s_regclient-sis").val(encryptValuesIpts($("#u-s_regclient-sis").val()));
  // ------------ DESENCRIPTACIÓN DE INPUTS
  var sess_idcli = decryptValuesIpts(encrypt_sess_idcli.val());
  // ------------ LISTAR LOS PRODUCTOS EN EL CARRITO DE DICHO CLIENTE
  listCartList();
  // ------------ Slider active
  $('.slider-active').owlCarousel({
    loop: true,
    nav: true,
    autoplay: false,
    autoplayTimeout: 5000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    item: 1,
    responsive: {
      0: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    }
  });
  // ------------ Best selling active
  $('.product-slider-active').owlCarousel({
    loop: true,
    nav: true,
    autoplay: false,
    autoplayTimeout: 5000,
    navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
    item: 3,
    margin: 30,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 2
      },
      992: {
        items: 2
      },
      1200: {
        items: 3
      }
    }
  });
  // ------------ Brand logo active
  $('.brand-logo-active').owlCarousel({
    loop: true,
    nav: false,
    autoplay: false,
    autoplayTimeout: 5000,
    item: 5,
    margin: 80,
    responsive: {
      0: {
        items: 1,
        margin: 0,
      },
      480: {
        items: 2,
        margin: 30,
      },
      768: {
        items: 4,
        margin: 30,
      },
      992: {
        items: 4,
        margin: 100,
      },
      1200: {
        items: 5
      }
    }
  });
  // ------------ Thumbnail Product activation
  $('.thumb-menu').owlCarousel({
    loop: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    margin: 15,
    smartSpeed: 1000,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 3,
        autoplay: true,
        smartSpeed: 300
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      1000: {
        items: 3
      }
    }
  });
  $('.thumb-menu a').on('click', function(){
    $('.thumb-menu a').removeClass('active');
  });
  // ------------ Product filter by category
  $('.products-tabfilter-home').owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    autoplay:false,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    nav:false,
    dots:false,
    margin:10,
    responsiveClass:true,
    responsive:{
      0: {
        items: 1,
        nav:false,
        dots:false
      },
      576: {
        items: 2,
        nav:false,
        dots:false
      },
      768: {
        items: 3,
        nav:false,
        dots:false
      },
      992: {
        items: 4,
        nav:false,
        dots:false
      },
      1200: {
        items: 4,
        nav:false,
        dots:false
      }
    }
  });
  // $('.slider-arrow-left').click(function(){
  //   owl.trigger('prev.owl.carousel', [300]);
  // });
  // $('.slider-arrow-right').click(function(){
  //   owl.trigger('next.owl.carousel', [300]);
  // });
  // ------------ Categories into home
  var owl_categlisthome = $('.categories-list-home');
  owl_categlisthome.owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    autoplay:false,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    nav:false,
    dots:false,
    margin:10,
    responsiveClass:true,
    responsive:{
      0: {
        items: 1,
        nav:false,
        dots:false
      },
      576: {
        items: 2,
        nav:false,
        dots:false
      },
      768: {
        items: 3,
        nav:false,
        dots:false
      },
      992: {
        items: 4,
        nav:false,
        dots:false
      },
      1200: {
        items: 4,
        nav:false,
        dots:false
      }
    }
  });
  $('.slider-arrow-left').click(function(){
    owl_categlisthome.trigger('prev.owl.carousel', [300]);
  });
  $('.slider-arrow-right').click(function(){
    owl_categlisthome.trigger('next.owl.carousel', [300]);
  });
  // ------------ PRODUCTOS POPULARES - HOME
  var owl_popularproductshome = $('.owl-popular-products-home');
  owl_popularproductshome.owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    autoplay:false,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    nav:false,
    dots:false,
    margin:10,
    responsiveClass:true,
    responsive:{
      0: {
        items: 1,
        nav:false,
        dots:false
      },
      576: {
        items: 2,
        nav:false,
        dots:false
      },
      768: {
        items: 3,
        nav:false,
        dots:false
      },
      992: {
        items: 4,
        nav:false,
        dots:false
      },
      1200: {
        items: 4,
        nav:false,
        dots:false
      }
    }
  });
  // $('.slider-arrow-left').click(function(){
  //   owl_popularproductshome.trigger('prev.owl.carousel', [300]);
  // });
  // $('.slider-arrow-right').click(function(){
  //   owl_popularproductshome.trigger('next.owl.carousel', [300]);
  // });
  // ------------ PRODUCTOS POPULARES - HOME
  var owl_latestproductshome = $('.owl-latest-products-home');
  owl_latestproductshome.owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    autoplay:false,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    nav:false,
    dots:false,
    margin:10,
    responsiveClass:true,
    responsive:{
      0: {
        items: 1,
        nav:false,
        dots:false
      },
      576: {
        items: 2,
        nav:false,
        dots:false
      },
      768: {
        items: 3,
        nav:false,
        dots:false
      },
      992: {
        items: 4,
        nav:false,
        dots:false
      },
      1200: {
        items: 4,
        nav:false,
        dots:false
      }
    }
  });
  // $('.slider-arrow-left').click(function(){
  //   owl_latestproductshome.trigger('prev.owl.carousel', [300]);
  // });
  // $('.slider-arrow-right').click(function(){
  //   owl_latestproductshome.trigger('next.owl.carousel', [300]);
  // });
  // ------------ AGREGAR UN PRODUCTO AL CARRITO
  $(document).on("click",".a__tocart",function(e){
    e.preventDefault();
    if(isNumeric(sess_idcli) == true || isNumeric(sess_idcli) == "true"){
      let cart = {
        p_id: $(this).attr('dt-srwg_id'),
        p_idcli: sess_idcli,
        p_quantity: 1,
        p_price: $(this).attr('dt-srwg_price')
      };
      $.ajax({
        url: "./controllers/prcss_cart-list-temp.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: cart,
        success : function(e){
          if(e != "" && e != "[]"){
            if(e.r == "srwg_add"){
              listCartList();
              Swal.fire({
                position: 'top-end',
                title: 'Producto agregado',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                timer: 1200,
                grow: "row",
                toast: true,
              });
              $(document).on('click', '.SwalBtn1', function() {
                swal.clickConfirm();
              });
            }else if(e.r == "srwg_update"){
              listCartList();
              Swal.fire({
                position: 'top-end',
                title: 'Producto actualizado',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                timer: 1200,
                grow: "row",
                toast: true,
              });
              $(document).on('click', '.SwalBtn1', function() {
                swal.clickConfirm();
              });
            }else{
              console.log('Lo sentimos, hubo un error al procesar la información');
            }
          }else{
            console.log('Lo sentimos, hubo un error al procesar la información');
          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      });
    }else{
      window.location.href = "./login-register";
    }
  });
  // ------------ LISTAR EL CARRITO DE COMPRAS
  function listCartList(){
    if(isNumeric(sess_idcli) == true || isNumeric(sess_idcli) == "true"){
      $("#c-listCartU").html("");
      $.ajax({
        url: "./controllers/prcss_cart-list-byIdTempCart.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: { idcli : sess_idcli},
        success : function(e){
          if(e != "" && e != "[]"){
            let tmpList = "";
            tmpList += `<ul>`;
            // ------------ SUMAR LOS SUBTOTALES DE TODOS LOS PRODUCTOS
            let totalpay = e.reduce(function(sum, v){
              return sum + parseFloat(v.tmp_subtotal)
            }, 0);
            // ------------ AGREGAR DOS CEROS AL FINAL DE CADA NÚMERO SIN UNO O DOS CEROS
            var tpay_wzero = Number(totalpay);
            var res = totalpay.toString().split(".");
            if(res.length == 1 || (res[1].length < 3)) {
              tpay_wzero = tpay_wzero.toFixed(2);
            }
            $("#c-totcart").html(`
              <div class="header-icon-style">
                <i class="icon-handbag icons"></i>
                <span class="count-style">${e.length}</span>
              </div>
              <div class="cart-text">
                <span class="digit">Mi Carrito</span>
                <span class="cart-digit-bold">S/. ${tpay_wzero}</span>
              </div>
            `);
            $.each(e, function(i,v){
              let p_pathimg = "./adminSrwong/storage/app/public/product/"+v.p_photo;
              let p_name = v.p_name;
              let p_name_limit = (p_name.length >= 20) ? p_name.substring(20, 0) + "..." : p_name;
              tmpList += `
                <li class="single-shopping-cart">
                  <div class="shopping-cart-img">
                    <a href="./product-details/${v.id}">
                      <img alt="" src="${p_pathimg}" alt="${p_name_limit}">
                    </a>
                  </div>
                  <div class="shopping-cart-title">
                    <h4><a href="./product-details/${v.id}">${p_name_limit} </a></h4>
                    <h6>Cantidad: ${v.tmp_quantity}</h6>
                    <span>S/. ${v.tmp_subtotal}</span>
                  </div>
                  <!--
                  <div class="shopping-cart-delete">
                    <a href="./product-details/${v.id}"><i class="ion ion-close"></i></a>
                  </div>
                  -->
                </li>
              `;
            });
            tmpList += `</ul>`;
            tmpList += `
              <div class="shopping-cart-total">
                <h4>Total : <span class="shop-total">S/. ${tpay_wzero}</span></h4>
              </div>
              <div class="shopping-cart-btn">
                <a href="cart-page" id="lk_cart">view cart</a>
                <!-- <a href="checkout" id="lk_checkout">checkout</a> -->
              </div>
            `;
            $("#c-listCartU").html(tmpList);
          }else{
            $("#c-totcart").html(`
              <div class="header-icon-style">
                <i class="icon-handbag icons"></i>
                <span class="count-style"> 0 </span>
              </div>
              <div class="cart-text">
                <span class="digit">Mi Carrito</span>
                <span class="cart-digit-bold">S/. 0.00</span>
              </div>
            `);
            $("#c-listCartU").html(`
              <ul>
                <li class='single-shopping-cart'>
                  <div class='shopping-cart-title' style='padding-bottom: 20px;'>
                    <h4>No hay productos</h4>
                  </div>
                </li>
              </ul>
              <div class='shopping-cart-btn'>
                <a href='./cart-page' id='logg-lk_cart-s'>Carrito</a>
              </div>
            `);
          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      });
    }else{
      $("#c-totcart").html(`
        <div class="header-icon-style">
          <i class="icon-handbag icons"></i>
          <span class="count-style"> 0 </span>
        </div>
        <div class="cart-text">
          <span class="digit">Mi Carrito</span>
          <span class="cart-digit-bold">S/. 0.00</span>
        </div>
      `);
      $("#c-listCartU").html(`
        <ul>
          <li class='single-shopping-cart'>
            <div class='shopping-cart-title' style='padding-bottom: 20px;'>
              <h4>No hay productos</h4>
            </div>
          </li>
        </ul>
        <div class='shopping-cart-btn'>
          <a href='./cart-page' id='logg-lk_cart-s'>Carrito</a>
        </div>
      `);
    }
  }
  // ------------ IR HACIA LA PÁGINA - CART LIST (VALIDAR LA SESIÓN)
  $(document).on("click","#logg-lk_cart-s",function(){window.location.href = "./login-register";});
});
