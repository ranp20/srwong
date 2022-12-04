<?php
//COMPRIMIR ARCHIVOS DE TEXTO...
(substr_count($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) ? ob_start("ob_gzhandler") : ob_start();
session_start();
require_once '../model/footer-settings.php';
if(!isset($_SESSION['usr-logg_srwong'])){
  header("Location: ./login-register");
}else{
  if(!isset($_POST) || count($_POST) < 1){
    header("Location: ./");
  }else{
    require_once '../model/categories.php';
    $categories = new Categories();
  }
}

require_once '../vendor/autoload.php';


/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
exit();
*/

function addTwoDecimals($number){
  $output_final = "";
  if($number != "0" || $number != 0){
    $output_num = explode(".", $number);
    if(!isset($output_num[1]) || $output_num[1] == "undefined" || $output_num[1] == ""){
      $output_final = number_format($number).".00";
    }else if(isset($output_num[1]) && strlen($output_num[1]) < 2){
      $output_final = number_format($output_num[0]).".".$output_num[1]."0";
    }else{
      $output_final = number_format($output_num[0]).".".$output_num[1];
    }
  }else{
    $output_final = $number;
  }
  return $output_final;
}

require_once '../model/business-settings.php';
$bssiness_payment = new BusinessSettings;
$l_delivery_charge = $bssiness_payment->getDeliveryCharge();
$l_delivery_charge_value = $l_delivery_charge[0]['value'];

$postamount = floatval($_POST['clxt2_chck-ffil']);
$u_type_order = "";
$del_charge = "";
if($_POST['clxt2_chck-ffil_ortype'] == "typ-A_or-del_10"){
    $u_type_order = "delivery";
    $del_charge = floatval($l_delivery_charge_value);
}else if($_POST['clxt2_chck-ffil_ortype'] == "typ-B_or-del_10"){
    $u_type_order = "tienda";
    $del_charge = "0.00";
}else{
    $u_type_order = "No especificado";
    $del_charge = "0.00";
}

$u_sum_or_not = $postamount + $del_charge;
$u_amount =  floatval(addTwoDecimals($u_sum_or_not)) * 100;
/*
echo $u_sum_or_not . "<br>";
echo $u_amount;
exit();
*/

$u_email = $_SESSION['usr-logg_srwong']['email'];
$u_reference = (isset($_POST['chck-reference']) && $_POST['chck-reference'] != "") ? $_POST['chck-reference'] : "No especificado";
$u_address = (isset($_POST['chck-address']) && $_POST['chck-address'] != "") ? $_POST['chck-address'] : "No especificado";
$u_branchid = "";
if(isset($_POST['chck-location']) && $_POST['chck-location'] != ""){
  $u_branchid = $_POST['chck-location'];
}else if(isset($_POST['cx1chk_branchcrt-sess']) && $_POST['cx1chk_branchcrt-sess'] != ""){
  $u_branchid = $_POST['cx1chk_branchcrt-sess'];
}else{
  $u_branchid = "0";
}

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo $u_branchid;
exit();
*/

if($u_branchid == 1){
    //echo "Las flores";
    require_once '../model/keys_2.php';
    require_once '../model/helpers.php';
}else if($u_branchid == 11){
    //echo "Los Jasminez";
    require_once '../model/keys.php';
    require_once '../model/helpers.php';
}else{
    header("Location: ./");
}

$client = new Lyra\Client();

$u_urbanization = "";
if(isset($_POST['chck-urbanization']) && $_POST['chck-urbanization'] != ""){
  $u_urbanization = $_POST['chck-urbanization'][0];
}else{
  $u_urbanization = "0";
}

$u_telephone = (isset($_POST['chck-telephone']) && $_POST['chck-telephone'] != "") ? $_POST['chck-telephone'] : "";
$u_type_delivery = (isset($_POST['type_delivery']) && $_POST['type_delivery'] != "") ? $_POST['type_delivery'] : "No especificado";
$u_type_delivery_format = "";
if($u_type_delivery == "tdeliv_1-srwg"){
  $u_type_delivery_format = "Encontrarse en la puerta";
}else if($u_type_delivery == "tdeliv_2-srwg"){
  $u_type_delivery_format = "Encontrarse afuera";
}else if($u_type_delivery == "tdeliv_3-srwg"){
  $u_type_delivery_format = "Dejar el paquete en consejería o en la puerta si es una casa";
}else{
  $u_type_delivery_format = "No especificado";
  // header("Location: ./");
}

$u_info_facture = (isset($_POST['info_facture']) && $_POST['info_facture'] != "") ? $_POST['info_facture'] : "No especificado";
$u_info_facture_format = "";
if($u_info_facture == "inffac_1-srwng"){
  $u_info_facture_format == "Pago con boleta";
}else if($u_info_facture == "inffac_2-srwng"){
  $u_info_facture_format == "Pago con factura";
}else{
  $u_info_facture_format == "No especificado";
}

$u_delivery_name = (isset($_POST['chck-t_delivery_name']) && $_POST['chck-t_delivery_name'] != "") ? $_POST['chck-t_delivery_name'] : "No especificado";
$u_delivery_dni = (isset($_POST['chck-t_delivery_dni']) && $_POST['chck-t_delivery_dni'] != "") ? $_POST['chck-t_delivery_dni'] : "No especificado";
$u_delivery_ruc = (isset($_POST['chck-t_delivery_ruc']) && $_POST['chck-t_delivery_ruc'] != "") ? $_POST['chck-t_delivery_ruc'] : "No especificado";
$u_delivery_razonsocial = (isset($_POST['chck-t_delivery_razonsocial']) && $_POST['chck-t_delivery_razonsocial'] != "") ? $_POST['chck-t_delivery_razonsocial'] : "No especificado";

$u_t_payinfochk = (isset($_POST['t_payinfochk']) && $_POST['t_payinfochk'] != "") ? $_POST['t_payinfochk'] : "No especificado";
$u_t_payinfochk_format = "";
if($u_t_payinfochk == "tinfochk_1-srwng"){
  $u_t_payinfochk_format = "Pago con tarjeta";
}else if($u_t_payinfochk == "tinfochk_2-srwng"){
  $u_t_payinfochk_format = "Contraentrega";
}else if($u_t_payinfochk == "tinfochk_3-srwng"){
  $u_t_payinfochk_format = "POS";
}else{
  $u_t_payinfochk_format = "No especificado";
}

$u_chcktpayinfo_chk = (isset($_POST['chck-t_payinfo_chk']) && $_POST['chck-t_payinfo_chk'] != "" && $_POST['chck-t_payinfo_chk'] != 0) ? floatval($_POST['chck-t_payinfo_chk']) : "0";
$u_chcktpayinfo_chk_format = str_replace(",", "", $u_chcktpayinfo_chk);
$u_chcktpayinfo_chk_format_1 = addTwoDecimals($u_chcktpayinfo_chk_format);


function genCodeRandom(){
    $format = 'xxxxxxxxy';
    return preg_replace_callback('/[xy]/', function($match) {
        $pattern = '1234567890';
        if($match[0] === 'x'){
            return substr($pattern, mt_rand(0, strlen($pattern)), 1);
        }else{
            return substr(date('y'), -2);
        }
    }, "SRWONG-".$format);
}

mt_srand(3);
$orderIdGenFirst = genCodeRandom();


$orderIdGen = (isset($_POST['ss_vlidcsrf']) && $_POST['ss_vlidcsrf'] != "") ? $_POST['ss_vlidcsrf'] . $orderIdGenFirst : "0";
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo $orderIdGen;
exit();
*/

$store = array(
  "amount" => $u_amount,
  "currency" => "PEN", 
  "orderId" => $orderIdGen,
  "customer" => array(
    "email" => $u_email,
    "reference" => $u_reference,
    "billingDetails" => array(
      "address" => $u_address,
      "title" => $u_type_order,
      "city" => $u_branchid,
      "country" => $u_urbanization,
      "firstName" => $u_t_payinfochk_format,
      "identityCode" => $u_chcktpayinfo_chk_format_1,
      "phoneNumber" => $u_telephone,
    ),
    "shippingDetails" => array(
      "address" => $u_type_delivery_format,
      "address2" => $u_info_facture,
      "firstName" => $u_delivery_name,
      "identityCode" => $u_delivery_dni,
      "legalName" => $u_delivery_razonsocial,
      "zipCode" => $u_delivery_ruc
    )
  )
);
$response = $client->post("V4/Charge/CreatePayment", $store);

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
  <title>Señor Wong - Página de pago</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />  

  <?php require_once 'includes/inc_header_links.php';?>
  
  <!-- INTEGRACIÓN IZZIPAY -->

  <script 
   src="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
   kr-public-key="<?php echo $client->getPublicKey();?>"
   kr-language="es-ES"
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

  <!-- INCLUIR CRYPTO-JS -->
  <script type="text/javascript" src="node_modules/crypto-js/crypto-js.js"></script>

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
            <div class="c-frmpayment_dmss" style="border: 1px solid #e3e3e3;border-radius: 14px;padding: 10px;">
                
                <div class="logo-aps" style="width: 50%;">
                <img alt="" src="https://srwong.pe/views/assets/img/logo/logo.png">
                <p class="mensaje-a" style="text-align: center;font-weight: 700;font-size: 18px;line-height: 20px;">ZONA SEGURA</p>
              </div>
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
            
            <div class="logo-aps" style="width: 50%;padding: 25px;">
                <img alt="" src="https://srwong.pe/views/assets/img/tarjetas.png">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'includes/inc_footer.php';?>
  <?php require_once 'includes/inc_mobile-tabs-links-footer.php';?>
  <!-- INCLUIR MEANMENU -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/meanmenu/jquery.meanmenu.min.js"></script>
  <!-- INCLUIR SCROLLUP -->
  <script type="text/javascript" src="<?= $url;?>assets/js/plugins/scrollUp/jquery.scrollUp.min.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?= $url;?>assets/js/actions/payment.js"></script>
</body>
</html>
