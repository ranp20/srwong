<?php 

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

function genCodeRandom(){
    $format = 'xxxxxxxxy';
    return preg_replace_callback('/[xy]/', function($match) {
        $pattern = '1234567890';
        if($match[0] === 'x'){
            return substr($pattern, mt_rand(0, strlen($pattern)), 1);
        }else{
            return substr(date('y'), -2);
        }
    }, "sxhdtg-".$format);
}

mt_srand(3);
$orderIdGenFirst = genCodeRandom() . uniqid() . "_" . mt_rand();

$r = "";
if(isset($_POST['usr_email']) && $_POST['usr_email'] != ""){
    
    $recover_pass = [
		"_token_recoverpass" => $orderIdGenFirst,
		"email" => $_POST["usr_email"]
	];
    
	require_once '../model/users.php';
    $user = new Users();
	$recover_cli = $user->generate_uniqid($recover_pass);
	if($recover_cli == "true"){
        $get_byemail = $user->get_client_by_email($_POST['usr_email']);

        if(!empty($get_byemail)){
            $email = $_POST['usr_email'];
    		$token = $recover_pass['_token_recoverpass'];
    		$name_cli = $get_byemail[0]['f_name'] . $get_byemail[0]['l_name'];
    
    		$mail = new PHPMailer(true);
    		 
            try {
          		$mail->CharSet = 'UTF-8';
             	//Server settings
        	    $mail->SMTPDebug = 0;                                                           // Enable verbose debug output
        	    //   $mail->isSMTP();                                                    // Set mailer to use SMTP
        	    $mail->Host       = 'mail.srwong.pe';                                                    // Specify main and backup SMTP servers
        	    $mail->SMTPAuth   = true;                                                       // Enable SMTP authentication
        	    $mail->Username   = 'ventas@srwong.pe';                 // SMTP username
        	    $mail->Password   = 'dVOw6qf;5~@s';                                                    // SMTP password
        	    $mail->SMTPSecure = 'tls';                                                      // Enable TLS encryption, `ssl` also accepted
        	    $mail->Port       = 465; //587;                                          // TCP port to connect to
        
        	    //Recipients
        	    $mail->setFrom('ventas@srwong.pe', 'Señor Wong');
        	    //foreach($correo as $val){
        	    $mail->addAddress($email);                                        // Add a recipient a quien se le enviara el corre
        	    //}
        	    // Content
        	    $mail->isHTML(true);                                                               // Set email format to HTML
        	    $mail->Subject = "Hola de nuevo, " . $name_cli;
        	    
        	    $mail->Body    =  '<html>
        	     <body style="display:flex;align-items:center;justify-content:center;background: rgba(0,0,0,.05);padding: 2.2rem 0 2.2rem 0;">
        	        <div style="background-image: url(https://srwong.pe/views/assets/img/logo/logo.png);width: 85%;margin: auto;border-radius: 20px;background-position: center;background-repeat: no-repeat;background-size: contain;">
        	          <div style="width: 100%;background: rgba(255,255,255,.7);border-radius: 20px;border: #eee;box-shadow: 0 18px 24px 1px rgba(0,0,0,.1);">
        	            <table rules="all" style="width: 100%;background: rgba(255,255,255,.75);border-radius: 20px;margin: auto;">
        	               <thead>
        	                 <td>
        	                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: 1rem 2.8rem 0 2.8rem;">
        	                      <img src="https://srwong.pe/views/assets/img/logo/logo.png" alt="logo_srWong" style="max-width: 280px;min-width: 170px;width: 95%;">
        	                        <h2 style="color:#3c4858;text-align:left;font-size: 1.5rem;">Restablece tu contraseña de Inicio de Sesión.</h2> 
        	                    </div>
        	                    <div style="display:block;align-items:center;justify-content:center;text-align:center;padding: .5rem 2.8rem 2.8rem 2.8rem;font-size: .97rem;font-weight: lighter;">
        	                      <div style="margin-bottom:40px;text-align: center;color:#3c4858;">
        	                        <p style="text-align:left;">Hola, .<strong>"'.$name_cli.'"</strong></p>
        	                        <p style="text-align:left;">Le enviamos este correo electrónico porque solicitó un restablecimiento de contraseña. Haga clic en este enlace para crear una nueva contraseña.</p>
        	                        <a href="https://srwong.pe/restore-password?token='.$token.'" style="text-decoration: none !important;color: #fff;background-color: #FD4259;border-radius: 1.5rem;padding: 1rem 2rem;display: inline-block;">Establecer una nueva contraseña</a>
        	                        <p style="text-align:left;">Si no solicitó un restablecimiento de contraseña, puede ignorar este correo electrónico. Tu contraseña no se cambiará.</p>
        	                      </div>
        	                      <h3 style="color:#3c4858;font-weight:bold;">El equipo de SrWong.pe</h3>
        	                    </div>
        	                  </td>
        	               </thead>
        	               <tbody>
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
                'r' => 'false'
            );  
        }
	}else{
	    $r = array(
            'r' => 'false'
        );    
	}
}else{
    $r = array(
        'r' => 'false'
    );
}

die(json_encode($r));
