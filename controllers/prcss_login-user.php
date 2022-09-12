<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
  if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['u-email'])){
    $arr_reguser = [
      'email' => $_POST['u-email'],
      'password' => $_POST['u-password']
    ];
    require_once '../model/users.php';
    $user = new Users();
    $verifyemail = $user->get_usersverifylogin($arr_reguser['email']);
    if($verifyemail != "" && count($verifyemail) > 0){
      if(password_verify($arr_reguser['password'], $verifyemail[0]['password'])){
        $getdata = $user->get_users($arr_reguser['email']);

        if(count($getdata) > 0){
          session_start();
          $_SESSION['usr-logg_srwong'] = $getdata[0];

          $r = array(
            'r' => 'true',
            'received' => $getdata[0],
          );
        }else{
          $r = array(
            'r' => 'false',
          );
        }
      }else{
        $r = array(
          'r' => 'err_notequalpass',
        );
      }
    }else{
      $r = array(
        'r' => 'err_emailnotexist',
      );
    }
  }else{
    $r = array(
      'r' => 'err_email',
    );
  }
}else{
  $r = array(
    'r' => 'false',
  );
}
die(json_encode($r));