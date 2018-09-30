<?php

class SecuredController{

	function __construct(){
    session_start();
    if(isset($_SESSION["User"])){
      if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
        $this->logout();
        header(TEMP);
      }else{
        $_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
      }
    }
  }

  function logout(){
    session_start();
    session_destroy();
  }

}
?>
