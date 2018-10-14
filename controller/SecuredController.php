<?php

	class SecuredController{

		function __construct(){
	    session_start();
	    if(isset($_SESSION['User'])){
				// echo "<h1 style=\"color:red;\">" . $_SESSION['User'] . "</h1></br>";
	      if ( isset($_SESSION['LAST_ACTIVITY']) ){
					//echo "<h1 style=\"color:red;\">" . $_SESSION['LAST_ACTIVITY'] . "</h1></br>";
				 	if ( time() - $_SESSION['LAST_ACTIVITY'] > 10 ){
						//echo "<h1 style=\"color:red;\">" . time() . "</h1>";
	        	$this->logout();
						header(TEMP);
					}
	      }
				//else{
	      	$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
				//}
			}
			else{
		    header(LOGIN);
		  }
	  }

	  function logout(){
	    session_start();
	    session_destroy();
	  }
	} //END CLASS

?>
