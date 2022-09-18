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
  var encrypt_v_idgencoderand = $("#u-s_regclient-sis").val(encryptValuesIpts($("#u-s_regclient-sis").val()));
  // ------------ DESENCRIPTACIÓN DE INPUTS
  var v_idgencoderand = decryptValuesIpts(encrypt_v_idgencoderand.val());
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

  // ------------ AGREGAR UN PRODUCTO AL CARRITO
  $(document).on("click",".a__tocart",function(e){
    e.preventDefault();
    if(isNumeric(v_idgencoderand) == true || isNumeric(v_idgencoderand) == "true"){
      let cart = {
        p_id: $(this).attr('dt-srwg_id'),
        p_idcli: v_idgencoderand,
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
              console.log('Agregado al carrito');
              Swal.fire({
                title: '',
                html: `<div class="alertSwal">
                        <div class="alertSwal__cTitle">
                          <h3>¡Agregado!</h3>
                        </div>
                        <div class="alertSwal__cText">
                          <p>El producto ha sido agregado al carrito.</strong></p>
                        </div>
                        <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
                      </div>`,
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
                allowEscapeKey:false,
                allowEnterKey:true,
                timer: 1000
              });
              $(document).on('click', '.SwalBtn1', function() {
                swal.clickConfirm();
              });
            }else if(e.r == "srwg_update"){
              console.log('El carrito se ha actualizado');
              Swal.fire({
                title: '',
                html: `<div class="alertSwal">
                        <div class="alertSwal__cTitle">
                          <h3>¡Actualizado!</h3>
                        </div>
                        <div class="alertSwal__cText">
                          <p>El producto ha sido actualizado ene el carrito.</strong></p>
                        </div>
                        <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
                      </div>`,
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
                allowEscapeKey:false,
                allowEnterKey:true,
                timer: 1000
              });
              $(document).on('click', '.SwalBtn1', function() {
                swal.clickConfirm();
              });
            }else{
              console.log('Lo sentimos hubo un error');
            }
          }else{

          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      });
    }else{
      console.log('NO existe una sesión iniciada');
      window.location.href = "./login-register";
    }
  });
});
