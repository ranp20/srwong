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
  $(document).on("keypress keyup","#prf_usval-ndoc",function(v){
    let thisval = v.target.value;
    // maxlengthchar = 8;
    if(thisval.length > 8){
      $(this).val(thisval.replace(/\D+/g, '').replace(/(\d{7})/, '$1').slice(0, 8));
    }
  });
  // ------------ LISTAR LOS LOCALES DE COMIDA EN EL SELECT DE UBICACIONES
  $(document).on("change","#prof_usval-t-doc",function(e){
    let thisid = e.target.value;
    if(thisid == 1){
      $("#prf_usval-ndoc").val('');
      $(document).on("keypress keyup","#prf_usval-ndoc",function(v){
        let thisval = v.target.value;
        // maxlengthchar = 8;
        if(thisval.length > 8){
          $(this).val(thisval.replace(/\D+/g, '').replace(/(\d{7})/, '$1').slice(0, 8));
        }
      });
    }else if(thisid == 2){
      $("#prf_usval-ndoc").val('');
      $(document).on("keypress keyup","#prf_usval-ndoc",function(f){
        let thisval2 = f.target.value;
        // maxlengthchar = 12;
        if(thisval2.length > 12){
          $(this).val(thisval2.replace(/\D+/g, '').replace(/(\d{12})/, '$1').slice(0, 12));
        }
      });
    }else if(thisid == 3){
      $("#prf_usval-ndoc").val('');
      $(document).on("keypress keyup","#prf_usval-ndoc",function(g){
        let thisval = g.target.value;
        // maxlengthchar = 13;
        if(thisval3.length > 13){
          $(this).val(thisval3.replace(/\D+/g, '').replace(/(\d{13})/, '$1').slice(0, 13));
        }
      });
    }else{
      console.log('Error. Lo sentimos hubo un error al seleccionar');
    }
  });
  // ------------ GUARDAR/ACTUALIZAR LOS DATOS DEL CLIENTE
  $(document).on("submit","#clx-frm_usval-info",function(e){
    e.preventDefault();
    var formdata = new FormData();
    formdata.append("prf_usval-f-name", $("#prf_usval-f-name").val());
    formdata.append("prf_usval-l-name", $("#prf_usval-l-name").val());
    formdata.append("prf_usval-telf", $("#prf_usval-telf").val());
    formdata.append("prof_usval-t-doc", $("#prof_usval-t-doc").val());
    formdata.append("prf_usval-ndoc", $("#prf_usval-ndoc").val());
    formdata.append("prf_usval-idcli", sess_idcli);
    $.ajax({
      url: './controllers/prcss_update-personal-info-user.php',
      method: 'POST',
      data: formdata,
      datatype: "JSON",
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      cache: false,
      contentType: false,
      processData: false,
      success: function(e){
        if(e != ""){
          let r = JSON.parse(e);
          if(r.r == "true"){
            Swal.fire({
              title: 'Actualizado!',
              html: `<span class='font-w-300'>Se ha actualizado correctamente.</span>`,
              icon: 'success',
              confirmButtonText: 'Aceptar'
            });
          }else if(r.r == "err_upd"){
            Swal.fire({
              title: 'Atención!',
              html: `<span class='font-w-300'>Hubo un error y/o los datos son los mismos.</span>`,
              icon: 'warning',
              confirmButtonText: 'Aceptar'
            });
          }else{
            Swal.fire({
              title: 'Error!',
              html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar la información.</span>`,
              icon: 'error',
              confirmButtonText: 'Aceptar'
            });
          }
        }else{
          Swal.fire({
            title: 'Error!',
            html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar la información.</span>`,
            icon: 'error',
            confirmButtonText: 'Aceptar'
          });
        }
      }
    });
  });
});