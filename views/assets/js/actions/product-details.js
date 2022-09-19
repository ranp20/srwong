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
	})
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
              listCartList();
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
    $("#c-listCartU").html("");
    if(isNumeric(sess_idcli) == true || isNumeric(sess_idcli) == "true"){
      $.ajax({
        url: "../controllers/prcss_cart-list-byIdClient.php",
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
              let p_name = v.p_name;
              let p_name_limit = (p_name.length >= 20) ? p_name.substring(20, 0) + "..." : p_name;
              tmpList += `
                <li class="single-shopping-cart">
                  <div class="shopping-cart-img">
                    <a href="./product-details/${v.id}"><img alt="" src="../views/assets/img/product/mostricrunh.jpg"></a>
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
                <a href="../cart-page" id="lk_cart">view cart</a>
                <!-- <a href="checkout" id="lk_checkout">checkout</a> -->
              </div>
            `;
            $("#c-listCartU").html(tmpList);
          }else{
            console.log('Lo sentimos, hubo un error al procesar la información');
          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      })
    }else{
      window.location.href = "./login-register";
    }
  }
});