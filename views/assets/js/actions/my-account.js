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
  listAllOrdersUser();
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
  // ------------ LISTAR LAS ORDENES DEL CLIENTE
  function listAllOrdersUser(){
    $.ajax({
      url: "./controllers/prcss_cart-list-byIdTempCart.php",
      method: "POST",
      dataType: 'JSON',
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: { idcli : sess_idcli},
      beforeSend: function(){
        $("#c-xtbl_tmplistreguser").html(`
          <tr>
            <td colspan="6">
              <div class="l_anyitms">
                <div class="l_anyitms__cImg">
                  <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" version="1.1" viewBox="0 0 700 700"><g><path d="m350 56c-51.898-0.058594-102.21 17.887-142.36 50.773-40.148 32.883-67.652 78.676-77.82 129.57-10.164 50.895-2.3672 103.74 22.066 149.52 24.434 45.789 63.988 81.688 111.93 101.57 47.938 19.887 101.29 22.531 150.96 7.4883 49.672-15.047 92.586-46.852 121.43-89.996 28.848-43.145 41.836-94.957 36.754-146.61-5.0781-51.648-27.914-99.938-64.613-136.64-41.996-42-98.945-65.625-158.34-65.688m0-28c66.836 0 130.93 26.551 178.19 73.809 47.258 47.258 73.809 111.36 73.809 178.19s-26.551 130.93-73.809 178.19c-47.258 47.258-111.36 73.809-178.19 73.809s-130.93-26.551-178.19-73.809c-47.258-47.258-73.809-111.36-73.809-178.19 0.074219-66.812 26.648-130.87 73.891-178.11s111.3-73.816 178.11-73.891z"/><path d="m294 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m462 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m478.7 375.3c5.4648 5.4688 5.4648 14.332 0 19.801-5.4688 5.4688-14.332 5.4688-19.801 0-28.902-28.84-68.066-45.035-108.89-45.035s-79.992 16.195-108.89 45.035c-5.4688 5.4688-14.332 5.4688-19.801 0-5.4648-5.4688-5.4648-14.332 0-19.801 34.16-34.082 80.441-53.223 128.7-53.223s94.535 19.141 128.7 53.223z"/></g></svg>
                </div>
                <div class="l_anyitms__cTxt">
                  <p>No hay información en el carrito.</p>
                </div>
              </div>
            </td>
          </tr>
        `);
      },
      success : function(e){
        if(e != "" && e != "[]"){
          let tmp = "";
          // ------------ SUMAR LOS SUBTOTALES DE TODOS LOS PRODUCTOS
          let filtered = Object.entries(e);
          // let totalpay = e.reduce(function(sum, v){
          //   return sum + parseFloat(v.tmp_subtotal)
          // }, 0);
          let totalpay = 0;
          $.each(e, function(i,v){
            totalpay += parseFloat(v.tmp_subtotal);
          });
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
            let p_pathimg = "./admin/storage/app/public/product/"+v.p_photo;
            let p_name = v.p_name;
            let p_name_limit = (p_name.length >= 25) ? p_name.substring(25, 0) + "..." : p_name;
            tmp += `
              <tr id="prod_srw-${v.id}">
                <td class="product-thumbnail">
                  <a href="./product-details/${v.id_product}">
                    <img src="${p_pathimg}" class="img-fluid" alt="${p_name_limit}">
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
                    <div>
                      <span>${v.tmp_quantity}</span>
                    </div>
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
              </tr>
            `;
          });
          $("#c-xtbl_tmplistreguser").html(tmp);
        }else{
          $("#c-xtbl_tmplistreguser").html(`
            <tr>
              <td colspan="6">
                <div class="l_anyitms">
                  <div class="l_anyitms__cImg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" version="1.1" viewBox="0 0 700 700"><g><path d="m350 56c-51.898-0.058594-102.21 17.887-142.36 50.773-40.148 32.883-67.652 78.676-77.82 129.57-10.164 50.895-2.3672 103.74 22.066 149.52 24.434 45.789 63.988 81.688 111.93 101.57 47.938 19.887 101.29 22.531 150.96 7.4883 49.672-15.047 92.586-46.852 121.43-89.996 28.848-43.145 41.836-94.957 36.754-146.61-5.0781-51.648-27.914-99.938-64.613-136.64-41.996-42-98.945-65.625-158.34-65.688m0-28c66.836 0 130.93 26.551 178.19 73.809 47.258 47.258 73.809 111.36 73.809 178.19s-26.551 130.93-73.809 178.19c-47.258 47.258-111.36 73.809-178.19 73.809s-130.93-26.551-178.19-73.809c-47.258-47.258-73.809-111.36-73.809-178.19 0.074219-66.812 26.648-130.87 73.891-178.11s111.3-73.816 178.11-73.891z"/><path d="m294 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m462 224c0 15.465-12.535 28-28 28s-28-12.535-28-28 12.535-28 28-28 28 12.535 28 28"/><path d="m478.7 375.3c5.4648 5.4688 5.4648 14.332 0 19.801-5.4688 5.4688-14.332 5.4688-19.801 0-28.902-28.84-68.066-45.035-108.89-45.035s-79.992 16.195-108.89 45.035c-5.4688 5.4688-14.332 5.4688-19.801 0-5.4648-5.4688-5.4648-14.332 0-19.801 34.16-34.082 80.441-53.223 128.7-53.223s94.535 19.141 128.7 53.223z"/></g></svg>
                  </div>
                  <div class="l_anyitms__cTxt">
                    <p>No hay información en el carrito.</p>
                  </div>
                </div>
              </td>
            </tr>
          `);
        }
      },
      error : function(xhr, status){
        console.log('Disculpe, existió un problema');
      }
    });
  }
});