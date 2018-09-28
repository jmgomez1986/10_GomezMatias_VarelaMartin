<?php
    
    define('HOMEADMIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/temporadas');
    define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
    define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');

    class ConfigApp
    {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''               => 'TemporadasController#Home',
                                    'home'           => 'TemporadasController#Home',
                                    'map'            => 'TemporadasController#Map',
                                    'casasGOT'       => 'TemporadasController#Casas',
                                    'temporadas'     => 'TemporadasController#Temporadas',
                                    'editarT'        => 'TemporadasController#EditarTemporada',
                                    'guardarEditarT' => 'TemporadasController#GuardarEditarTemporada',
                                    'temporada'      => 'TemporadasController#Episodios',
                                    'editarE'        => 'TemporadasController#EditarEpisodio',
                                    'temporadaE'     => 'TemporadasController#Episodio',
                                    'guardarEditarE' => 'TemporadasController#GuardarEditarEpisodio',
                                    'login'          => 'LoginController#login',
                                    'verificarLogin' => 'LoginController#verifyLogin'
                                 ];
        }
 ?>
