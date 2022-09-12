<?php
$r = "";
if(isset($_POST) && count($_POST) > 0){
  if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST['u-reg_email'])){
    if(preg_match('/^[0-9a-zA-Z]+$/', $_POST['u-reg_password'])){
      require_once '../model/users.php';
      $user       = new Users();
      $verifymail = $user->verify_email($_POST['u-reg_email']);

      if($verifymail == "true"){
        $r = array(
          'r' => 'equals',
        );
      }else{
        $_token       = md5($_POST['u-reg_email'] . $_POST['u-reg_password']);
        $pass         = password_hash($_POST['u-reg_password'], PASSWORD_BCRYPT, array('cost' => 12));
        $arr_userdata = [
          '_token'   => $_token,
          'username' => $_POST['u-reg_name'],
          'email' => $_POST['u-reg_email'],
          'password' => $pass,
        ];
        $validate = $user->add($arr_userdata);

        if($validate == "true"){

          $getdata = $user->get_users($arr_userdata['email']);

          if(count($getdata) > 0){
            session_start();
            $_SESSION['usr-logg_srwong'] = $getdata[0];
            $r = array(
              'r' => 'true',
              'received' => $getdata[0],
            );
          }else{
            $r = array(
              'r' => 'err_insert',
            );
          }
        }else{
          $r = array(
            'r' => 'err_insert',
          );
        }
      }
    }else{
      $r = array(
        'r' => 'err_pass',
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