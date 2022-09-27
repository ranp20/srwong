<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}

require_once '../vendor/autoload.php';
require_once '../model/keys.php';
require_once '../model/helpers.php';

$client = new Lyra\Client();
$postamount = floatval($_POST['clxt2_chck-ffil']);
$type_order = "";
if($_POST['clxt2_chck-ffil_ortype'] == "typ-A_or-del_10"){
  $type_order = "DELIVERY";
}else if($_POST['clxt2_chck-ffil_ortype'] == "typ-B_or-del_10"){
  $type_order = "TIENDA";
}else{
  $type_order = "No especificado";
}
$amount =  $postamount * 100;
$email = $_SESSION['usr-logg_srwong']['email'];
$store = array(
  "amount" => $amount,
  "currency" => "PEN", 
  "orderId" => uniqid("MyOrderId"),
  "customer" => array(
    "email" => $email,
    "reference" => $_POST['chck-reference'],
    "billingDetails" => array(
      "address" => $_POST['chck-address'],
      "title" => $type_order,
      "city" => $_POST['chck-location'],
      "phoneNumber" => $_POST['chck-telephone']
    )
  )
);
$response = $client->post("V4/Charge/CreatePayment", $store);
/*
echo "<pre>";
print_r($response);
echo "</pre>";
exit();
*/

if($response['status'] != 'SUCCESS'){
  display_error($response);
  $error = $response['answer'];
  throw new Exception("error " . $error['errorCode'] . ": " . $error['errorMessage'] );
}

$formToken = $response["answer"]["formToken"];


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php require_once 'includes/inc_header_links.php';?>
  <title>SrWong - Página de pago</title>
  <!-- INTEGRACIÓN IZZIPAY -->

  <script 
   src="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
   kr-public-key="<?php echo $client->getPublicKey();?>"
   kr-post-url-success="./payment-data">
  </script>

  <link rel="stylesheet" href="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/ext/classic-reset.css">
  <script src="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/ext/classic.js"></script>
   

  <!--
  <script 
   src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js" 
   kr-public-key="89289758:testpublickey_TxzPjl9xKlhM0a6tfSVNilcLTOUZ0ndsTogGTByPUATcE" 
   kr-post-url-success="./confirm">
  </script>

  <link rel="stylesheet" 
  href="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic-reset.css">
 <script 
  src="https://static.micuentaweb.pe/static/js/krypton-client/V4.0/ext/classic.js">
 </script> 
-->

