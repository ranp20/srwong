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

  /* ENCRIPTACIÓN DE INPUTS */
  var encrypt_v_idgencoderand = $("#u-s_regclient-sis").val(encryptValuesIpts($("#u-s_regclient-sis").val()));
  /* DESENCRIPTACIÓN DE INPUTS */
  var v_idgencoderand = decryptValuesIpts(encrypt_v_idgencoderand.val());

  /* Login options toggle active */
  $(".header-login #listcards_logg").on("click", function(e){
    e.preventDefault();
    $(this).parent().find('.listoptions-login-content').slideToggle('medium');
  });

  /* Cart Currency Search toggle active */
  $(".header-cart a").on("click", function(e){
    e.preventDefault();
    $(this).parent().find('.shopping-cart-content').slideToggle('medium');
  });

  /* Slider active */
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

  /* Best selling active */
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

  /*--------------------------
      ScrollUp
  ---------------------------- */
  $.scrollUp({
    scrollText: '<i class="fa fa-angle-double-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
  });

  /* Brand logo active */
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

  /*-------------------------------------
      Thumbnail Product activation
  --------------------------------------*/
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

  /* Product filter by category */
  $('.owl-carousel__tabfilter').owlCarousel({
    items:4,
    lazyLoad:true,
    loop:true,
    autoplay:false,
    autoplayTimeout:6000,
    autoplayHoverPause:false,
    nav:true,
    dots:true,
    margin:10,
    responsiveClass:true,
    responsive:{
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      },
      1200: {
        items: 4
      }
    }
  });
  
  // $('.slider-arrow-left').click(function(){
  //   owl.trigger('prev.owl.carousel', [300]);
  // });
  // $('.slider-arrow-right').click(function(){
  //   owl.trigger('next.owl.carousel', [300]);
  // });

  // ------------ IR HACIA LA PÁGINA - CART LIST
  $(document).on("click","#lk_cart",function(){window.location.href = "./cart-page";});
  // ------------ IR HACIA LA PÁGINA - CHECKOUT
  $(document).on("click","#lk_checkout",function(){window.location.href = "./checkout";});
  // ------------ AGREGAR UN PRODUCTO AL CARRITO
  $(document).on("click",".a__tocart",function(e){
    e.preventDefault();
    if(isNumeric(v_idgencoderand) == true || isNumeric(v_idgencoderand) == "true"){
      console.log('Existe una sesión iniciada');
    }else{
      console.log('NO existe una sesión iniciada');
      window.location.href = "./login-register";
    }
  });
});
