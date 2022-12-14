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
    listLastestGenerateCode();
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
    // ------------ LISTAR EL ÚLTIMO CÓDIGO DEL LIBRO DE RECLAMACIONES
    function listLastestGenerateCode(){
      $.ajax({
        url: "./controllers/prcss_list-gen-ultimate.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        success : function(e){
          if(e != "" && e != "[]"){
            let tmpList = "";
            $.each(e, function(i,v){
              tmpList += `${v.codegen}`;
            });
            $("#cod_gencomplbook").html(tmpList);
          }else{
            console.log('Lo sentimos, ocurrió un error al procesar la información');
          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      });
    }
    // ------------ VALIDAR EL DNI
    $(document).on("keyup keypress","#cmpbk-book_dni",function(e){
        let thisval = e.target.value;
        if(thisval.length > 8){
          $(this).val(thisval.replace(/\D+/g, '').replace(/(\d{7})/, '$1').slice(0, 8));
        }
    });
    // ------------ VALIDAR EL TELÉFONO
    $(document).on("keyup keypress","#cmpbk-book_telephone",function(e){
        let thisval = e.target.value;
        if(thisval.length > 9){
          $(this).val(thisval.replace(/\D+/g, '').replace(/(\d{7})/, '$1').slice(0, 9));
        }
    });
    // ------------ VALIDAR CAMPO DE MONTO DE RECLAMACIÓN
    $(document).on("keyup keypress","#cmpbk-book_amount",function(e){
        let val = e.target.value;
        this.value = $.trim(this.value);
        let val_formatNumber = val.toString().replace(/[^\d.]/g, "").replace(/^(\d*\.)(.*)\.(.*)$/, '$1$2$3').replace(/\.(\d{2})\d+/, '.$1').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $(this).val(val_formatNumber);
        let tpaychckbtn = "";
        if(val_formatNumber != "" && val_formatNumber != " " && val_formatNumber != "." && val_formatNumber != "0" && val_formatNumber != "0.0" && val_formatNumber != ".00" && val_formatNumber != "0." && val_formatNumber != "0.00" && val_formatNumber != "00.00" && val_formatNumber != "0,00"){    
          if(Number(val_formatNumber) != 0 && Number(val_formatNumber) != 0 && parseFloat(val_formatNumber) != 0){
            tpaychckbtn = `
            <div class="button">
              <button type="submit" title="ENVIAR">
                <span>ENVIAR</span>
              </button>
            </div>`;
          }else{
            tpaychckbtn = "";
          }
        }else{
          tpaychckbtn = "";
        }
        $("#tv-01cfbvalcmpbookfrm").html(tpaychckbtn);
    });
    // ------------ VALIDAR SELECT DE SUCURSALES
    $(document).on("change", "#cmpbk-book_seldistric", function(){
      var idSel = $(this).val();
      var txtSel = $(this).find('option:selected').text();
      $.ajax({
        url: "./controllers/prcss_branch-list-byIdBranch.php",
        method: "POST",
        dataType: 'JSON',
        contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
        data: { idbranch : idSel},
        success : function(e){
          if(e != "" && e != "[]"){
            let tmpList = "";
            $.each(e, function(i,v){
              tmpList += `<p>Fecha: ${v.fecha}</p>`;
              tmpList += `<p>Razón Social: ${v.razon_social}</p>`;
              tmpList += `<p>RUC: ${v.ruc}</p>`;
              tmpList += `<p>Dirección Fiscal: ${v.address}</p>`;
            });
            $("#data-company").html(tmpList);
          }else{
            console.log('Lo sentimos, ocurrió un error al procesar la información');
          }
        },
        error : function(xhr, status){
          console.log('Disculpe, existió un problema');
        }
      });
    });
    // ------------ ENVIAR AL CORREO DESDE EL LIBRO DE RECLAMACIONES
    $(document).on("submit","#sr-frm_complaints-book",function(e){
        e.preventDefault();
        var form = $(this).serializeArray();
        
        $.ajax({
          /*
          url: "./controllers/prcss_recover-password.php",
          method: "POST",
          dataType: 'JSON',
          contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
          data: { usr_email : usr_emailses},
          */
          url: "./controllers/prcss_complaints-book.php",
          type: "POST",
          dataType: 'JSON',
          data: form,
          beforeSend: function(){
            console.log("Cargando...");
          },
          success : function(e){

            if(e != "" && e != "[]"){
                if(e.r == "true"){
                    $('#sr-frm_complaints-book')[0].reset();
                    
                    var tmpMessageAlert = `
                        <div class="login-form-container p-5">
                          <div class="login-register-form">
                            <div>
                                <div class="alert alert-info" role="alert" style="font-family: sans-serif !important;font-weight: 500 !important;font-size: 14px !important;">
                                    Se ha enviado <a href="http://mail.google.com/" class="alert-link" target="_blank">un correo</a> a la dirección establecida. <br> Sino lo recibe en unos momentos, por favor uno pruebe a <a href="./complaints-book" class="alert-link">enviar nuevamente.</a>
                                </div>
                            </div>
                          </div>
                        </div>
                    `;
                    
                    $("#c_complaints-book").html(tmpMessageAlert);
                    
                    Swal.fire({
        		        title: '',
        		        html: `<div class="alertSwal">
        			            <div class="alertSwal__cTitle">
        			              <h3>¡Éxito!</h3>
        			            </div>
        			            <div class="alertSwal__cText">
        			              <p>Se envió a su bandeja de correo electrónico.</strong></p>
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
        			    //timer: 1000
        		    });
        		    $(document).on('click', '.SwalBtn1', function() {
        			    swal.clickConfirm();
        			});
                }else{
                    Swal.fire({
        		        title: '',
        		        html: `<div class="alertSwal">
        			            <div class="alertSwal__cTitle">
        			              <h3>¡Error!</h3>
        			            </div>
        			            <div class="alertSwal__cText">
        			              <p>Lo sentimos, hubo un error al enviar el correo.</strong></p>
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
        			    allowEnterKey:true,
        			    //timer: 1000
        		    });
        		    $(document).on('click', '.SwalBtn1', function() {
        			    swal.clickConfirm();
        			});
                }
            }else{
                Swal.fire({
    		        title: '',
    		        html: `<div class="alertSwal">
    			            <div class="alertSwal__cTitle">
    			              <h3>¡Error!</h3>
    			            </div>
    			            <div class="alertSwal__cText">
    			              <p>Lo sentimos, hubo un error al enviar el correo.</strong></p>
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
    			    allowEnterKey:true,
    			    //timer: 1000
    		    });
    		    $(document).on('click', '.SwalBtn1', function() {
    			    swal.clickConfirm();
    			});
            }
            
          },
          error : function(xhr, status){
            Swal.fire({
		        title: '',
		        html: `<div class="alertSwal">
			            <div class="alertSwal__cTitle">
			              <h3>¡Error!</h3>
			            </div>
			            <div class="alertSwal__cText">
			              <p>Lo sentimos, hubo un error al enviar el correo.</strong></p>
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
			    allowEnterKey:true,
			    //timer: 1000
		    });
		    $(document).on('click', '.SwalBtn1', function() {
			    swal.clickConfirm();
			});
          }
        });
        
    });
});