</head>
<body>
  <?php require_once 'includes/inc_header_top.php';?>
    <div class="breadcrumb-area gray-bg">
    <div class="container">
      <div class="breadcrumb-content">
        <ul>
          <li><a href="./">Home</a></li>
          <li class="active"> Pago </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- checkout-area start -->
  <div class="checkout-area pb-80 pt-50">
    <div class="container">
      <div class="row">
        <div class="ml-auto mr-auto col-lg-8">
          <div class="payment-wrapper">
            <div class="c-frmpayment_dmss">
              <!-- FORMULARIO INCRUSTADO (INICIO) -->
              
              <div class="kr-embedded"  kr-form-token="<?php echo $formToken; ?>">

                <div class="kr-pan"></div>
                <div class="kr-expiry"></div>
                <div class="kr-security-code"></div>

                <button class="kr-payment-button"></button>

                <div class="kr-form-error"></div>
              </div>
          
              <!-- FORMULARIO INCRUSTADO (FIN) -->
              <!--
              <div class="kr-embedded"  kr-form-token="26_kXZgIuMR_ixXpm7_zI7pQ229eyJhbW91bnQiOjE4MCwiY3VycmVuY3kiOiJQRU4iLCJtb2RlIjoiVEVTVCIsInZlcnNpb24iOjMsInNob3BOYW1lIjoiUHJ1ZWJhcyBBUEkgUkVTVCIsInJpc2tBbmFseXNlciI6eyJmaW5nZXJQcmludHNJZCI6ImQzNmVjNTk3LWJlMDgtNGEzNC04MjlmLWFkNWFiZmExZmZkNyIsImpzVXJsIjoiaHR0cHM6Ly9zZWN1cmUubWljdWVudGF3ZWIucGUvdHJhcy9hbmFseXplci9wdWJsaWMvdjEvY2hlY2tlci9kMzZlYzU5Ny1iZTA4LTRhMzQtODI5Zi1hZDVhYmZhMWZmZDcifSwiY2F0ZWdvcmllcyI6eyJkZWJpdENyZWRpdENhcmRzIjp7ImFwcElkIjoiY2FyZHMiLCJwYXJhbSI6WyJNQUVTVFJPIiwiQU1FWCIsIk1BU1RFUkNBUkRfREVCSVQiLCJNQVNURVJDQVJEIiwiTUNfQ09SRE9CRVNBIiwiVklTQSIsIlZJU0FfRUxFQ1RST04iLCJWSVNBX0RFQklUIiwiRElORVJTIl19fSwiY2FyZHMiOnsiQU1FWCI6eyJmaWVsZHMiOnsic2VjdXJpdHlDb2RlIjp7Im1heExlbmd0aCI6NH0sImluc3RhbGxtZW50TnVtYmVyIjp7InZhbHVlIjoiLTEiLCJ2YWx1ZXMiOnsiLTEiOiIxOjo6OjoxODAiLCJEWU5BTUlDIjoiOjo6OjoifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9LCJmaXJzdEluc3RhbGxtZW50RGVsYXkiOnsidmFsdWUiOiIwIiwidmFsdWVzIjp7IjAiOiIwIiwiRFlOQU1JQyI6IkRZTkFNSUMifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9fSwiY29weUZyb20iOiJjYXJkcy5ERUZBVUxUIn0sIk1BRVNUUk8iOnsiY29weUZyb20iOiJjYXJkcy5ERUZBVUxUIn0sIk1BU1RFUkNBUkRfREVCSVQiOnsiZmllbGRzIjp7Imluc3RhbGxtZW50TnVtYmVyIjp7InZhbHVlIjoiLTEiLCJ2YWx1ZXMiOnsiLTEiOiIxOjo6OjoxODAiLCJEWU5BTUlDIjoiOjo6OjoifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9LCJmaXJzdEluc3RhbGxtZW50RGVsYXkiOnsidmFsdWUiOiIwIiwidmFsdWVzIjp7IjAiOiIwIiwiRFlOQU1JQyI6IkRZTkFNSUMifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9fSwiY29weUZyb20iOiJjYXJkcy5ERUZBVUxUIn0sIk1BU1RFUkNBUkQiOnsiZmllbGRzIjp7Imluc3RhbGxtZW50TnVtYmVyIjp7InZhbHVlIjoiLTEiLCJ2YWx1ZXMiOnsiLTEiOiIxOjo6OjoxODAiLCJEWU5BTUlDIjoiOjo6OjoifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9LCJmaXJzdEluc3RhbGxtZW50RGVsYXkiOnsidmFsdWUiOiIwIiwidmFsdWVzIjp7IjAiOiIwIiwiRFlOQU1JQyI6IkRZTkFNSUMifSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9fSwiY29weUZyb20iOiJjYXJkcy5ERUZBVUxUIn0sIk1DX0NPUkRPQkVTQSI6eyJmaWVsZHMiOnsiaW5zdGFsbG1lbnROdW1iZXIiOnsidmFsdWUiOiItMSIsInZhbHVlcyI6eyItMSI6IjE6Ojo6OjE4MCIsIkRZTkFNSUMiOiI6Ojo6OiJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImZpcnN0SW5zdGFsbG1lbnREZWxheSI6eyJ2YWx1ZSI6IjAiLCJ2YWx1ZXMiOnsiMCI6IjAiLCJEWU5BTUlDIjoiRFlOQU1JQyJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX19LCJjb3B5RnJvbSI6ImNhcmRzLkRFRkFVTFQifSwiVklTQSI6eyJmaWVsZHMiOnsiaW5zdGFsbG1lbnROdW1iZXIiOnsidmFsdWUiOiItMSIsInZhbHVlcyI6eyItMSI6IjE6Ojo6OjE4MCIsIkRZTkFNSUMiOiI6Ojo6OiJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImZpcnN0SW5zdGFsbG1lbnREZWxheSI6eyJ2YWx1ZSI6IjAiLCJ2YWx1ZXMiOnsiMCI6IjAiLCJEWU5BTUlDIjoiRFlOQU1JQyJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX19LCJjb3B5RnJvbSI6ImNhcmRzLkRFRkFVTFQifSwiVklTQV9FTEVDVFJPTiI6eyJmaWVsZHMiOnsiaW5zdGFsbG1lbnROdW1iZXIiOnsidmFsdWUiOiItMSIsInZhbHVlcyI6eyItMSI6IjE6Ojo6OjE4MCIsIkRZTkFNSUMiOiI6Ojo6OiJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImZpcnN0SW5zdGFsbG1lbnREZWxheSI6eyJ2YWx1ZSI6IjAiLCJ2YWx1ZXMiOnsiMCI6IjAiLCJEWU5BTUlDIjoiRFlOQU1JQyJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX19LCJjb3B5RnJvbSI6ImNhcmRzLkRFRkFVTFQifSwiREVGQVVMVCI6eyJmaWVsZHMiOnsicGFuIjp7Im1pbkxlbmd0aCI6MTAsIm1heExlbmd0aCI6MTksInZhbGlkYXRvcnMiOlsiTlVNRVJJQyIsIkxVSE4iXSwicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6dHJ1ZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImV4cGlyeURhdGUiOnsicmVxdWlyZWQiOnRydWUsInNlbnNpdGl2ZSI6dHJ1ZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sInNlY3VyaXR5Q29kZSI6eyJtaW5MZW5ndGgiOjMsIm1heExlbmd0aCI6NCwidmFsaWRhdG9ycyI6WyJOVU1FUklDIl0sInJlcXVpcmVkIjp0cnVlLCJzZW5zaXRpdmUiOnRydWUsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6dHJ1ZX0sImluc3RhbGxtZW50TnVtYmVyIjp7InZhbHVlIjoiLTEiLCJ2YWx1ZXMiOnsiLTEiOiIxOjo6OjoxODAifSwicmVxdWlyZWQiOmZhbHNlLCJzZW5zaXRpdmUiOmZhbHNlLCJoaWRkZW4iOmZhbHNlLCJjbGVhck9uRXJyb3IiOmZhbHNlfSwiZmlyc3RJbnN0YWxsbWVudERlbGF5Ijp7InZhbHVlIjoiMCIsInZhbHVlcyI6eyIwIjoiMCJ9LCJyZXF1aXJlZCI6ZmFsc2UsInNlbnNpdGl2ZSI6ZmFsc2UsImhpZGRlbiI6ZmFsc2UsImNsZWFyT25FcnJvciI6ZmFsc2V9fX0sIkRJTkVSUyI6eyJmaWVsZHMiOnsiaW5zdGFsbG1lbnROdW1iZXIiOnsidmFsdWUiOiItMSIsInZhbHVlcyI6eyItMSI6IjE6Ojo6OjE4MCIsIkRZTkFNSUMiOiI6Ojo6OiJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImZpcnN0SW5zdGFsbG1lbnREZWxheSI6eyJ2YWx1ZSI6IjAiLCJ2YWx1ZXMiOnsiMCI6IjAiLCJEWU5BTUlDIjoiRFlOQU1JQyJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX19LCJjb3B5RnJvbSI6ImNhcmRzLkRFRkFVTFQifSwiVklTQV9ERUJJVCI6eyJmaWVsZHMiOnsiaW5zdGFsbG1lbnROdW1iZXIiOnsidmFsdWUiOiItMSIsInZhbHVlcyI6eyItMSI6IjE6Ojo6OjE4MCIsIkRZTkFNSUMiOiI6Ojo6OiJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX0sImZpcnN0SW5zdGFsbG1lbnREZWxheSI6eyJ2YWx1ZSI6IjAiLCJ2YWx1ZXMiOnsiMCI6IjAiLCJEWU5BTUlDIjoiRFlOQU1JQyJ9LCJyZXF1aXJlZCI6dHJ1ZSwic2Vuc2l0aXZlIjpmYWxzZSwiaGlkZGVuIjpmYWxzZSwiY2xlYXJPbkVycm9yIjpmYWxzZX19LCJjb3B5RnJvbSI6ImNhcmRzLkRFRkFVTFQifX0sInBhc3NBY3RpdmF0ZWQiOnRydWUsImFwaVJlc3RWZXJzaW9uIjoiNC4wIiwiY291bnRyeSI6IlBFIiwialNlc3Npb25JZCI6Ii1CakQyQWVINkMzUFMtR2gtMk9rSVRyWVVYRmptbi1tZmxUemVwQ24uZGVmYXVsdC1ob3N0bmFtZSJ97302">

                <div class="kr-pan"></div>
                <div class="kr-expiry"></div>
                <div class="kr-security-code"></div>

                <button class="kr-payment-button"></button>

                <div class="kr-form-error"></div>
              </div>
            -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
</body>
</html>
