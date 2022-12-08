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
  // PRIMER MÉTODO
  /*
  let ciphertext = CryptoJS.AES.encrypt(valueipt, 'CML_KEYSYSTEM').toString();
  return ciphertext;
  */
  // SEGUNDO MÉTODO
  let key = CryptoJS.enc.Hex.parse("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
  let iv = CryptoJS.enc.Hex.parse("101112131415161718191a1b1c1d1e1f");
  let ciphertext = CryptoJS.AES.encrypt(valueipt, key, { iv: iv, padding: CryptoJS.pad.ZeroPadding });
  return ciphertext;
}
// ------------ DESENCRIPTAR DATOS DE INPUTS
function decryptValuesIpts(valueipt){
  // PRIMER MÉTODO
  /*
  let bytes  = CryptoJS.AES.decrypt(valueipt, 'CML_KEYSYSTEM');
  let originalText = bytes.toString(CryptoJS.enc.Utf8);
  return originalText;
  */
  // SEGUNDO MÉTODO
  let key = CryptoJS.enc.Hex.parse("bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
  let iv = CryptoJS.enc.Hex.parse("101112131415161718191a1b1c1d1e1f");
  let bytes  = CryptoJS.AES.decrypt(valueipt, key, { iv: iv });
  let originalText = bytes.toString(CryptoJS.enc.Utf8);
  return originalText;
}
// ------------ COMPROBAR SI ES NUMÉRICO
function isNumeric(variable){return !isNaN(parseInt(variable));}
$(() => {
	// ------------ ENCRIPTACIÓN DE INPUTS
  var encrypt_sess_idcli = $("#u-s_regclient-sis").val(encryptValuesIpts($("#u-s_regclient-sis").val()));
  var encrypt_sess_ordermin = $("#cx1chk_crt-ord-min-sess").val(encryptValuesIpts($("#cx1chk_crt-ord-min-sess").val()));
  // ------------ DESENCRIPTACIÓN DE INPUTS
  var sess_idcli = decryptValuesIpts(encrypt_sess_idcli.val());
  var sess_ordermin = decryptValuesIpts(encrypt_sess_ordermin.val());
	// ------------ LISTAR FUNCIONES
  listCartList(); // LISTAR LOS PRODUCTOS EN EL CARRITO DE DICHO CLIENTE
  listTempCartList(); // LISTAR LOS PRODUCTOS EN LA TABLA DE LISTADO DE PRODUCTOS DE TEMP_CART
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
            $("#c-xtt_tochck").html("");
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
      $("#c-xtt_tochck").html("");
    }
  }
  // ------------ LISTAR LOS PRODUCTOS AGREGADOS AL CARRITO
  function listTempCartList(){  
    $.ajax({
      url: "./controllers/prcss_cart-list-byIdTempCart.php",
      method: "POST",
      dataType: 'JSON',
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: { idcli : sess_idcli},
      beforeSend: function(){
        $("#c-xtbl_cartcli").html(`
          <tr>
            <td colspan="6">
              <div class="l_anyitms">
                <div class="l_anyitms__cImg">
                  <img src="./views/assets/img/utilities/loader.gif" alt="" class="img-fluid" width="100" height="100">
                </div>
                <div class="l_anyitms__cTxt">
                  <p>Cargando...</p>
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
          var tpay_wzero = Number(totalpay);
          var total_pay = addTwoDecimals(tpay_wzero);
          var total_pay_format = parseFloat(total_pay).toFixed(2);

          var total_pay_Float = parseFloat(total_pay);
          var order_min_Float = parseFloat(sess_ordermin);
          var order_min_AddTwoDecimals = addTwoDecimals(sess_ordermin);
          var order_min_FloatFixed2 = parseFloat(order_min_AddTwoDecimals).toFixed(2);

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
          // ---------- ENVIAR EL TOTAL ENCRIPTADO
          // let tmptotal_encp = encryptValuesIpts(total_pay_format);
          let tmptotal_encp = total_pay_format;
          let tmpl_total = "";

          if(total_pay_Float < order_min_Float){
            tmpl_total += `
            <div id="fr-fm_066chkcrtpg">
              <input tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" name="cx1chk_crt-sess" id="chk-s_crtclient-sis" value="${tmptotal_encp}" readonly="readonly">
              <h5 class="c_title-total">
                <span class="row_cll">Subtotal </span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>${total_pay_format}</span>
                </span>
              </h5>
              <h5 class="c_title-total">
                <span class="row_cll">Delivery </span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>0.00</span>
                </span>
              </h5>
              <h4 class="cl-wrap_total-title">
                <span class="row_cll">Total a Pagar</span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>${total_pay_format}</span>
                </span>
              </h4>
              <div class='btn_link d-flex align-items-center justify-content-between text-center'>
                  <span class="c-cart_count-small">
                      <small>${filtered.length}</small>
                  </span>
                  <span class="text-center ml-auto mr-auto">Ir a pagar</span>
                  <span class="c-cart_listsubtotal-cart">
                      <span>S/. ${total_pay_format}</span>
                  </span>
              </div>
            </div>
            `;
            $(document).on("click", "#fr-fm_066chkcrtpg div.btn_link", function(e){
              Swal.fire({
                title: '',
                html: `<div class="alertSwal">
                        <div class="alertSwal__cTitle">
                          <h3>¡Monto mínimo!</h3>
                        </div>
                        <div class="alertSwal__cText">
                          <p>El monto del total a pagar debe ser mayor a S/. ${order_min_FloatFixed2}.</p>
                        </div>
                        <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
                      </div>`,
                icon: 'error',
                showCancelButton: false,
                showConfirmButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false,
                allowEscapeKey:false,
                allowEnterKey:true
              });
              $(document).on('click', '.SwalBtn1', function() {
                swal.clickConfirm();
              });
            });
          }else{
            tmpl_total += `
            <form action="./checkout" method="POST" id="fr-fm_04chkcrtpg">
              <input tabindex="-1" placeholder="" type="hidden" width="0" height="0" autocomplete="off" spellcheck="false" f-hidden="aria-hidden" class="non-visvalipt h-alternative-shwnon s-fkeynone-step" name="cx1chk_crt-sess" id="chk-s_crtclient-sis" value="${tmptotal_encp}" readonly="readonly">
              <h5 class="c_title-total">
                <span class="row_cll">Subtotal </span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>${total_pay_format}</span>
                </span>
              </h5>
              <h5 class="c_title-total">
                <span class="row_cll">Delivery </span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>0.00</span>
                </span>
              </h5>
              <h4 class="cl-wrap_total-title">
                <span class="row_cll">Total a Pagar</span>
                <span class="row_cll">
                  <span>S/. </span>
                  <span>${total_pay_format}</span>
                </span>
              </h4>
              <button type="submit" class='btn_link d-flex align-items-center justify-content-between text-center'>
                  <span class="c-cart_count-small">
                      <small>${filtered.length}</small>
                  </span>
                  <span class="text-center ml-auto mr-auto">Ir a pagar</span>
                  <span class="c-cart_listsubtotal-cart">
                      <span>S/. ${total_pay_format}</span>
                  </span>
              </button>
            </form>
            `;
          }

          $("#c-xtt_tochck").html(tmpl_total);
          
          if(Object.keys(e).length === 0){
            tmpl_total = '';
            $("#c-xtt_tochck").html(tmpl_total);
          }
          
        }else{
          $("#c-xtbl_cartcli").html(`
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
  // ------------ ELIMINAR LOS PRODUCTOS DEL CARRITO
  $(document).on("click",".product-remove",function(e){
    e.preventDefault();
    let tmp_tr = $(this);
    let idtmp_item = $(this).parent().attr("id");
    let idtmp_id = idtmp_item.split("prod_srw-");
    $.ajax({
      url: "./controllers/prcss_delete-byIdTempCart.php",
      method: "POST",
      dataType: 'JSON',
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: { idtmp : idtmp_id[1]},
      success : function(e){
        if(e != "" && e != "[]"){
          if(e == "true" || e == true){
            tmp_tr.parent().remove();
            listCartList();
            listTempCartList();
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
  });
  // ------------ INCREMENT AND DECREMENT PRODUCT
  $(document).on("click",".qtybutton",function(){
    var $button = $(this);
    var oldValue = $button.parent().find("input").val();
    let trparent = $button.parent().parent().parent().attr("id");
    let idtmp_id_2 = trparent.split("prod_srw-");
    if($button.text() === "+"){
      var newVal = parseFloat(oldValue) + 1;
      $.ajax({
        url: "./controllers/prcss_change-byIdTempCart.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: { idtmp : idtmp_id_2[1], btnchg: "+"},
        success : function(e){          
          if(e != "" && e != "[]"){
            if(e == "true" || e == true){
              listCartList();
              listTempCartList();
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
      if(oldValue > 1){
        var newVal = parseFloat(oldValue) - 1;
        $.ajax({
          url: "./controllers/prcss_change-byIdTempCart.php",
          method: "POST",
          dataType: 'JSON',
          contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
          data: { idtmp : idtmp_id_2[1], btnchg: "-"},
          success : function(e){          
            if(e != "" && e != "[]"){
              if(e == "true" || e == true){
                listCartList();
                listTempCartList();
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
        newVal = 1;
      }
    }
    $button.parent().find("input").val(newVal);
  });
  // ------------ BORRAR EL LISTADO DEL CARRITO DE COMPRAS
  $(document).on("click","#cart-clear",function(e){
    e.preventDefault();
    let childobj = [];
    $.each($("#c-xtbl_cartcli tr"), function(i,v){
      let trchildren = $(this).attr("id");
      let idtmp_idchildren = trchildren.split("prod_srw-");
      childobj.push(idtmp_idchildren[1]);
    });
    Swal.fire({
      title: '¿Estás seguro?',
      text: "Se eliminaran tus datos del carrito",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#e02c2b',
      confirmButtonText: 'Si, eliminarlos',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if(result.isConfirmed){    
        $.ajax({
          url: "./controllers/prcss_delete-allTempCart-byIdClient.php",
          method: "POST",
          dataType: 'JSON',
          contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
          data: { idcli : sess_idcli, idprod : childobj},
          success : function(e){
            if(e != "" && e != "[]"){
              if(e.r == "true" || e.r == true){
                Swal.fire('Éxito', 'Se eliminó el listado', 'success');
                listCartList();
                listTempCartList();
              }else{
                console.log("Error. Lo sentimos, hubo un error al procesar la información.");
              }
            }else{
              console.log("Error. Lo sentimos, hubo un error al procesar la información.");
            }
          },
          error : function(xhr, status){
            console.log('Disculpe, existió un problema');
          }
        });
      }else if(result.isDenied){
        listCartList();
        listTempCartList();
      }
    })
  });
  // ------------ IR HACIA LA PÁGINA - CART LIST (VALIDAR LA SESIÓN)
  $(document).on("click","#logg-lk_cart-s",function(){window.location.href = "./";});
});