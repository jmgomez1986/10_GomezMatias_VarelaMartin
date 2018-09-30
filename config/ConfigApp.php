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
 ?>
