{include file="header.tpl"}

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
             <td>{$temporada["id_season"]}</td>
             <td>{$temporada["cant_episodes"]}</td>
             <td>{$temporada["season_begin"]}</td>
             <td>{$temporada["season_end"]}</td>
             <td><a href="editar/{$temporada["id_season"]}">EDITAR</a></td>
           </tr>
          {/foreach}

       </tbody>
     </table>

{include file="footer.tpl"}
