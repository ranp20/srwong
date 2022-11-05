<?php
session_start();
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
$r = "";
if(isset($_POST) && isset($_POST['kr-answer'])){
	$izzipay_r = json_decode($_POST['kr-answer'], TRUE);
	$_token = uniqid('fk-srWong'); // TRANSACTION DATE
	$transactionDate = $izzipay_r['serverDate']; // TRANSACTION DATE
	$datetransacString = strtotime($transactionDate);
	$trans_date = date('Y-m-d H:i:s',$datetransacString);
	$orderStatus = $izzipay_r['transactions'][0]['status']; // ORDER STATUS
	$orderID = $izzipay_r['orderDetails']['orderId']; // ORDERID
	$currency = $izzipay_r['orderDetails']['orderCurrency']; // CURRENCY
	$payment_gateway_name = "IzziPay"; // PAYMENT GATEWAY NAME
	$credit_card_brand = $izzipay_r['transactions'][0]['transactionDetails']['cardDetails']['effectiveBrand']; // CREDIT CARD BRAND
	$ammountTotal = $izzipay_r['orderDetails']['orderTotalAmount']; // MONTO TOTAL
	$convertAmmount = floatval($ammountTotal / 100);
	/*
	echo "UNIQID => " . $_token . "<br>";
	echo "FECHA PAGO => " . $trans_date . "<br>";
	echo "ESTADO DE PAGO => " . $orderStatus . "<br>";
	echo "ID DE PAGO => " . $orderID . "<br>";
	echo "NOMBRE DEL MÉTODO DE PAGO => ". $payment_gateway_name . "<br>";
	echo "MONEDA => " . $currency . "<br>";
	echo "MONTO => " . $convertAmmount . "<br>";
	echo "TARGETA => " . $credit_card_brand . "<br>";
	*/

	$pay_status = "";
	if($orderStatus == "PAID"){
		$pay_status = "paid";
	}else if($orderStatus == "RUNNING"){
		$pay_status = "in_process";
	}else{
		$pay_status = "unpaid";
	}
	
	
	require_once '../model/business-settings.php';
	$bssiness_payment = new BusinessSettings;
	$l_delivery_charge = $bssiness_payment->getDeliveryCharge();
	$l_delivery_charge_value = $l_delivery_charge[0]['value'];
	
	$del_charge = "";
    if($izzipay_r['customer']['billingDetails']['title'] == "delivery"){
        $del_charge = floatval($l_delivery_charge_value);
    }else if($izzipay_r['customer']['billingDetails']['title'] == "tienda"){
        $del_charge = "0.00";
    }else{
        $del_charge = "0.00";
    }
	
	$amount_final = $convertAmmount - $del_charge;
	
	// INFORMACIÓN PARA EL DETALLE EN EL ADMINISTRADOR
	$arr_delivery_address = [
		"id" => 0,
		"addres_type" => "Home",
		"contact_person_number" => $izzipay_r['customer']['billingDetails']['phoneNumber'],
	  "address" => $izzipay_r['customer']['billingDetails']['address'],
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
		"order_amount" => $amount_final,
		"payment_status" => $pay_status,
		"order_status" => "pending",
		"payment_method" => "IzziPay",
		"transaction_reference" => $izzipay_r['customer']['reference'],
		"delivery_charge" => $del_charge,
		"order_type" => $izzipay_r['customer']['billingDetails']['title'],
		"branch_id" => $izzipay_r['customer']['billingDetails']['city'],
		"delivery_address" => json_encode($arr_delivery_address, TRUE),
		"user_phone_number" => (isset($izzipay_r['customer']['billingDetails']['phoneNumber']) && $izzipay_r['customer']['billingDetails']['phoneNumber'] != "" && $izzipay_r['customer']['billingDetails']['phoneNumber'] != 0) ? $izzipay_r['customer']['billingDetails']['phoneNumber'] : "0",
		"order_id" => $orderID,
		"type_delivery" => $izzipay_r['customer']['shippingDetails']['address'],
		"info_facturation" => $izzipay_r['customer']['shippingDetails']['address2'],
		"deliv_name" => $izzipay_r['customer']['shippingDetails']['firstName'],
		"deliv_dni" => $izzipay_r['customer']['shippingDetails']['identityCode'],
		"deliv_ruc" => $izzipay_r['customer']['shippingDetails']['zipCode'],
		"deliv_razonsocial" => $izzipay_r['customer']['shippingDetails']['legalName'],
		"t_payment" => $izzipay_r['customer']['billingDetails']['firstName'],
		"t_amount_payment" => $izzipay_r['customer']['billingDetails']['identityCode'],
		"urbanization_id" => $izzipay_r['customer']['billingDetails']['country'],
	];
	// INFORMACIÓN PARA EL DETALLE DE LA DIRECCIÓN DEL ENVÍO
	$arr_customer_addresses = [
		"address_type" => "Home",
		"contact_person_number" => $izzipay_r['customer']['billingDetails']['phoneNumber'],
		"address" => $izzipay_r['customer']['billingDetails']['address'],
		"latitude" => "No especificado",
		"longitude" => "No especificado",
		"user_id" => $_SESSION['usr-logg_srwong']['id'],
		"contact_person_name" => $_SESSION['usr-logg_srwong']['f_name'] . " " . $_SESSION['usr-logg_srwong']['l_name'],
		"n_dni" => $izzipay_r['customer']['shippingDetails']['identityCode']
	];
	
	// echo "<pre>";
	// print_r($izzipay_r);
	// echo "</pre>";
	// echo "<!------------------------------->";
	// echo "<pre>";
	// print_r($arr_order);
	// echo "</pre>";
	// exit();
	
	require_once '../model/orders.php';
	require_once '../model/customer_addresses.php';
	$orders = new Orders();
	$customaddressses = new CustomerAddress();
	$add = $orders->addOrder($arr_order);
    /*
    print_r($add);
    exit();
    */
	if($add[0]['r'] == "order_recent"){
		$updorderid = $orders->updateOrderIdTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id']);
		if($updorderid == "true"){
			$updstatus = $orders->updateStatusTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id'], "completed");
			if($updstatus == "true"){
				// ---- ACTUALIZAR LA DIRECCIÓN DEL USUARIO
				$addcustomeraddress = $customaddressses->addCustomerAddress($arr_customer_addresses);
				/*
				print_r($addcustomeraddress);
				exit();
				*/
				if($addcustomeraddress[0]['res'] == "first_time"){
				    $r = array(
    					"r" => "true"
    				);
				    header("Location: ./confirm");
				}else if($addcustomeraddress[0]['res'] == "second_time"){
				    $r = array(
    					"r" => "second_timeaddress"
    				);
    				header("Location: ./confirm");
				}else{
				    $r = array(
    					"r" => "err_addaddress"
    				);
    				header("Location: ./");
				}
			}else{
				$r = array(
					"r" => "err_updstatus"
				);
				header("Location: ./");
			}
		}else{
			$r = array(
				"r" => "err_updorderid"
			);
			header("Location: ./");
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
				header("Location: ./");
			}
		}else{
			$r = array(
				"r" => "err_updorderid"
			);
			header("Location: ./");
		}
	}else{
		header("Location: ./");
	}
	
}else{
	header("Location: ./");
}
