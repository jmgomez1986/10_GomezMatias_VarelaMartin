{include file="header.tpl"}

   <div class="contenidoTemporadasEpisodios" name="top">

     <table class="tablaTemporadas table">
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
               <td class="fondoTd colE5">{$episodio["id_episode"]}</td>
               <td class="fondoTd colE10">{$episodio["episode_title"]}</td>
               <td class="fondoTd colE40">{$episodio["episode_desc"]}</td>
             </tr>
          {/foreach}
       </tbody>
     </table>
  </div>

{include file="footer.tpl"}
