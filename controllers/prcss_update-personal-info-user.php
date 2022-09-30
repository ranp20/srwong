<?php
$r = "";
if(isset($_POST) && $_POST != "" && $_POST['prf_usval-idcli'] != "" && $_POST['prf_usval-idcli'] != null){
	$f_name = (isset($_POST['prf_usval-f-name']) && $_POST['prf_usval-f-name'] != "") ? $_POST['prf_usval-f-name'] : "";
	$l_name = (isset($_POST['prf_usval-l-name']) && $_POST['prf_usval-l-name'] != "") ? $_POST['prf_usval-l-name'] : "";
	$telephone = (isset($_POST['prf_usval-telf']) && $_POST['prf_usval-telf'] != "") ? $_POST['prf_usval-telf'] : 0;
	$id_t_doc = (isset($_POST['prof_usval-t-doc']) && $_POST['prof_usval-t-doc'] != "") ? $_POST['prof_usval-t-doc'] : 0;
	$n_doc = (isset($_POST['prf_usval-ndoc'])) ? $_POST['prf_usval-ndoc'] : 0;
	$id_cli = (isset($_POST['prf_usval-idcli'])) ? $_POST['prf_usval-idcli'] : 0;

	$arr_postSettings = [
		"f_name" => $f_name,
		"l_name" => $l_name,
		"telephone" => $telephone,
		"id_t_doc" => $id_t_doc,
		"n_doc" => $n_doc,
		"idcli" => $id_cli
	];
	require_once '../model/users.php';
	$user = new Users();
	$update = $user->update_personalinfo($arr_postSettings);
	if($update == "true"){
		$r = array(
			'r' => 'true'
		);
	}else{
		$r = array(
			'r' => 'err_upd'
		);	
	}
}else{
	$r = array(
		'r' => 'false'
	);
}
die(json_encode($r));