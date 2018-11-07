{include file="header.tpl"}

     <div class="contenidoTemporadasEpisodios">

       <table class="tablaTemporadas table">

         <thead>
           <tr>
             <th class="fondoTh ">Episodio N°</th>
             <th class="fondoTh">Titulo</th>
             <th class="fondoTh">Descripcion</th>
             <th class="fondoTh">Imagenes</th>
           </tr>
         </thead>

         <tbody>
            {foreach from=$episodios item=episodio}
              <tr class="font-weight-bold">
                 <td class="fondoTd colE5 align-middle">{$episodio["id_episode"]}</td>
                 <td class="fondoTd colE10 align-middle">{$episodio["titulo"]}</td>
                 <td class="fondoTd colE40 align-middle text-justify">{$episodio["descripcion"]}</td>
                 <td class="fondoTd colE40">
                  <div class="contenidoImg">
                    {foreach from=$episodio["imagenes"] item=imagen}
                      <div class="">
                        <img class="episodioImg img-fluid rounded float-left m-1 d-block" src="{$imagen}" alt="Imagen de Temporada {$episodio["id_season"]}, Episodio {$episodio["id_episode"]}">
                      </div>
                    {/foreach}
                  </div>
                </td>
               </tr>
            {/foreach}
         </tbody>
       </table>
    </div>

{include file="footer.tpl"}
