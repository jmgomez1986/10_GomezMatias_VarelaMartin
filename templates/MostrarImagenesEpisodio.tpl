{include file="header.tpl"}

      <form class="formAdminEliminarImagen m-3 text-center" method="post" action="eliminarImagen/{$id_season}/{$id_episode}">

          <div class="row">
            {foreach from=$imagenes item=imagen}
              <div class="col-md-2">
                <div class="custom-control custom-checkbox mb-5">
                  <input type="checkbox" class="custom-control-input" id="{$imagen["id_image"]}" name="ID[]" value="{$imagen["id_image"]}">
                  <label class="custom-control-label" for="{$imagen["id_image"]}"></label>
                </div>
                <img class="episodioElimImg rounded m-1" src="{$imagen["path_img"]}" alt="Imagen de Temporada {$imagen["id_season"]}, Episodio {$imagen["id_episode"]}">
              </div>
            {/foreach}
          </div>

        <div class="clearfix"></div>

        <button class="btn btn-success btn-m mt-5" type="submit">Eliminar Imagenes Selecionadas</button>

      </form>

{include file="footer.tpl"}
