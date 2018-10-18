	<?php

	class SecuredController{

		function __construct(){
			session_start();
			//echo "<h1 style=\"color:red;\">" . $_SESSION['usuario'] . "</h1></br>";
			if ( isset($_SESSION['usuario']) ){

				if (  isset($_SESSION['LAST_ACTIVITY'])  && ( time() - $_SESSION['LAST_ACTIVITY'] > 10 ) ){
					$this->logout();
					throw new Exception('Sin tiempo de actividad');
					//header(TEMPO);
				}else{
						$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
				}
			}
			else{
				throw new Exception('Sin usuario logueado');
				//header(LOGIN);
			}
		}

	  function logout(){

			if (session_status() === PHP_SESSION_NONE){
				session_start();
			}
	    session_destroy();
	  }
	} //END CLASS

?>
