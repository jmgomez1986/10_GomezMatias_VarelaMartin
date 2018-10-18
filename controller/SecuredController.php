	<?php

	class SecuredController{

		function __construct(){
			session_start();
			//echo "<h1 style=\"color:red;\">" . $_SESSION['usuario'] . "</h1></br>";
			if ( isset($_SESSION['usuario']) ){

				if (  isset($_SESSION['LAST_ACTIVITY'])  && ( time() - $_SESSION['LAST_ACTIVITY'] > 10 ) ){
					$this->logout();
					header(TEMPO);
				}
				$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
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
