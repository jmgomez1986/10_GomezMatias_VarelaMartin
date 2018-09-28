{include file="header.tpl"}

  {include file="adminToolsT.tpl"}

  <div class="contenidoTemporadasEpisodios" name="top">
     <table class="tablaTemporadas">
       <thead>
         <tr>
           <th class="fondoTd" rowspan="2">Temporada</th>
           <th class="fondoTd" rowspan="2">Episodios</th>
           <th class="fondoTd" colspan="2">Emisión original</th>
         </tr>
         <tr>
           <th class="fondoTd">Inicio</th>
           <th class="fondoTd">Final</th>
         </tr>
       </thead>

       <tbody>
          {foreach from=$temporadas item=temporada}
           <tr>
             <td><a href="temporada/{$temporada["id_season"]}/episodios" target= "_self">{$temporada["id_season"]}</td>
             <td>{$temporada["cant_episodes"]}</td>
             <td>{$temporada["season_begin"]}</td>
             <td>{$temporada["season_end"]}</td>
           </tr>
          {/foreach}
       </tbody>
     </table>
   </div>

  {include file="adminToolsE.tpl"}

  {include file="episodios.tpl" pages=$episodios}

{include file="footerAdmin.tpl"}
