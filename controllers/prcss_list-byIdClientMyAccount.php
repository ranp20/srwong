<?php
$r = "";
if(isset($_POST['idcli']) && $_POST['idcli'] != ""){
  require_once '../model/orders.php';
  $orders = new Orders();
  $listtmp = $orders->listTempCartByIdClientMyAccount($_POST['idcli']);
  $arr_tmp = [];
  $status_or = "";
  foreach ($listtmp as $k => $v){
    $arr_tmp[$k]['id'] = $v['id'];
    $arr_tmp[$k]['id_product'] = $v['id_product'];
    $arr_tmp[$k]['tmp_price'] = $v['tmp_price'];
    $arr_tmp[$k]['tmp_quantity'] = $v['tmp_quantity'];
    $arr_tmp[$k]['tmp_subtotal'] = $v['tmp_subtotal'];
    $arr_tmp[$k]['p_name'] = $v['p_name'];
    $arr_tmp[$k]['p_photo'] = $v['p_photo'];
    $arr_tmp[$k]['tmp_status'] = $v['tmp_status'];
  }
  $r = $arr_tmp;
}else{
  $r = "";
}
die(json_encode($r));