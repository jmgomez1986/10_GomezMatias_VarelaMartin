<?php

if ( isset($_POST["idTemp"]) && isset($_POST["idEpis"]) ){


  $recaptcha = $_POST["g-recaptcha-response"];
  $url = 'https://www.google.com/recaptcha/api/siteverify';
  $data = http_build_query( array( 'secret'   => '6Lf9l3kUAAAAAHvx3L_UPaWJf0EyaDKwS-SxiFxe',
  'response' => $recaptcha,
  'remoteip' => $_SERVER['REMOTE_ADDR']
  )
  );
  $options = array(
    'http' =>
    array(
      'method'  => 'POST',
      'header'  => 'Content-type: application/x-www-form-urlencoded',
      'content' => $data
    )
  );
  $context = stream_context_create($options);
  $verify = file_get_contents($url, false, $context);
  $captcha_success = json_decode($verify);

  if ( $captcha_success->success ){
    echo 'OK';
  }else{
    echo 'NOK';
  }
}

?>
