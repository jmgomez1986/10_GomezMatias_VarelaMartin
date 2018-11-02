<?php

    define('TEMPADMIN', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/temporadasAdmin');
    define('TEMPO', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/temporadas');
    define('LOGIN', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/login');
    define('LOGOUT', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/logout');
    define('HOME', 'Location: //'.$_SERVER["SERVER_NAME"]. ":". $_SERVER['SERVER_PORT'] . dirname($_SERVER["PHP_SELF"]). '/home');

    class ConfigApp{
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''                => 'GotController#Home',
                                    'home'            => 'GotController#Home',
                                    'map'             => 'GotController#Map',
                                    'casasGOT'        => 'GotController#Casas',
                                    'casas'           => 'CasasController#Casas',
                                    'temporadas'      => 'TemporadasController#Temporadas',
                                    'temporadasAdmin' => 'TemporadasAdminController#TemporadasAdmin',
                                    'editarT'         => 'TemporadasAdminController#EditarTemporada',
                                    'guardarEditarT'  => 'TemporadasAdminController#GuardarEditarTemporada',
                                    'temporada'       => 'TemporadasController#Episodios',
                                    'editarE'         => 'TemporadasAdminController#EditarEpisodio',
                                    'temporadaE'      => 'TemporadasController#Episodio',
                                    'guardarEditarE'  => 'TemporadasAdminController#GuardarEditarEpisodio',
                                    'eliminarE'       => 'TemporadasAdminController#EliminarEpisodio',
                                    'agregarE'        => 'TemporadasAdminController#AgregarEpisodio',
                                    'guardarAgregarE' => 'TemporadasAdminController#GuardarAgregarEpisodio',
                                    'agregarT'        => 'TemporadasAdminController#AgregarTemporada',
                                    'guardarAgregarT' => 'TemporadasAdminController#GuardarAgregarTemporada',
                                    'eliminarT'       => 'TemporadasAdminController#EliminarTemporada',
                                    'login'           => 'LoginController#login',
                                    'logout'          => 'LoginController#logout',
                                    'verificarLogin'  => 'LoginController#verifyLogin',
                                    'registro'        => 'RegistroController#Registro',
                                    'Registrar'       => 'RegistroController#Registrar'
                                ];
        }

 /*
 		.../temporadas                (lista de todas las temporadas de la serie)
 		.../temporada/1               (lista de todos los episodios de la temporada 1)
 		.../temporada/episodio/1/2    (lista de la temporada 1 y episodio 2)
 		.../episodios                 (lista de todos los episodios de la serie)
 		.../episodio/1                (lista de todos los episodios 1)
 */

?>
