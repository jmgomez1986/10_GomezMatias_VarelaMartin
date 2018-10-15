<?php

	class SecuredController{

		function __construct(){
	    session_start();
	    if ( isset($_SESSION["User"]) ){
				 //echo "<h1 style=\"color:red;\">" . $_SESSION["User"] . "</h1></br>";
	      if ( ( isset($_SESSION['LAST_ACTIVITY']) ) && ( time() - $_SESSION['LAST_ACTIVITY'] > 10 ) ){
	        	$this->logout();
						header(TEMP);
						// throw new Exception('Sin tiempo de actividad');
					}
      	$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
			}
			else{
				// header(LOGIN);
				// throw new Exception('Sin usuario logueado');
		  }
	  }

	  function logout(){
	    session_start();
	    session_destroy();
	  }

	} //END CLASS

?>
