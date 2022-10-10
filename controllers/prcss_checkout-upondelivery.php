<?php
session_start();
$r = "";
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
if(isset($_POST) && $_POST != "" && count($_POST) > 0){

	$postamount = floatval($_POST['clxt2_chck-ffil']);
	$u_type_order = "";
	if($_POST['clxt2_chck-ffil_ortype'] == "typ-A_or-del_10"){
	  $u_type_order = "delivery";
	}else if($_POST['clxt2_chck-ffil_ortype'] == "typ-B_or-del_10"){
	  $u_type_order = "TIENDA";
	}else{
	  $u_type_order = "No especificado";
	}
	$u_email = $_SESSION['usr-logg_srwong']['email'];
	$u_reference = (isset($_POST['chck-reference']) && $_POST['chck-reference'] != "") ? $_POST['chck-reference'] : "No especificado";
	$u_address = (isset($_POST['chck-address']) && $_POST['chck-address'] != "") ? $_POST['chck-address'] : "No especificado";
	$u_branchid = "";
	if(isset($_POST['chck-location']) && $_POST['chck-location'] != ""){
	  $u_branchid = $_POST['chck-location'];
	}else{
	  $u_branchid = "0";
	}

	$u_urbanization = "";
	if(isset($_POST['chck-urbanization']) && $_POST['chck-urbanization'] != ""){
	  $u_urbanization = $_POST['chck-urbanization'][0];
	}else{
	  $u_urbanization = "0";
	}

	$u_telephone = (isset($_POST['chck-telephone']) && $_POST['chck-telephone'] != "") ? $_POST['chck-telephone'] : "";
	$u_amount =  $postamount * 100;

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
	  $u_info_facture_format = "Pago con boleta";
	}else if($u_info_facture == "inffac_2-srwng"){
	  $u_info_facture_format = "Pago con factura";
	}else{
	  $u_info_facture_format = "No especificado";
	}

	$u_delivery_name = (isset($_POST['chck-t_delivery_name']) && $_POST['chck-t_delivery_name'] != "") ? $_POST['chck-t_delivery_name'] : "No especificado";
	$u_delivery_dni = (isset($_POST['chck-t_delivery_dni']) && $_POST['chck-t_delivery_dni'] != "") ? $_POST['chck-t_delivery_dni'] : "No especificado";
	$u_delivery_ruc = (isset($_POST['chck-t_delivery_ruc']) && $_POST['chck-t_delivery_ruc'] != "") ? $_POST['chck-t_delivery_ruc'] : "No especificado";
	$u_delivery_razonsocial = (isset($_POST['chck-t_delivery_razonsocial']) && $_POST['chck-t_delivery_razonsocial'] != "") ? $_POST['chck-t_delivery_razonsocial'] : "No especificado";

	$u_t_payinfochk = (isset($_POST['t_payinfochk']) && $_POST['t_payinfochk'] != "") ? $_POST['t_payinfochk'] : "No especificado";
	$u_t_payinfochk_format = "";
	if($u_t_payinfochk == "tinfochk_1-srwng"){
	  $u_t_payinfochk_format = "Pago con targeta";
	}else if($u_t_payinfochk == "tinfochk_2-srwng"){
	  $u_t_payinfochk_format = "Contraentrega";
	}else{
	  $u_t_payinfochk_format = "No especificado";
	}

	$u_chcktpayinfo_chk = (isset($_POST['chck-t_payinfo_chk']) && $_POST['chck-t_payinfo_chk'] != "" && $_POST['chck-t_payinfo_chk'] != 0) ? floatval($_POST['chck-t_payinfo_chk']) : "0";
	$u_chcktpayinfo_chk_format = str_replace(",", "", $u_chcktpayinfo_chk);
	$u_chcktpayinfo_chk_format_1 = addTwoDecimals($u_chcktpayinfo_chk_format);

	$orderID = uniqid("MyOrderId");
	$orderStatus = "RUNNING";
	$ammountTotal = $u_amount; // MONTO TOTAL
	$convertAmmount = floatval($ammountTotal / 100);
	$convertAmmount = addTwoDecimals($convertAmmount);

	$pay_status = "";
	if($orderStatus == "PAID"){
		$pay_status = "paid";
	}else if($orderStatus == "RUNNING"){
		$pay_status = "in_process";
	}else{
		$pay_status = "unpaid";
	}

	// INFORMACIÓN PARA EL DETALLE EN EL ADMINISTRADOR
	$arr_delivery_address = [
		"id" => 0,
		"addres_type" => "Home",
		"contact_person_number" => $u_telephone,
	  "address" => $u_address,
	  "latitude" => "-12.023474199999994",
	  "longitude" => "-77.01358479999999",
	  "created_at" => date("Y-m-d H:i:s"),
	  "updated_at" => date("Y-m-d H:i:s"),
	  "user_id" => $_SESSION['usr-logg_srwong']['id'],
	  "contact_person_name" => $_SESSION['usr-logg_srwong']['f_name'] . " " . $_SESSION['usr-logg_srwong']['l_name']
	];
	// INFORMACIÓN DE LA ORDEN
	$arr_order = [
		"user_id" => $_SESSION['usr-logg_srwong']['id'],
		"order_amount" => $convertAmmount,
		"payment_status" => $pay_status,
		"order_status" => "pending",
		"payment_method" => "Contraentrega",
		"transaction_reference" => $u_reference,
		"order_type" => $u_type_order,
		"branch_id" => $u_branchid,
		"delivery_address" => json_encode($arr_delivery_address, TRUE),
		"user_phone_number" => (isset($u_telephone) && $u_telephone != "" && $u_telephone != 0) ? $u_telephone : "0",
		"order_id" => $orderID,
		"type_delivery" => $u_type_delivery_format,
		"info_facturation" => $u_info_facture,
		"deliv_name" => $u_delivery_name,
		"deliv_dni" => $u_delivery_dni,
		"deliv_ruc" => $u_delivery_ruc,
		"deliv_razonsocial" => $u_delivery_razonsocial,
		"t_payment" => $u_t_payinfochk_format,
		"t_amount_payment" => $u_chcktpayinfo_chk_format_1,
		"urbanization_id" => $u_urbanization,
	];
	/*
	echo "<pre>";
	print_r($arr_order);
	echo "</pre>";
	exit();
	*/

	require_once '../model/orders.php';
	$orders = new Orders();
	$add = $orders->addOrder($arr_order);
	
	if($add[0]['r'] == "order_recent"){
		$updorderid = $orders->updateOrderIdTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id']);
		if($updorderid == "true"){
			$updstatus = $orders->updateStatusTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id'], "completed");
			// print_r($updstatus);
			// exit();
			if($updstatus == "true"){
				$r = array(
					"r" => "true"
				);
				// header("Location: ./confirm");
			}else{
				$r = array(
					"r" => "err_updstatus"
				);
			}
		}else{
			$r = array(
				"r" => "err_updorderid"
			);
		}
	}else if($add[0]['r'] == "order_exists"){
		$updorderid = $orders->updateOrderIdTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id']);
		if($updorderid == "true"){
			$updstatus = $orders->updateStatusTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id'], "in_process");
			if($updstatus == "true"){
				$r = array(
					"r" => "true"
				);
				header("Location: ./confirm");
			}else{
				$r = array(
					"r" => "err_updstatus"
				);
			}
		}else{
			$r = array(
				"r" => "err_updorderid"
			);
		}
	}else{
		header("Location: ./");
	}

}else{
	header("Location: ./");
}
die(json_encode($r));