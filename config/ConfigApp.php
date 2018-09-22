<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
                                // ''=> 'TareasController#Home',
                                // 'home'      => 'TemporadasController#Home',
                                ''             => 'TareasController#Temporadas',
                                'home'         => 'TemporadasController#Temporadas',
                                'temporadas'   => 'TemporadasController#Temporadas',
                                'editar'       => 'TemporadasController#EditarTemporada',
                                'guardarEditar'=> 'TemporadasController#GuardarEditarTemporada',
                             ];

}

 ?>
