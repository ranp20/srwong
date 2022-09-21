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
  // ------------ LISTAR EL CARRITO DE COMPRAS
  function listCartList(){
    if(isNumeric(sess_idcli) == true || isNumeric(sess_idcli) == "true"){
      $("#c-listCartU").html("");
      $.ajax({
        url: "./controllers/prcss_cart-list-byIdClient.php",
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
                    <a href="./product-details/${v.id}"><img alt="" src="./views/assets/img/product/mostricrunh.jpg"></a>
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
            console.log('Lo sentimos, hubo un error al procesar la información');
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
    }
  }
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
  // ------------ LISTAR LOS PRODUCTOS AGREGADOS AL CARRITO
  $.ajax({
    url: "./controllers/prcss_cart-list-byIdTempCart.php",
    method: "POST",
    dataType: 'JSON',
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    data: { idcli : sess_idcli},
    success : function(e){
      if(e != "" && e != "[]"){
        let tmp = "";
        // ------------ SUMAR LOS SUBTOTALES DE TODOS LOS PRODUCTOS
        let totalpay = e.reduce(function(sum, v){
          return sum + parseFloat(v.tmp_subtotal)
        }, 0);
        // ------------ AGREGAR DOS CEROS AL FINAL DE CADA NÚMERO SIN UNO O DOS CEROS
        var tpay_wzero = Number(totalpay); // SUBTOTAL DEL PRODUCTO
        var r1 = totalpay.toString().split(".");
        if(r1.length == 1 || (r1[1].length < 3)){
          tpay_wzero = tpay_wzero.toFixed(2);
        }
        $.each(e, function(i,v){
          var p_price = Number(v.tmp_price); // PRECIO DEL PRODUCTO
          var r2 = p_price.toString().split(".");
          if(r2.length == 1 || (r2[1].length < 3)){
            p_price = p_price.toFixed(2);
          }
          let p_name = v.p_name;
          let p_name_limit = (p_name.length >= 25) ? p_name.substring(25, 0) + "..." : p_name;
          tmp += `
            <tr>
              <td class="product-thumbnail">
                <a href="javascript:void(0);">
                  <img src="./views/assets/img/product/mostricrunh.jpg" class="img-fluid" alt="">
                </a>
              </td>
              <td class="product-name">
                <div>
                  <a href="./product-details/${v.id_product}" title="${p_name_limit}">${p_name_limit} </a>
                  <span class="amount">S/. ${p_price}</span>
                </div>
              </td>
              <td class="product-quantity">
                <div class="cart-plus-minus">
                  <div class="dec qtybutton">-</div>
                  <input class="cart-plus-minus-box" type="text" name="qtybutton" value="${v.tmp_quantity}">
                  <div class="inc qtybutton">+</div>
                </div>
              </td>
              <td class="product-subtotal">
                <div>
                  <span>
                    <span>S/. </span>
                    <span id="totprod_amount">${v.tmp_subtotal}</span>
                  </span>
                </div>
              </td>
              <td class="product-remove">
                <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
              </td>
            </tr>
          `;
        });
        $("#c-xtbl_cartcli").html(tmp);      
        let tmpl_total = "";
        tmpl_total += `
          <h5 class="c_title-total">
            <span class="row_cll">Total productos </span>
            <span class="row_cll">
              <span>S/. </span>
              <span>${tpay_wzero}</span>
            </span>
          </h5>
          <h4 class="cl-wrap_total-title">
            <span class="row_cll">Total Final</span>
            <span class="row_cll">
              <span>S/. </span>
              <span>${tpay_wzero}</span>
            </span>
          </h4>
          <a href="./checkout">Proceed to Checkout</a>
        `;
        $("#c-xtt_tochck").html(tmpl_total);
        

      }else{
        console.log('Lo sentimos, hubo un error al procesar la información');
      }
    },
    error : function(xhr, status){
      console.log('Disculpe, existió un problema');
    }
  });
  // ------------ IR HACIA LA PÁGINA - CART LIST (VALIDAR LA SESIÓN)
  $(document).on("click","#logg-lk_cart-s",function(){window.location.href = "./";});
});