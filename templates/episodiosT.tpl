{include file="header.tpl"}

     <div class="contenidoTemporadasEpisodios" name="top">

       <table class="tablaTemporadas table">
         <thead>
           <tr>
             <th class="fondoTh">Episodio N°</th>
             <th class="fondoTh">Titulo</th>
             <th class="fondoTh">Descripcion</th>
             <th class="fondoTh">Imagenes</th>

           </tr>
         </thead>

         <tbody>
            {foreach from=$episodios item=episodio}
               <tr class="font-weight-bold">
                 <td class="fondoTd colE5">{$episodio["id_episode"]}</td>
                 <td class="fondoTd colE10">{$episodio["titulo"]}</td>
                 <td class="fondoTd colE40">{$episodio["descripcion"]}</td>
                 <td class="fondoTd colE40"><img src="{$episodio["imagen"]}" alt="Imagen de Temporada {$episodio["id_season"]}, Episodio {$episodio["id_episode"]}"></td>
               </tr>
            {/foreach}
         </tbody>
       </table>
    </div>

{include file="footer.tpl"}
