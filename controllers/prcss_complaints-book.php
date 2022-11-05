<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

$r = "";
if(isset($_POST) && count($_POST) > 0){
    
    $cmpbk_book_name = (isset($_POST['cmpbk-book_name']) && $_POST['cmpbk-book_name'] != "") ? $_POST['cmpbk-book_name'] : "No especificado";
    $cmpbk_book_seldistric = (isset($_POST['cmpbk-book_seldistric']) && $_POST['cmpbk-book_seldistric'] != "") ? $_POST['cmpbk-book_seldistric'] : "No especificado";
    $cmpbk_book_addresshome = (isset($_POST['cmpbk-book_addresshome']) && $_POST['cmpbk-book_addresshome'] != "") ? $_POST['cmpbk-book_addresshome'] : "No especificado";
    $cmpbk_book_dni = (isset($_POST['cmpbk-book_dni']) && $_POST['cmpbk-book_dni'] != "" && $_POST['cmpbk-book_dni'] != 0) ? $_POST['cmpbk-book_dni'] : "0";
    $cmpbk_book_telephone = (isset($_POST['cmpbk-book_telephone']) && $_POST['cmpbk-book_telephone'] != "" && $_POST['cmpbk-book_telephone'] != 0) ? $_POST['cmpbk-book_telephone'] : 0;
    $cmpbk_book_email = (isset($_POST['cmpbk-book_email']) && $_POST['cmpbk-book_email'] != "") ? $_POST['cmpbk-book_email'] : "No especificado";
    $st_cmpbook_age = (isset($_POST['st_cmpbook_age']) && $_POST['st_cmpbook_age'] != "") ? $_POST['st_cmpbook_age'] : "No especificado";
    $st_cmpbook_treason = (isset($_POST['st_cmpbook_treason']) && $_POST['st_cmpbook_treason'] != "") ? $_POST['st_cmpbook_treason'] : "No especificado";
    $cmpbk_book_amount = (isset($_POST['cmpbk-book_amount']) && $_POST['cmpbk-book_amount'] != "" && $_POST['cmpbk-book_amount'] != 0) ? str_replace(",", "", $_POST['cmpbk-book_amount']) : 0;
    $cmpbk_book_desc = (isset($_POST['cmpbk-book_desc']) && $_POST['cmpbk-book_desc'] != "") ? $_POST['cmpbk-book_desc'] : "No especificado";
    $st_cmpbook_tdetailreason = (isset($_POST['st_cmpbook_tdetailreason']) && $_POST['st_cmpbook_tdetailreason'] != "") ? $_POST['st_cmpbook_tdetailreason'] : "No especificado";
    $cmpbk_book_cli_details = (isset($_POST['cmpbk-book_cli-details']) && $_POST['cmpbk-book_cli-details'] != "") ? $_POST['cmpbk-book_cli-details'] : "No especificado";
    $cmpbk_book_order = (isset($_POST['cmpbk-book_order']) && $_POST['cmpbk-book_order'] != "") ? $_POST['cmpbk-book_order'] : "No especificado";
    $cmpbk_book_prov_details = (isset($_POST['cmpbk-book_prov-details']) && $_POST['cmpbk-book_prov-details'] != "") ? $_POST['cmpbk-book_prov-details'] : "No especificado";
    
    $arr_cmpbk = [
        "cmpbk_book_name" => $cmpbk_book_name,
        "cmpbk_book_seldistric" => $cmpbk_book_seldistric,
        "cmpbk_book_addresshome" => $cmpbk_book_addresshome,
        "cmpbk_book_dni" => $cmpbk_book_dni,
        "cmpbk_book_telephone" => $cmpbk_book_telephone,
        "cmpbk_book_email" => $cmpbk_book_email,
        "st_cmpbook_age" => $st_cmpbook_age,
        "st_cmpbook_treason" => $st_cmpbook_treason,
        "cmpbk_book_amount" => $cmpbk_book_amount,
        "cmpbk_book_desc" => $cmpbk_book_desc,
        "st_cmpbook_tdetailreason" => $st_cmpbook_tdetailreason,
        "cmpbk_book_cli_details" => $cmpbk_book_cli_details,
        "cmpbk_book_order" => $cmpbk_book_order,
        "cmpbk_book_prov_details" => $cmpbk_book_prov_details
    ];
    
    require_once '../model/complaints_book.php';
    $complaints_book = new Complaints_Book();
    $add_compbook = $complaints_book->addComplaintsBook($arr_cmpbk);
    
    date_default_timezone_set('America/Lima');
    $dateCurrent = date('d/m/Y');
    
    if($add_compbook == "true"){
        
        $emailcompbook_name = $arr_cmpbk['cmpbk_book_name'];
        $emailcompbook_distric = $arr_cmpbk['cmpbk_book_seldistric'];
        $emailcompbook_addresshome = $arr_cmpbk['cmpbk_book_addresshome'];
        $emailcompbook_dni = $arr_cmpbk['cmpbk_book_dni'];
        $emailcompbook_telephone = $arr_cmpbk['cmpbk_book_telephone'];
        $emailcompbook_age = $arr_cmpbk['st_cmpbook_age'];
        $emailcompbook_treason = $arr_cmpbk['st_cmpbook_treason'];
        $emailcompbook_amount = $arr_cmpbk['cmpbk_book_amount'];
        $emailcompbook_desc = $arr_cmpbk['cmpbk_book_desc'];
        $emailcompbook_type_reason = $arr_cmpbk["st_cmpbook_tdetailreason"];
        $emailcompbook_clidetails = $arr_cmpbk['cmpbk_book_cli_details'];
        $emailcompbook_order = $arr_cmpbk['cmpbk_book_order'];
        $emailcompbook_provdetails = $arr_cmpbk['cmpbk_book_prov_details'];
        
        $mail = new PHPMailer(true);
    		 
        try {
      		$mail->CharSet = 'UTF-8';
         	//Server settings
    	    $mail->SMTPDebug = 0;                                                           // Enable verbose debug output
    	    //   $mail->isSMTP();                                                    // Set mailer to use SMTP
    	    $mail->Host       = 'mail.srwong.pe';                                                    // Specify main and backup SMTP servers
    	    $mail->SMTPAuth   = true;                                                       // Enable SMTP authentication
    	    $mail->Username   = 'reclamaciones.srwong@gmail.com';                 // SMTP username
    	    $mail->Password   = 'dVOw6qf;5~@s';                                                    // SMTP password
    	    $mail->SMTPSecure = 'tls';                                                      // Enable TLS encryption, `ssl` also accepted
    	    $mail->Port       = 465; //587;                                          // TCP port to connect to
    
    	    //Recipients
    	    $mail->setFrom('reclamaciones@srwong.pe', 'Señor Wong');
    	    //foreach($correo as $val){
    	    $mail->addAddress($arr_cmpbk['cmpbk_book_email']);                                        // Add a recipient a quien se le enviara el corre
    	    $mail->addAddress("reclamaciones.srwong@gmail.com");
    	    //}
    	    // Content
    	    $mail->isHTML(true);                                                               // Set email format to HTML
    	    $mail->Subject = "Libro de reclamaciones, " . $emailcompbook_name;
    	    
    	    $mail->Body    =  '<html>
    	     <body style="display:flex;align-items:center;justify-content:center;background: rgba(0,0,0,.05);padding: 2.2rem 0 2.2rem 0;">
    	        <div style="background-image: url(https://srwong.pe/views/assets/img/logo/logo.png);width: 85%;margin: auto;border-radius: 20px;background-position: center;background-repeat: no-repeat;background-size: contain;">
    	          <div style="width: 100%;background: rgba(255,255,255,.7);border-radius: 20px;border: #eee;box-shadow: 0 18px 24px 1px rgba(0,0,0,.1);">
    	            <table rules="all" style="width: 100%;background: rgba(255,255,255,.75);border-radius: 20px;margin: auto;">
    	                <tbody>
                          <tr>
                            <td>
                              <table style="width: 100%;border-top-width: 0px;border-right-width: 0px;border-bottom-width: 0px;border-left-width: 0px;-webkit-border-horizontal-spacing: 0px;-webkit-border-vertical-spacing: 0px;">
                                <tbody>
                                  <tr>
                                    <td width="350" height="5" bgcolor="#f60715"></td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <a href="https://srwong.pe/" target="_blank" style="display: table;cursor: pointer;text-align: center;display: block;width: 100%;text-align: center;">
                                        <img src="https://srwong.pe/views/assets/img/logo/logo.png" alt="logo_srWong" style="max-width:280px;min-width:170px;width:95%" class="CToWUd a6T" data-bit="iit" tabindex="0">
                                      </a>           
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" height="56" align="center" bgcolor="#4E4E4C" style="color:#fff;font-size:26px;font-family:Arial,Helvetica,sans-serif">
                                      <h2 style="font-size: 26px;font-family: Arial,Helvetica,sans-serif;margin: 0;">Libro de Reclamaciones</h2>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" valign="middle" style="border-top:dotted 1px #cbcbcb">
                                      <table width="780" align="center">
                                        <tbody>
                                          <tr>
                                            <td align="left" style="font-size: .95rem;" colspan="6">
                                              <br>
                                              <br>
                                              <p>Hola, <b>'.$emailcompbook_name.'</b></p>
                                              <p>Se le envía su contancia de <b>'.$emailcompbook_type_reason.'</b> con la información brindada.</p>
                                              <p>
                                                <b>Fecha: '.$dateCurrent.'</b><br>
                                                <b>Razón Social : LIANG INVERSIONES SOCIEDAD ANONIMA CERRADA - LIANG INVERSIONES S.A.C.</b><br>
                                                <b>RUC: 20553277699</b><br>
                                                <b>Dirección Fiscal: AV. LOS JARDINES ESTE NRO. 173 URB. LAS FLORES SETENTIOCHO LIMA - LIMA - SAN JUAN DE LURIGANCHO.</b>
                                              </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <table width="100%" align="center">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">                      
                                                      <p style="color:red;font-weight: 500;margin: 1rem 0 .25rem 0;">1. Identificación del consumidor reclamante.</p>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">
                                                      <table>
                                                        <tbody>
                                                          <tr>
                                                            <td>                                    
                                                              <p style="margin: 0 0 0 0;"><b>Nombre : </b>'.$emailcompbook_name.'<br></p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <p style="margin: 0 0 0 0;"><b>Distrito : </b>'.$emailcompbook_distric.'</p>
                                                          </tr>
                                                          <tr>
                                                            <p style="margin: 0 0 0 0;"><b>Domicilio : </b>'.$emailcompbook_addresshome.'</p>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2">
                                                              <p style="margin: 0 0 0 0;"><b>DNI/C.E : </b>'.$emailcompbook_dni.'</p>
                                                            </td>
                                                            <td colspan="2">
                                                              <p style="margin: 0 0 0 0;"><b>Teléfono : </b>'.$emailcompbook_telephone.'</p>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <p style="margin: 0 0 0 0;"><b>Menor de Edad : </b>'.$emailcompbook_age.'</p>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <table width="100%" align="center">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">                      
                                                      <p style="color:red;font-weight: 500;margin: 1rem 0 .25rem 0;">2. Identificación del bien contratado.</p>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">                        
                                                      <p style="margin: .25rem 0 .25rem 0;">                              
                                                        <b>Monto Reclamado :</b> '.$emailcompbook_amount.'<br>
                                                        <b>Descripción :</b> '.$emailcompbook_desc.'<br>
                                                      </p>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <table width="100%" align="center">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">
                                                      <p style="color:red;font-weight: 500;margin: 1rem 0 .25rem 0;">3. Detalle de reclamación y pedido del consumidor.</p>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">
                                                      <p style="margin: .25rem 0 .25rem 0;">                              
                                                        <b>Tipo :</b> '.$emailcompbook_type_reason.'<br>
                                                        <b>Detalle :</b> '.$emailcompbook_clidetails.'<br>
                                                        <b>Pedido :</b> '.$emailcompbook_order.'<br>
                                                      </p>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <table width="100%" align="center">
                                                <tbody>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">
                                                      <p style="color:red;font-weight: 500;margin: 1rem 0 .25rem 0;">4. Observaciones y acciones adoptadas por el proveedor.</p>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td align="left" style="font-size: .95rem;" colspan="6">
                                                      <p style="margin: .25rem 0 .25rem 0;">
                                                        <b>Descripción :</b> '.$emailcompbook_provdetails.'<br>
                                                      </p>                        
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="6" align="center">
                                      <p>El equipo de <a href="https://srwong.pe/" target="_blank" style="text-align: center;color: #15c;">srwong.pe</a></p>
                                      <br>
                                    </td>
                                  </tr>
                                </tbody>                          
                              </table>
                            </td>
                          </tr>
                        </tbody>
    	            </table>
    	          </div>
    	        </div>
    	     </body>
    	   	</html>';
    
    	    $mail->send();
    
    	    $r = array(
    			'r' => 'true'
    		);
    
        } catch (Exception $e) {
            echo "Ocurrio un error al enviar el correo. Error: {$mail->ErrorInfo}";
    
            $r = array(
    			'r' => 'false'
    		);
        }
        
    }else{
        $r = array(
            "r" => "false"
        );   
    }
}else{
    $r = array(
        "r" => "false"
    );
}
die(json_encode($r));