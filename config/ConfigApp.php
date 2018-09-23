<?php

    class ConfigApp
    {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''             => 'TemporadasController#Home',
                                    'home'         => 'TemporadasController#Home',
                                    'map'          => 'TemporadasController#Map',
                                    'casas'        => 'TemporadasController#Casas',
                                    'temporadas'   => 'TemporadasController#Temporadas',
                                    'editarT'       => 'TemporadasController#EditarTemporada',
                                    'guardarEditarT'=> 'TemporadasController#GuardarEditarTemporada',
                                    'temporada'    => 'TemporadasController#Episodios',
                                    'editarE'    => 'TemporadasController#EditarEpisodio',
                                    'guardarEditarE'=> 'TemporadasController#GuardarEditarEpisodio',

                                 ];
        }
 ?>
