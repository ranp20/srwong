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
  listBranchLocations();
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
            tmpList += `<ul style='max-height: 335px;overflow-x: hidden;overflow-y: auto;'>`;
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
            var res = totalpay.toString().split(".");
            if(res.length == 1 || (res[1].length < 3)) {
              tpay_wzero = tpay_wzero.toFixed(2);
            }
            $("#c-totcart").html(`
              <div class="header-icon-style">
                <i class="icon-handbag icons"></i>
                <span class="count-style">${filtered.length}</span>
              </div>
              <div class="cart-text">
                <span class="digit">Mi Carrito</span>
                <span class="cart-digit-bold">S/. ${tpay_wzero}</span>
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
                <h4>Total : <span class="shop-total">S/. ${tpay_wzero}</span></h4>
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
  // ------------ CONVERTIR A FORMATO DE 12 HORAS
  function tConvert(time){
    time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

    if (time.length > 1){
      time = time.slice (1);
      time[5] = +time[0] < 12 ? 'am' : 'pm';
      time[0] = +time[0] % 12 || 12;
    }
    return time.join ('');
  }

  // ------------ LISTAR LOS LOCALES DE COMIDA
  function listBranchLocations(searchVal){
    $.ajax({
      url: "./controllers/prcss_list-branch-locations.php",
      method: "POST",
      dataType: 'JSON',
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: { searchList : searchVal},
      beforeSend: function(){
        $("#chcksel-list-result").html(`
          <div class="chcksel-list-result__cAnyItems">
            <div class="chcksel-list-result__cAnyItems--cImg">
              <img src="./views/assets/img/utilities/loader.gif" alt="Cargando...">
            </div>
          </div>
        `);
      },
      success : function(e){
        let tmpList = "";
        if(e != "" && e != "[]"){
          tmpList += `<div class="l-menu">`;
          $.each(e, function(i,v){
            let b_name = v.name;
            let b_nameupper = b_name[0].toUpperCase() + b_name.substring(1);
            let b_name_limit = (b_nameupper.length >= 20) ? b_nameupper.substring(20, 0) + "..." : b_nameupper;
            let b_address = v.address;
            let b_telephone = v.telephone;
            let b_telephone_format = b_telephone.replace(/\D+/g, '').replace(/(\d{3})(\d{3})(\d{3})/, '$1 $2 $3');
            let b_coverage = v.coverage;
            tmpList += `
              <div class="l-item" id="${v.id}">
                <input  tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" name="cx1chk_branchcrt-sess" id="chk-sbranch_${i}_crtclient-sis" value="${v.id}" readonly="readonly">
                <div class="l-item-title">
                  <h4>${b_name_limit}</h4>
                </div>
                <div class="l-item-address">
                  <h6>${b_address}</h6>
                </div>
                <!--<div class="l-item-distance">
                  <p>${b_coverage} km de distancia</p>
                </div>-->
                <div class="l-item-email">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m120.4 112c-9.1133 0-16.801 7.6875-16.801 16.801v302.4c0 9.1133 7.6875 16.801 16.801 16.801h459.2c9.1133 0 16.801-7.6875 16.801-16.801v-302.4c0-9.1133-7.6875-16.801-16.801-16.801zm17.324 22.398h424.55l-212.27 191.98-212.27-191.98zm-11.723 19.602 131.07 118.48-131.07 135.97zm448 0v254.45l-131.07-135.97zm-300.3 133.52 68.773 62.301h0.003906c4.2695 3.875 10.777 3.875 15.047 0l68.773-62.301 133.18 138.07h-418.95z"/></g></svg>
                  </span>
                  <span>Email: ${v.email}</span>
                </div>
                <div class="l-item-telephone">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g xmlns="http://www.w3.org/2000/svg"><path d="m524.37 97.562h-227.11v-0.035156c0-13.398-10.898-24.297-24.297-24.297h-64.883c-13.398 0-24.297 10.898-24.297 24.297v0.027344h-8.1406c-17.867 0-32.402 14.543-32.402 32.41v291.96c0 17.867 14.543 32.41 32.402 32.41h8.1406v24.363c0 4.4609 3.6172 8.082 8.082 8.082h48.66c4.4609 0 8.0742-3.6172 8.0742-8.082v-24.363h275.77c17.867 0 32.402-14.543 32.402-32.41v-291.96c0-17.871-14.543-32.402-32.402-32.402zm-324.44-0.035156c0-4.4883 3.6523-8.1406 8.1406-8.1406h64.883c4.4883 0 8.1406 3.6523 8.1406 8.1406v291.96c0 4.4883-3.6523 8.1406-8.1406 8.1406h-64.883c-4.4961 0-8.1406-3.6523-8.1406-8.1406zm-40.547 324.39v-291.96c0-8.9609 7.2891-16.258 16.25-16.258h8.1406v275.77c0 13.398 10.898 24.297 24.297 24.297h24.363v24.398h-56.801c-8.9609 0.007813-16.25-7.2812-16.25-16.25zm73.059 48.695h-32.504v-16.281h32.504zm308.18-48.695c0 8.9688-7.2891 16.258-16.25 16.258h-275.78v-24.398h24.363c13.398 0 24.297-10.906 24.297-24.297l-0.003906-275.77h227.11c8.9609 0 16.25 7.2969 16.25 16.258v291.95z"/><path d="m508.14 138.11h-178.43c-4.4609 0-8.082 3.6172-8.082 8.082v40.543c0 4.4609 3.6172 8.082 8.082 8.082h178.41c4.4609 0 8.082-3.6172 8.082-8.082v-40.543c0-4.4727-3.6094-8.082-8.0703-8.082zm-8.082 40.543h-162.26v-24.391h162.26z"/><path d="m362.16 219.21h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4648-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 219.21h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4648-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 292.2h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c0-4.4727-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.281h16.293z"/><path d="m435.16 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011719-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m362.16 365.19h-32.445c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.445c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c0-4.4609-3.6172-8.082-8.082-8.082zm-8.0703 32.438h-16.293v-16.293h16.293z"/><path d="m435.16 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6172 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011719-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/><path d="m508.14 292.2h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.438c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.438c-0.011718-4.4727-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.281h16.281z"/><path d="m508.14 365.19h-32.438c-4.4609 0-8.082 3.6172-8.082 8.082v32.445c0 4.4609 3.6094 8.082 8.082 8.082h32.438c4.4609 0 8.082-3.6172 8.082-8.082v-32.445c-0.011718-4.4609-3.6211-8.082-8.082-8.082zm-8.082 32.438h-16.281v-16.293h16.281z"/></g></svg>
                  </span>
                  <span>Telf: ${b_telephone_format}</span>
                </div>
                <div class="l-item-schedule">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="30px" version="1.1" viewBox="0 0 700 700"><g><path d="m621.52 73.309c0-22.656-18.414-41.152-41.152-41.152h-60.75v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305s-8.2305 3.6484-8.2305 8.2305v15.441h-144.92v-15.441c0-4.582-3.6484-8.2305-8.2305-8.2305-4.582 0-8.2305 3.6484-8.2305 8.2305v15.441h-60.75c-22.656 0-41.152 18.5-41.152 41.152l0.085937 437.05c0 22.656 18.496 41.152 41.152 41.152h460.73c22.656 0 41.152-18.496 41.152-41.152zm-41.152 461.75h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-19.77c6.8711 5.2617 15.359 8.3984 24.691 8.3984h460.73c9.332 0 17.816-3.2227 24.691-8.3984v19.77c0 13.66-11.117 24.691-24.691 24.691zm0-52.438h-460.73c-13.574 0-24.691-11.031-24.691-24.691v-287.21h510.02v287.21c0.085938 13.578-11.031 24.691-24.605 24.691zm-485.42-409.31c0-13.574 11.031-24.691 24.691-24.691h60.75v23.418c-2.7148 0.76172-5.3438 1.8672-7.8047 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0078-2.5469-7.7227-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.3438 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.68 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.4414-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h144.92v23.418c-2.7148 0.76172-5.2617 1.8672-7.7227 3.3086-8.9922 5.5156-14.594 15.527-14.594 26.047 0 10.605 5.6016 20.617 14.594 26.219 4.8359 2.9688 10.352 4.4961 15.953 4.4961 5.6016 0 11.113-1.5273 15.953-4.4961 8.9922-5.5156 14.594-15.527 14.594-26.133 0-10.52-5.6016-20.449-14.594-26.047-2.4609-1.5273-5.0898-2.6289-7.8047-3.3086l-0.003906-23.504h60.75c13.574 0 24.691 11.031 24.691 24.691v80.945h-510.02zm93.672 36.316c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4141 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003907 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.371c3.6484 2.6289 5.9375 6.8711 5.9375 11.285 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4961 2.2891-8.6562 5.9375-11.285v11.371c0.003906 4.582 3.6523 8.2305 8.2344 8.2305zm161.38 0c4.582 0 8.2305-3.6484 8.2305-8.2305v-11.453c3.6484 2.6289 5.9375 6.8711 5.9375 11.371 0 4.9219-2.6289 9.5859-6.7891 12.133-4.4961 2.7148-10.352 2.7148-14.762 0-4.1562-2.5469-6.7891-7.2109-6.7891-12.133 0-4.4141 2.2891-8.6562 5.8555-11.285v11.371c0.085938 4.5781 3.8203 8.2266 8.3164 8.2266z"/><path d="m235.11 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 215.86h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.578-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m235.11 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m371.21 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.113-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/><path d="m507.22 345.08h-42.34c-13.574 0-24.691 11.031-24.691 24.691v42.34c0 13.574 11.031 24.691 24.691 24.691h42.34c13.574 0 24.691-11.031 24.691-24.691v-42.34c0-13.574-11.027-24.691-24.691-24.691zm8.2305 67.031c0 4.582-3.6484 8.2305-8.2305 8.2305h-42.34c-4.582 0-8.2305-3.6484-8.2305-8.2305v-42.34c0-4.582 3.6484-8.2305 8.2305-8.2305h42.34c4.582 0 8.2305 3.6484 8.2305 8.2305z"/></g></svg>
                  </span>
                  <span>Horario: ${tConvert(v.schedule_open)} - ${tConvert(v.schedule_close)}</span>
                </div>
                <button type="submit" class="l-item-link">
                  <span>RECOGER AQUÍ</span>
                </button>
              </div>
            `;
          });
          tmpList += `</div>`;
          $("#chcksel-list-result").html(tmpList);
        }else{
          tmpList += `
            <div class="chcksel-list-result__cAnyItems">
              <div class="chcksel-list-result__cAnyItems--cImg">
                <div class="l_anyitms">
                  <div class="l_anyitms__cImg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" version="1.1" viewBox="0 0 700 700"><g><path d="m350 56c-51.898-0.058594-102.21 17.887-142.36 50.773-40.148 32.883-67.652 78.676-77.82 129.57-10.164 50.895-2.3672 103.74 22.066 149.52 24.434 45.789 63.988 81.688 111.93 101.57 47.938 19.887 101.29 22.531 150.96 7.4883 49.672-15.047 92.586-46.852 121.43-89.996 28.848-43.145 41.836-94.957 36.754-146.61-5.0781-51.648-27.914-99.938-64.613-136.64-41.996-42-98.945-65.625-158.34-65.688m0-28c66.836 0 130.93 26.551 178.19 73.809 47.258 47.258 73.809 111.36 73.809 178.19s-26.551 130.93-73.809 178.19c-47.258 47.258-111.36 73.809-178.19 73.809s-130.93-26.551-178.19-73.809c-47.258-47.258-73.809-111.36-73.809-178.19 0.074219-66.812 26.648-130.87 73.891-178.11s111.3-73.816 178.11-73.891z"/><path d="m294 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m462 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m478.7 375.3c5.4648 5.4688 5.4648 14.332 0 19.801-5.4688 5.4688-14.332 5.4688-19.801 0-28.902-28.84-68.066-45.035-108.89-45.035s-79.992 16.195-108.89 45.035c-5.4688 5.4688-14.332 5.4688-19.801 0-5.4648-5.4688-5.4648-14.332 0-19.801 34.16-34.082 80.441-53.223 128.7-53.223s94.535 19.141 128.7 53.223z"/></g></svg>
                  </div>
                  <div class="l_anyitms__cTxt">
                    <p>No se encontraron coincidencias.</p>
                  </div>
                </div>
              </div>
            </div>
          `;
          $("#chcksel-list-result").html(tmpList);
        }
      },
      error : function(xhr, status){
        console.log('Disculpe, existió un problema');
      }
    });
  }
  // ------------ LISTAR LOS LOCALES DE COMIDA AL MOMENTO DE ESCRIBIR
  $(document).on("keyup","#chck-searchlocation",function(e){
    var thival = e.target.value;
    if(thival != ""){
      listBranchLocations(thival);
    }else{
      listBranchLocations(thival);
    }
  });
  // ------------ LISTAR LOS LOCALES DE COMIDA EN EL SELECT DE UBICACIONES
  $.ajax({
    url: "./controllers/prcss_list-branch-locations.php",
    method: "POST",
    dataType: 'JSON',
    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
    success : function(e){
      let tmpList = "";
      if(e != "" && e != "[]"){
        tmpList += `<option value="">Seleccione una opción</option>`;
        $.each(e, function(i,v){
          let b_name = v.name;
          let b_nameupper = b_name[0].toUpperCase() + b_name.substring(1);
          tmpList += `<option value="${v.id}" required>${b_nameupper}</option>`;
        });
        $("#chck-location").html(tmpList);
      }else{
        $("#chck-location").html(`
          <option value="">Seleccione una opción</option>
          <option value="">No existen ubicaciones</option>
        `);
      }
    },
    error : function(xhr, status){
      console.log('Disculpe, existió un problema');
    }
  });
  // ------------ TABS PARA LA INFORMACIÓN DE FACTURACIÓN
  $(document).on("click","input[name=info_facture]",function(){
    var linkiptname = $(this).attr("id");
    var tmpChck = "";
    if(linkiptname == "info_fact1"){
      tmpChck += `
        <div class="wrapper wrapper-white">
          <div class="page-subtitle">
            <div class="mb-2">
              <label for="chck-t_delivery_name" class="form-label">NOMBRE</label>
              <input type="text" class="form-control" name="chck-t_delivery_name" id="chck-t_delivery_name" placeholder="" required>
            </div>
            <div class="mb-2">
              <label for="chck-t_delivery_dni" class="form-label">DNI</label>
              <input type="text" class="form-control" name="chck-t_delivery_dni" id="chck-t_delivery_dni" placeholder="" required>
            </div>
          </div>
        </div>
      `;
      $("#type_deliverysel").html(tmpChck);
    }else if(linkiptname == "info_fact2"){
      tmpChck += `
        <div class="wrapper wrapper-white">
          <div class="page-subtitle">
            <div class="mb-2">
              <label for="chck-t_delivery_ruc" class="form-label">RUC</label>
              <input type="text" class="form-control" name="chck-t_delivery_ruc" id="chck-t_delivery_ruc" placeholder="">
            </div>
            <div class="mb-2">
              <label for="chck-t_delivery_razonsocial" class="form-label">RAZÓN SOCIAL</label>
              <input type="text" class="form-control" name="chck-t_delivery_razonsocial" id="chck-t_delivery_razonsocial" placeholder="">
            </div>
          </div>
        </div>
      `;
      $("#type_deliverysel").html(tmpChck);
    }else{
      console.log('Se intentó vincular al enlace');
    }
  });
});