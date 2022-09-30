<?php
session_start();
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
	
	$arr_order = [
		"user_id" => $_SESSION['usr-logg_srwong']['id'],
		"order_amount" => $convertAmmount,
		"payment_status" => $pay_status,
		"order_status" => "pending",
		"payment_method" => "IzziPay",
		"transaction_reference" => $izzipay_r['customer']['reference'],
		"order_type" => $izzipay_r['customer']['billingDetails']['title'],
		"branch_id" => $izzipay_r['customer']['billingDetails']['city'],
		"delivery_address" => $izzipay_r['customer']['billingDetails']['address'],
		"user_phone_number" => $izzipay_r['customer']['billingDetails']['phoneNumber'],
		"order_id" => $orderID,
	];

	require_once '../model/Orders.php';
	$orders = new Orders();
	$add = $orders->addOrder($arr_order);
	if($add[0]['r'] == "order_recent"){
		$updorderid = $orders->updateOrderIdTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id']);
		if($updorderid == "true"){
			$updstatus = $orders->updateStatusTempCart_ByIdClient($arr_order['user_id'], $arr_order['order_id'], "completed");
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