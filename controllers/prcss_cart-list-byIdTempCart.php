<?php
$r = "";
if(isset($_POST['idcli']) && $_POST['idcli'] != ""){
  require_once '../model/orders.php';
  $orders = new Orders();
  $listtmp = $orders->listTempCartByIdClient($_POST['idcli']);
  $arr_tmp = [];
  foreach ($listtmp as $k => $v){
    if($v['tmp_status'] != "COMPLETED" && $v['tmp_orderid'] == "NO"){    
      $arr_tmp[$k]['id'] = $v['id'];
      $arr_tmp[$k]['id_product'] = $v['id_product'];
      $arr_tmp[$k]['tmp_price'] = $v['tmp_price'];
      $arr_tmp[$k]['tmp_quantity'] = $v['tmp_quantity'];
      $arr_tmp[$k]['tmp_subtotal'] = $v['tmp_subtotal'];
      $arr_tmp[$k]['p_name'] = $v['p_name'];
      $arr_tmp[$k]['p_photo'] = $v['p_photo'];
    }
  }
  $r = $arr_tmp;
}else{
  $r = "";
}
die(json_encode($r));