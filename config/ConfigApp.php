<?php

    define('TEMPUSER', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                        dirname($_SERVER["PHP_SELF"]). '/temporadasUser');
    define('TEMPO', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                    dirname($_SERVER["PHP_SELF"]). '/temporadas');
    define('LOGIN', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                    dirname($_SERVER["PHP_SELF"]). '/login');
    define('LOGOUT', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                    dirname($_SERVER["PHP_SELF"]). '/logout');
    define('HOME', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                    dirname($_SERVER["PHP_SELF"]). '/home');
    define('USERS', 'Location: //'.$_SERVER["SERVER_NAME"]. ':' . $_SERVER['SERVER_PORT'] .
                    dirname($_SERVER["PHP_SELF"]). '/usuarios');

    class ConfigApp
    {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                        ''                     => 'GotController#home',
                                        'home'                 => 'GotController#home',
                                        'map'                  => 'GotController#map',
                                        'casasGOT'             => 'GotController#casas',
                                        'casas'                => 'CasasController#casas',
                                        'temporadas'           => 'TemporadasController#temporadas',
                                        'temporadasUser'       => 'TemporadasUserController#temporadasUser',
                                        'editarT'              => 'TemporadasUserController#editarTemporada',
                                        'guardarEditarT'       => 'TemporadasUserController#guardarEditarTemporada',
                                        'temporada'            => 'TemporadasController#episodios',
                                        'temporadaE'           => 'TemporadasController#episodios',
                                        'editarE'              => 'TemporadasUserController#editarEpisodio',
                                        'guardarEditarE'       => 'TemporadasUserController#guardarEditarEpisodio',
                                        'eliminarE'            => 'TemporadasUserController#eliminarEpisodio',
                                        'agregarE'             => 'TemporadasUserController#agregarEpisodio',
                                        'guardarAgregarE'      => 'TemporadasUserController#guardarAgregarEpisodio',
                                        'agregarT'             => 'TemporadasUserController#agregarTemporada',
                                        'guardarAgregarT'      => 'TemporadasUserController#guardarAgregarTemporada',
                                        'eliminarT'            => 'TemporadasUserController#eliminarTemporada',
                                        'login'                => 'LoginController#login',
                                        'logout'               => 'LoginController#logout',
                                        'verificarLogin'       => 'LoginController#verifyLogin',
                                        'registro'             => 'RegistroController#registro',
                                        'Registrar'            => 'RegistroController#registrar',
                                        'comentarios'          => 'ComentariosController#getComentarios',
                                        'agregarComentario'    => 'ComentariosController#agregarComentarioForm',
                                        'validarCaptcha'       => 'ComentariosController#validarCaptcha',
                                        'mostrarImagenes'      => 'TemporadasUserController#mostrarImagenes',
                                        'eliminarImagen'       => 'TemporadasUserController#eliminarImagen',
                                        'usuarios'             => 'UsuariosAdminController#getUsuarios',
                                        'guardarAdminUsuarios' => 'UsuariosAdminController#guardarAdminUsuarios'
                                    ];

        public static $DBname       = 'gameofthrones_db';
        public static $host         = "localhost";
        public static $DBuser       = 'root';
        public static $DBpass       = '';
    }
