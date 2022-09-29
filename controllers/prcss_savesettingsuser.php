<?php
session_start();
$r = "";
// print_r($_POST);
// exit();
if(isset($_GET['action']) && $_GET['action'] == "SaveChanges" && isset($_GET['assoc'])){
	$arr_postSettings = [];

	// ------------ AJUSTES - HOME
	if($_GET['assoc'] == 'prf-profile_dataperinfo'){
		if(isset($_POST) && count($_POST) > 0){
			// INFORMACIÓN GENERAL
			$f_name = (isset($_POST['prf_usval-f-name']) && $_POST['prf_usval-f-name'] != "") ? $_POST['prf_usval-f-name'] : "";
			$l_name = (isset($_POST['prf_usval-l-name']) && $_POST['prf_usval-l-name'] != "") ? $_POST['prf_usval-l-name'] : "";
			$telephone = (isset($_POST['prf_usval-telf']) && $_POST['prf_usval-telf'] != "") ? $_POST['prf_usval-telf'] : 0;
			$id_t_doc = (isset($_POST['prof_usval-t-doc']) && $_POST['prof_usval-t-doc'] != "") ? $_POST['prof_usval-t-doc'] : 0;
			$n_doc = (isset($_POST['prf_usval-ndoc'])) ? $_POST['prf_usval-ndoc'] : 0;

			$arr_postSettings = [
				"f_name" => $f_name,
				"l_name" => $l_name,
				"telephone" => $telephone,
				"id_t_doc" => $id_t_doc,
				"n_doc" => $n_doc
			];
		}else{
			$r = array(
				'res' => 'false'
			);
		}
	}

	
	// require_once 'connection.php';
	$sql = "";
	foreach($arr_postSettings as $key => $valor){
		echo "<pre>";
		echo $valor;
		echo "</pre>";
		/*
		$sql_valid = "SELECT setting_name FROM tbl_settings WHERE setting_name = '".$key."'";
		$row_valid = $con_u->query($sql_valid);
		$numb_rows = $row_valid->rowCount();
		if($numb_rows > 0){
			$sql = "UPDATE tbl_settings SET setting_value = '".$valor."' WHERE setting_name = '".$key."'";
		}else{
			$sql = "INSERT INTO tbl_settings (setting_name, setting_value) VALUES ('".$key."','".$valor."')";
		}
		$sql_db = $sql;
		$result = $con_u->prepare($sql_db);
		$result->execute();
		if($result == true){
			$r = array(
				'res' => 'updated',
				'message' => 'Éxito, se ha actualizado el registro correctamente.'
			);
		}else{
			$r = array(
				'res' => 'not-updated',
				'message' => 'Error, lo sentimos hubo un error al actualizar el registro.'
			);
		}
		*/
	}
	
}else{
	$r = array(
		'res' => 'false'
	);
}
die(json_encode($r));