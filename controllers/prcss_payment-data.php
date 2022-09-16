<?php
if(isset($_POST) && isset($_POST['kr-answer'])){
	$izzipay_r = json_decode($_POST['kr-answer'], TRUE);
	$_token = uniqid('fk-srWong'); // TRANSACTION DATE
	$transactionDate = $izzipay_r['serverDate']; // TRANSACTION DATE
	$datetransacString = strtotime($transactionDate);
	$trans_date = date('Y-m-d H:i:s',$datetransacString);
	$orderStatus = $izzipay_r['orderStatus']; // ORDER STATUS
	$orderID = $izzipay_r['orderDetails']['orderId']; // ORDERID
	$currency = $izzipay_r['orderDetails']['orderCurrency']; // CURRENCY
	$payment_gateway_name = "IzziPay"; // PAYMENT GATEWAY NAME
	$credit_card_brand = $izzipay_r['transactions'][0]['transactionDetails']['cardDetails']['effectiveBrand']; // CREDIT CARD BRAND
	$ammountTotal = $izzipay_r['orderDetails']['orderTotalAmount']; // MONTO TOTAL
	$convertAmmount = (int)$ammountTotal / 100;

	echo "UNIQID => " . $_token . "<br>";
	echo "FECHA PAGO => " . $trans_date . "<br>";
	echo "ESTADO DE PAGO => " . $orderStatus . "<br>";
	echo "ID DE PAGO => " . $orderID . "<br>";
	echo "NOMBRE DEL MÉTODO DE PAGO => ". $payment_gateway_name . "<br>";
	echo "MONEDA => " . $currency . "<br>";
	echo "MONTO => " . $convertAmmount . "<br>";
	echo "TARGETA => " . $credit_card_brand . "<br>";
	if($orderStatus == "PAID"){
		echo "-------- Pagado";
	}else{
		echo "-------- In Process";
	}
}else{
	header("Location: ./");
}