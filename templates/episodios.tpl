   <div class="contenidoTemporadasEpisodios" name="top">

     <table class="tablaTemporadas table">
       <thead>
         <tr>
           <th class="fondoTh">Temporada N°</th>
           <th class="fondoTh">Episodio N°</th>
           <th class="fondoTh">Titulo</th>
           <th class="fondoTh"></th>
         </tr>
       </thead>

       <tbody>
          {foreach from=$episodios item=episodio}
             <tr class="font-weight-bold">
               <td class="fondoTd js-ocultar">{$episodio["id_season"]}</td>
               <td class="fondoTd"><a href="temporadaE/{$episodio["id_season"]}/episodio/{$episodio["id_episode"]}" target= "_self">{$episodio["id_episode"]}</td>
               <td class="fondoTd">{$episodio["episode_title"]}</td>
               <td class="fondoTd"><a class="badge badge-dark" href="comentarios/temporada/{$episodio["id_season"]}/episodio/{$episodio["id_episode"]}" target= "_self">Comentarios</a></td>
             </tr>
          {/foreach}
       </tbody>
     </table>

    </div>
