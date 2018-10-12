{include file="header.tpl"}

     <div class="contenidoTemporadasEpisodios table-responsive-sm">

       <table class="tablaTemporadas table table-sm table-bordered text-center">
         <thead>
           <tr>
             <th class="fondoTh" scope="col" rowspan="2">Temporada</th>
             <th class="fondoTh" scope="col" rowspan="2">Episodios</th>
             <th class="fondoTh" scope="col" colspan="2">Emisión original</th>
           </tr>
           <tr>
             <th class="fondoTh" scope="col" >Inicio</th>
             <th class="fondoTh" scope="col" >Final</th>
           </tr>
         </thead>

         <tbody>
            {foreach from=$temporadas item=temporada}
             <tr class="font-weight-bold">
               <td class="fondoTd "><a href="temporada/{$temporada["id_season"]}/episodios" target= "_self">{$temporada["id_season"]}</td>
               <td class="fondoTd">{$temporada["cant_episodes"]}</td>
               <td class="fondoTd">{$temporada["season_begin"]}</td>
               <td class="fondoTd">{$temporada["season_end"]}</td>
             </tr>
            {/foreach}

         </tbody>
       </table>
     </div>

    {include file="episodios.tpl"}

{include file="footer.tpl"}
