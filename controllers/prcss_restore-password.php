<?php
$r = "";
if(isset($_POST) && $_POST != ""){
    
    require_once '../model/users.php';
	$users = new Users();
	$list_dataclient = $users->list_password_bytoken($_POST['tokenreturn']);
	$idcli = $list_dataclient[0]['id'];
	
	$arr_update_pass = [
		"password" => password_hash($_POST['pass_restore'], PASSWORD_BCRYPT, array('cost' => 12)),
		"id" => $idcli
	];

	$update_passcli = $users->update_password_byid($arr_update_pass);
	if(!empty($update_passcli) && $update_passcli == "true"){
		$update_token_byid = $users->update_token_byid($arr_update_pass['id']);
		if(!empty($update_token_byid) && $update_token_byid == "true"){
			$r = array(
				'r' => 'true'
			);
		}else{
			$r = array(
				'r' => 'false'
			);
		}
	}else{
	 	$r = array(
            'r' => 'false'
        );
	}
}else{
    $r = array(
        'r' => 'false'
    );
}
die(json_encode($r));