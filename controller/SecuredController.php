	<?php

	class SecuredController{

		function __construct(){
			session_start();
			if ( isset($_SESSION['usuario']) ){

				if (  isset($_SESSION['LAST_ACTIVITY'])  && ( time() - $_SESSION['LAST_ACTIVITY'] > 10 ) ){
					$this->logout();
					header(LOGIN);
					exit();
				}else{
						$_SESSION['LAST_ACTIVITY'] = time(); // actualiza el último instante de actividad
				}
			}
			else{
				header(LOGIN);
				exit();
			}
		}

	  function logout(){
				session_start();
	    session_destroy();
		}
	} //END CLASS

?>
