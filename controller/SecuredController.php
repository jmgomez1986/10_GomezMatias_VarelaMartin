	<?php

	class SecuredController{

		function __construct(){

			session_start();

			if ( isset($_SESSION['usuario']) ){

				if ( isset($_SESSION['LAST_ACTIVITY'])  && ( time() - $_SESSION['LAST_ACTIVITY'] > 100000000000 ) ){
					$this->logout();
					header(LOGIN . "/timeout");
					exit();
				}
				else{
					$_SESSION['LAST_ACTIVITY'] = time(); // Actualiza el último instante de actividad
				}
			}
			else{
				header(LOGIN . "/userFail");
				exit();
			}
		}

	  function logout(){
			session_start();
	    session_destroy();
		}

	} //END CLASS

?>
