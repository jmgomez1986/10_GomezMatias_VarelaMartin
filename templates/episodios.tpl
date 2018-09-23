{include file="header.tpl"}

   <div class="contenidoTemporadasEpisodios" name="top">

     <table class="tablaTemporadas">
       <thead>
         <tr>
           <th class="fondoTh">Episodio N°</th>
           <th class="fondoTh">Titulo</th>
           <th class="fondoTh">Descripcion</th>
         </tr>
       </thead>

       <tbody>
          {foreach from=$episodios item=episodio}
           <tr class="font-weight-bold">
             <td class="fondoTd">{$episodio["id_episode"]}</td>
             <td class="fondoTd">{$episodio["episode_title"]}</td>
             <td class="fondoTd">{$episodio["episode_desc"]}</td>
             <td class="fondoTd"><a href="editarEpis/{$episodio["id_season"]}/{$episodio["id_episode"]}">EDITAR</a></td>
           </tr>
          {/foreach}
       </tbody>
     </table>

{include file="footer.tpl"}
