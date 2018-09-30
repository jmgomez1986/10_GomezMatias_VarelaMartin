<?php

    define('TEMPADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/temporadasAdmin');
    define('TEMP', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/temporadas');
    define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
    define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');
    define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/home');

    class ConfigApp
    {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''                => 'GotController#Home',
                                    'home'            => 'GotController#Home',
                                    'map'             => 'GotController#Map',
                                    'casasGOT'        => 'GotController#Casas',
                                    'temporadas'      => 'TemporadasController#Temporadas',
                                    'temporadasAdmin' => 'TemporadasController#TemporadasAdmin',
                                    'editarT'         => 'TemporadasController#EditarTemporada',
                                    'guardarEditarT'  => 'TemporadasController#GuardarEditarTemporada',
                                    'temporada'       => 'TemporadasController#Episodios',
                                    'editarE'         => 'TemporadasController#EditarEpisodio',
                                    'temporadaE'      => 'TemporadasController#Episodio',
                                    'guardarEditarE'  => 'TemporadasController#GuardarEditarEpisodio',
                                    'eliminarE'       => 'TemporadasController#EliminarEpisodio',
                                    'login'           => 'LoginController#login',
                                    'logout'          => 'LoginController#logout',
                                    'verificarLogin'  => 'LoginController#verifyLogin'
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
