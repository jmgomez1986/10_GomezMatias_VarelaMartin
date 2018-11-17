<?php
  if(isset($_POST["g-recaptcha-response"])){
    $recaptcha = $_POST["g-recaptcha-response"];
    $url = 'https://www.google.com/recaptcha/api/siteverify';

    $data = array(
          'secret' => '6Lf9l3kUAAAAAHvx3L_UPaWJf0EyaDKwS-SxiFxe',
          'response' => $recaptcha
      );

      $options = array(
              'http' => array (
                  'method' => 'POST',
                  'content' => http_build_query($data),
                  'header' => 'Content-Type: application/x-www-form-urlencoded'
              )
          );

          $context  = stream_context_create($options);
          $verify = file_get_contents($url, false, $context);
          $captcha_success = json_decode($verify);

    if ( $captcha_success->success ){
      echo 'OK';
    }else{
      echo 'NOK';
    }
  }


?>
