<?php
if(isset($_POST) && $_POST != ""){
	$idcli = $_POST['idcli'];
	require_once '../model/Products.php';
	$tmpcart = new Products();
	$list = $tmpcart->listTmpCartByIdClient($idcli);
	echo "<pre>";
	print_r($list);
	echo "</pre>";
	// ALMACENAR EN LA SESIÓN DEL USUARIO EL LISTADO DE LOS PRODUCTOS DEL CARRITO
}else{
	header("Location: ../");
}