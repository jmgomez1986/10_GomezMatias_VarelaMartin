<?php

    class ConfigApp
    {
        public static $ACTION = 'action';
        public static $PARAMS = 'params';
        public static $ACTIONS = [
                                    ''             => 'TemporadasController#Home',
                                    'home'         => 'TemporadasController#Home',
                                    'map'          => 'TemporadasController#Map',
                                    'casasGOT'     => 'TemporadasController#Casas',
                                    'temporadas'   => 'TemporadasController#Temporadas',
                                    'editar'       => 'TemporadasController#EditarTemporada',
                                    'guardarEditar'=> 'TemporadasController#GuardarEditarTemporada',
                                    'temporada'    => 'TemporadasController#Episodios',
                                    'editarEpis'   => 'TemporadasController#EditarEpisodio',
                                 ];
        }
 ?>
