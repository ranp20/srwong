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
    messageTimeSchedule();
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
                    <a href="./product-details/${v.id_product}">
                      <img alt="" src="${p_pathimg}" alt="${p_name_limit}">
                    </a>
                  </div>
                  <div class="shopping-cart-title">
                    <h4><a href="./product-details/${v.id_product}">${p_name_limit} </a></h4>
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
                <a href="cart-page" id="lk_cart">Ver Carrito</a>
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
    $(document).on("click","#logg-lk_cart-s",function(){window.location.href = "./";});
    // ------------ VALIDAR EL HORARIO SEMANAL
    function messageTimeSchedule(){
        $.ajax({
            url: "./controllers/prcss_buss-settings-getTimeSchedule.php",
            method: "POST",
            dataType: 'JSON',
            contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
            data: { idcli : sess_idcli},
            success : function(e){
              if(e != "" && e != "[]"){
                  //console.log(e);
                let tmpMessageSchedule = "";
                tmpMessageSchedule = ``;
              }else{
                console.log('Disculpe, existió un problema');
              }
            },
            error : function(xhr, status){
              console.log('Disculpe, existió un problema');
            }
        });
        
        var now = new Date();
        var millisegundos = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 0, 0, 0) - now;
        if (millisegundos < 0) {
             millisegundos += 86400000; // it's after 10am, try 10am tomorrow.
        }
        setTimeout(function(){
            alert("It's 10am!");
        }, millisegundos);
    }
});