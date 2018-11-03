{include file="header.tpl"}

    <div class="dialog" title="Mensajes">

    </div>

    {if $logueado}
      {if $rol == 'Administrador'}
        {include file="adminToolsE.tpl"}
      {/if}
    {/if}

    <div class="contenidoTemporadasEpisodios" name="top">
       <table class="tablaTemporadas">
         <thead>
           <tr>
             <th class="fondoTh" rowspan="2">Temporada</th>
             <th class="fondoTh" rowspan="2">Episodios</th>
             <th class="fondoTh" colspan="2">Emisión original</th>
           </tr>
           <tr>
             <th class="fondoTh">Inicio</th>
             <th class="fondoTh">Final</th>
           </tr>
         </thead>

         <tbody>
            {foreach from=$temporadas item=temporada}
             <tr>
               <td class="fondoTd"><a href="temporada/{$temporada["id_season"]}/episodios" target= "_self">{$temporada["id_season"]}</td>
               <td class="fondoTd">{$temporada["cant_episodes"]}</td>
               <td class="fondoTd">{$temporada["season_begin"]}</td>
               <td class="fondoTd">{$temporada["season_end"]}</td>
             </tr>
            {/foreach}
         </tbody>
       </table>
     </div>

    {if $logueado}
      {if $rol == 'Administrador'}
        {include file="adminToolsE.tpl"}
      {else}
        {include file="filtroCategoria.tpl"}
      {/if}
    {/if}

    {include file="episodios.tpl"}

{include file="footer.tpl"}
