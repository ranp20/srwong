<?php
$r = "";
if(isset($_POST) && count($_POST) > 0 && $_POST['idcli'] != ""){
  $idcli = $_POST['idcli'];
  $idprod = $_POST['idprod'];
  require_once '../model/cart.php';
  $cartlist = new CartList();
  foreach($idprod as $k => $v){
    $del = $cartlist->deleteAllTempCartByIdClient($idcli, $v);
    if($del == "true"){
      $r = array(
        'r' => 'true'
      );
    }else{
      $r = array(
        'r' => 'false'
      );
    }
  }
}else{
  $r = "";
}
die(json_encode($r));