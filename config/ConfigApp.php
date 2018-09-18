<?php

class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
                                ''=> 'TareasController#Home',
                                'home'      => 'TemporadasController#Home',
                                'temporadas'=> 'TemporadasController#Temporadas',
                             ];

}

 ?>
