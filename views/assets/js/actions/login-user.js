$(() => {
	let listLinks = $(".login-register-tab-list");
	let listContents = $(".tab-content");
	let ItemsContents = listContents.find(".tab-pane");
	listLinks.on("click", "a", function(e){
		let indx = $(this).index();
		ItemsContents.eq(indx).add($(this)).addClass('active').siblings().removeClass('active');
	});
});
// ------------ LOGIN - REGISTER
$(document).on("submit", "#frm_2-Reg", function(e){
	e.preventDefault();
	($("#u-reg_name").val() != 0 && $("#u-reg_name").val() != "") ? $("#u-reg_name").next().text(""): $("#u-reg_name").next().text("Debes ingresar un usuario *");
  ($("#u-reg_email").val() != 0 && $("#u-reg_email").val() != "") ? $("#u-reg_email").text(""): $("#u-reg_email").text("Debes ingresar un correo electrónico *");
  ($("#u-reg_password").val() != 0 && $("#u-reg_password").val() != "") ? $("#u-reg_password").text(""): $("#u-reg_password").text("Debes ingresar una contraseña *");
  ($("#u-reg_passwordtwo").val() != 0 && $("#u-reg_passwordtwo").val() != "") ? $("#u-reg_passwordtwo").text(""): $("#u-reg_passwordtwo").text("Debes repetir la contraseña *");
  if ($("#u-reg_name").val() != 0 && $("#u-reg_name").val() != "" &&
  	$("#u-reg_email").val() != 0 && $("#u-reg_email").val() != "" && 
  	$("#u-reg_password").val() != 0 && $("#u-reg_password").val() != "" && 
  	$("#u-reg_passwordtwo").val() != 0 && $("#u-reg_passwordtwo").val() != "") {
    if($("#u-reg_password").val() == $("#u-reg_passwordtwo").val()){
	    var form = $(this).serializeArray();
	    $.ajax({
	      url: './controllers/prcss_register-user.php',
	      method: 'POST',
	      dataType: 'JSON',
	      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
	      data: form
	    }).done((e) => {
	    	if(e != "" && e != "[]"){
		      if(e.r == "true"){
		        Swal.fire({
				      title: '',
				      html: `<div class="alertSwal">
					            <div class="alertSwal__cTitle">
					              <h3>¡Éxito!</h3>
					            </div>
					            <div class="alertSwal__cText">
					              <p>El usuario ha sido registrado.</strong></p>
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
					    window.location.href = "./";
					  });
					  setTimeout(function(){
					  	window.location.href = "./";
					  }, 1000);
		        $("#header-login").html(`
		        	<a href='javascript:void(0);'>
                <div class='header-icon-style'>
                  <i class='icon-user icons'></i>
                </div>
                <div class='login-text-content' id='login-text-content'>
                  <p><strong>${e.received.username}</strong></p>
                </div>
              </a>
              <div class='listoptions-login-content'>
                <ul>
                  <li class='single-listoptions-login'>
                    <a href='my-account'>
                      <i class='icon-user icons'></i>
                      <span>Mi cuenta</span>
                    </a>
                  </li>
                  <li class='single-listoptions-login'>
                    <a href='logout'>
                      <i class='icon-logout icons'></i>
                      <span>Cerrar sesión</span>
                    </a>
                  </li>
                </ul>
              </div>
		        `);
		        $('#frm_2-Reg')[0].reset();
		      }else if(e.r == "equals"){
		        Swal.fire({
				      title: '',
				      html: `<div class="alertSwal">
					            <div class="alertSwal__cTitle">
					              <h3>¡Usuario ya existe!</h3>
					            </div>
					            <div class="alertSwal__cText">
					              <p>El usuario ingresado <strong class="bold-pricolor">ya se encuentra registrado, por favor inicie sesión.</strong></p>
					            </div>
					            <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
					          </div>`,
				      icon: 'warning',
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
		      }else if(e.r == "err_email"){
		        Swal.fire({
				      title: '',
				      html: `<div class="alertSwal">
					            <div class="alertSwal__cTitle">
					              <h3>¡Email Inválido!</h3>
					            </div>
					            <div class="alertSwal__cText">
					              <p>El correo electrónico ingresado no es válido.</p>
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
		      } else if (e.r == "err_pass"){
		        Swal.fire({
				      title: '',
				      html: `<div class="alertSwal">
					            <div class="alertSwal__cTitle">
					              <h3>¡Contraseña Inválida!</h3>
					            </div>
					            <div class="alertSwal__cText">
					              <p>La contraseña solo puede contener letras (a-b ó A-B) y números del 0 - 9.</p>
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
		      }else if(e.r == "err_insert"){
		        Swal.fire({
				      title: 'Error!',
				      html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar la información.</span>`,
				      icon: 'error',
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
	    });
    }else{
    	Swal.fire({
	      title: 'Atención!',
	      html: `<span class='font-w-300'>Los campos de contraseña deben coincidir.</span>`,
	      icon: 'warning',
	      confirmButtonText: 'Aceptar'
	    });
    }
  }else{
	  Swal.fire({
	    title: '',
	    html: `<div class="alertSwal">
	            <div class="alertSwal__cTitle">
	              <h3>¡Atención!</h3>
	            </div>
	            <div class="alertSwal__cText">
	              <p>Debes completar los campos requeridos.</p>
	            </div>
	            <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
	          </div>`,
	    icon: 'warning',
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
  }
});
// ------------ LOGIN - USER
$(document).on("submit", "#frm_1-Log", function(e){
	e.preventDefault();
	($("#u-name").val() != 0 && $("#u-name").val() != "") ? $("#u-name").next().text(""): $("#u-name").next().text("Debes ingresar un usuario *");
  ($("#u-password").val() != 0 && $("#u-password").val() != "") ? $("#u-password").next().text(""): $("#u-password").next().text("Debes ingresar una contraseña *");
  if ($("#u-name").val() != 0 && $("#u-name").val() != "" && $("#u-password").val() != 0 && $("#u-password").val() != "") {
    var form = $(this).serializeArray();
    $.ajax({
      url: "./controllers/prcss_login-user.php",
      method: "POST",
      dataType: 'JSON',
      contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
      data: form
    }).done((e) => {
      if(e != "" && e != "[]"){
	      if(e.r == "true"){
	      	Swal.fire({
			      title: '',
			      html: `<div class="alertSwal">
				            <div class="alertSwal__cTitle">
				              <h3>¡Éxito!</h3>
				            </div>
				            <div class="alertSwal__cText">
				              <p>El usuario ha iniciado sesión correctamente.</strong></p>
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
				    window.location.href = "./";
				  });
				  setTimeout(function(){
				  	window.location.href = "./";
				  }, 1000);
	        $("#header-login").html(`
	        	<a href='javascript:void(0);'>
              <div class='header-icon-style'>
                <i class='icon-user icons'></i>
              </div>
              <div class='login-text-content' id='login-text-content'>
                <p><strong>${e.received.username}</strong></p>
              </div>
            </a>
            <div class='listoptions-login-content'>
              <ul>
                <li class='single-listoptions-login'>
                  <a href='my-account'>
                    <i class='icon-user icons'></i>
                    <span>Mi cuenta</span>
                  </a>
                </li>
                <li class='single-listoptions-login'>
                  <a href='logout'>
                    <i class='icon-logout icons'></i>
                    <span>Cerrar sesión</span>
                  </a>
                </li>
              </ul>
            </div>
	        `);
	        $('#frm_1-Log')[0].reset();
	      }else if(e.r == "err_email"){
	        // ------------ AGREGAR AL CONTROL DE VALIDACIÓN 
	        Swal.fire({
			      title: '',
			      html: `<div class="alertSwal">
				            <div class="alertSwal__cTitle">
				              <h3>¡Email Inválido!</h3>
				            </div>
				            <div class="alertSwal__cText">
				              <p>El correo electrónico ingresado no es válido.</p>
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
	      }else if(e.r == "err_notequalpass"){
	        Swal.fire({
				    title: '',
				    html: `<div class="alertSwal">
				            <div class="alertSwal__cTitle">
				              <h3>¡Error!</h3>
				            </div>
				            <div class="alertSwal__cText">
				              <p>La contraseña ingresada es incorrecta.</p>
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
	      }else if(e.r == "err_emailnotexist"){
	        Swal.fire({
				    title: '',
				    html: `<div class="alertSwal">
				            <div class="alertSwal__cTitle">
				              <h3>¡Error!</h3>
				            </div>
				            <div class="alertSwal__cText">
				              <p>Los datos del usuario no coinciden o no existen.</p>
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
	      }else{
	        // ------------ AGREGAR AL CONTROL DE VALIDACIÓN 
	        Swal.fire({
				    title: '',
				    html: `<div class="alertSwal">
				            <div class="alertSwal__cTitle">
				              <h3>¡Error!</h3>
				            </div>
				            <div class="alertSwal__cText">
				              <p>Los datos del usuario no coinciden o no existen.</p>
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
	      }
      }else{
				Swal.fire({
		      title: 'Error!',
		      html: `<span class='font-w-300'>Lo sentimos, hubo un error al procesar la información.</span>`,
		      icon: 'error',
		      confirmButtonText: 'Aceptar'
		    });
      }
			
    });
  }else{
    Swal.fire({
	    title: '',
	    html: `<div class="alertSwal">
	            <div class="alertSwal__cTitle">
	              <h3>¡Atención!</h3>
	            </div>
	            <div class="alertSwal__cText">
	              <p>Debes completar los campos requeridos.</p>
	            </div>
	            <button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">Aceptar</button>
	          </div>`,
	    icon: 'warning',
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
  }
});