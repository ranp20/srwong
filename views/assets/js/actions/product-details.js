// ------------ AGREGAR DOS DECIMALES 
function addTwoDecimals(n){
  output_final = "";
  if(n != "0" || n != 0){
    output_num = n.toString().split(".");
    if(output_num[1] == "undefined" || output_num[1] == null || output_num[1] == ""){
	  output_final = n + ".00";
    }else	if(output_num[1] != "undefined" && output_num[1].length < 2){
	  output_final = output_num[0] + "." + output_num[1] + "0";
    }else{
	  output_final = output_num[0] + "." + output_num[1];
    }
  }else{
    output_final = n;
  }
  return output_final;
}
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
	// ------------ INCREMENT AND DECREMENT PRODUCT
	$(".qtybutton").on("click", function(){
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if($button.text() === "+"){
		  var newVal = parseFloat(oldValue) + 1;
		}else{
		  // Don't allow decrementing below zero
		  if(oldValue > 0){
		    var newVal = parseFloat(oldValue) - 1;
		  }else{
		    newVal = 1;
		  }
		}
		$button.parent().find("input").val(newVal);
	});
	// ------------ Best selling active
	$('.related-product-active').owlCarousel({
		loop: true,
		nav: true,
		autoplay: false,
		autoplayTimeout: 5000,
		navText: ['<i class="ion-ios-arrow-back"></i>', '<i class="ion-ios-arrow-forward"></i>'],
		item: 4,
		margin: 30,
		responsive: {
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
			  items: 3
			},
			1100: {
			  items: 3
			},
			1200: {
			  items: 4
			}
		}
	});
	/*
  // ------------ PRODUCT ZOOM
	$(".zoompro").elevateZoom({
		gallery: "gallery",
		galleryActiveClass: "active",
		zoomWindowWidth: 300,
		zoomWindowHeight: 100,
		scrollZoom: false,
		zoomType: "inner",
		cursor: "crosshair"
	});
  */
  // ------------ Best selling active
  $('.product-dec-slider').slick({
    dots: true,
    infinite: false,
    prevArrow: "<button type='button' class='slick-prev'>Previous</button>",
    nextArrow: "<button type='button' class='slick-next'>Next</button>",
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          arrows: true,
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
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
        url: "../controllers/prcss_cart-list-temp.php",
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
      window.location.href = "../login-register";
    }
  });
	// ------------ LISTAR EL CARRITO DE COMPRAS
  function listCartList(){
    if(isNumeric(sess_idcli) == true || isNumeric(sess_idcli) == "true"){
      $("#c-listCartU").html("");
      $.ajax({
        url: "../controllers/prcss_cart-list-byIdTempCart.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: { idcli : sess_idcli},
        success : function(e){
          if(e != "" && e != "[]"){
            let tmpList = "";
            tmpList += `<ul>`;
            // ------------ SUMAR LOS SUBTOTALES DE TODOS LOS PRODUCTOS
            let filtered = Object.entries(e);
            // let totalpay = filtered.reduce(function(sum, v){
            //   return sum + parseFloat(v.tmp_subtotal)
            // }, 0);
            let totalpay = 0;
            $.each(e, function(i,v){
              totalpay += parseFloat(v.tmp_subtotal);
            });
            // ------------ AGREGAR DOS CEROS AL FINAL DE CADA NÚMERO SIN UNO O DOS CEROS
            var tpay_wzero = Number(totalpay);
            var total_pay = addTwoDecimals(tpay_wzero)
            var total_pay_format = parseFloat(total_pay).toFixed(2);
            $("#c-totcart").html(`
              <div class="header-icon-style">
                <i class="icon-handbag icons"></i>
                <span class="count-style">${filtered.length}</span>
              </div>
              <div class="cart-text">
                <span class="digit">Mi Carrito</span>
                <span class="cart-digit-bold">S/. ${total_pay_format}</span>
              </div>
            `);
            $.each(e, function(i,v){
              let p_pathimg = "./admin/storage/app/public/product/"+v.p_photo;
              let p_name = v.p_name;
              let p_name_limit = (p_name.length >= 20) ? p_name.substring(20, 0) + "..." : p_name;
              tmpList += `
                <li class="single-shopping-cart">
                  <div class="shopping-cart-img">
                    <a href="../product-details/${v.id_product}">
                      <img alt="" src="${p_pathimg}" alt="${p_name_limit}">
                    </a>
                  </div>
                  <div class="shopping-cart-title">
                    <h4><a href="../product-details/${v.id_product}">${p_name_limit} </a></h4>
                    <h6>Cantidad: ${v.tmp_quantity}</h6>
                    <span>S/. ${v.tmp_subtotal}</span>
                  </div>
                </li>
              `;
            });
            tmpList += `</ul>`;
            tmpList += `
              <div class="shopping-cart-total">
                <h4>Total : <span class="shop-total">S/. ${total_pay_format}</span></h4>
              </div>
              <div class="shopping-cart-btn">
                <a href="../cart-page" id="lk_cart">Ver Carrito</a>
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
                <a href='../cart-page' id='logg-lk_cart-s'>Carrito</a>
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
          <a href='../cart-page' id='logg-lk_cart-s'>Carrito</a>
        </div>
      `);
    }
  }
  // ------------ IR HACIA LA PÁGINA - CART LIST (VALIDAR LA SESIÓN)
  $(document).on("click","#logg-lk_cart-s",function(){window.location.href = "../";});

  // ------------ ZOOM INTO PRODUCT
  (function(ventana){
    function define_library(){
      // Cree el objeto de biblioteca y todas sus propiedades y métodos. 
      var vanillaZoom = {};
      vanillaZoom.init = function(galleryId){
        // La lógica de nuestra biblioteca va aquí.
        var container = document.querySelector(galleryId);

        if(!container){
          console.error('Por favor, especifique la clase correcta de su galería.');
          return;
        }

        var firstSmallImage = container.querySelector('.small-preview');
        var zoomedImage = firstSmallImage.nextElementSibling;

        if(!zoomedImage){
          console.error('Agregue un elemento .zoomed-image a su galería.');
          return;
        }

        if(!firstSmallImage){
          console.error('Agregue imágenes con la clase .small-preview a su galería.');
          return;
        }else{
          // Establece la fuente de la imagen ampliada. 
          zoomedImage.style.backgroundImage = 'url(' + firstSmallImage.src + ')';
        }

        container.addEventListener("click", function(evento){
          var elem = event.target;

          if(elem.classList.contains("small-preview")){
            zoomedImage.style.backgroundImage = 'url(' + elem.src + ')';
          }
        });

        zoomedImage.addEventListener('mouseenter', function(e){
          this.classList.add('active');
          this.style.backgroundSize = "250%" ;
        }, false);

        zoomedImage.addEventListener('mousemove', function(e){

          // getBoundingClientReact nos brinda información variada sobre la posición del elemento. 
          var dimentions = this.getBoundingClientRect ();

          // Calcular la posición del cursor dentro del elemento (en píxeles). 
          var x = e.clientX - dimentions.left;
          var y = e.clientY - dimentions.top;

          // Calcular la posición del cursor como un porcentaje del tamaño total del elemento. 
          var xpercent = Math.round( 100 / (dimentions.width / x));
          var ypercent = Math.round( 100 / (dimentions.height / y));

          // Actualiza la posición de fondo de la imagen. 
          this.style.backgroundPosition = xpercent + '%' + ypercent + '%' ;

        }, false);

        zoomedImage.addEventListener('mouseleave', function(e){
          this.classList.remove('active');
          this.style.backgroundSize = "cover"; 
          this.style.backgroundPosition = "center";
        }, false);
      }
      return vanillaZoom;
    }

    // Agregue el objeto vanillaZoom al ámbito global si aún no está definido. 
    if( typeof (vanillaZoom) === 'undefined'){
      window.vanillaZoom = define_library();
    }else{
      console.log("Biblioteca ya definida");
    }
  })(this);
  vanillaZoom.init('#c-pdetail__imgzoom');
});