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
                                    'temporadasAdmin' => 'TemporadasAdminController#TemporadasAdmin',
                                    'editarT'         => 'TemporadasAdminController#EditarTemporada',
                                    'guardarEditarT'  => 'TemporadasAdminController#GuardarEditarTemporada',
                                    'temporada'       => 'TemporadasController#Episodios',
                                    'editarE'         => 'TemporadasAdminController#EditarEpisodio',
                                    'temporadaE'      => 'TemporadasController#Episodio',
                                    'guardarEditarE'  => 'TemporadasAdminController#GuardarEditarEpisodio',
                                    'eliminarE'       => 'TemporadasAdminController#EliminarEpisodio',
                                    'login'           => 'LoginController#login',
                                    'logout'          => 'LoginController#logout',
                                    'verificarLogin'  => 'LoginController#verifyLogin'
                                ];
        }
 ?>
