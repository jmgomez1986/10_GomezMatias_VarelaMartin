<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
                                // ''=> 'TemporadasController#Home',
                                // 'home'      => 'TemporadasController#Home',
                                ''             => 'TemporadasController#Temporadas',
                                'home'         => 'TemporadasController#Temporadas',
                                'temporadas'   => 'TemporadasController#Temporadas',
                                'editar'       => 'TemporadasController#EditarTemporada',
                                'guardarEditar'=> 'TemporadasController#GuardarEditarTemporada',
                             ];

}

 ?>
