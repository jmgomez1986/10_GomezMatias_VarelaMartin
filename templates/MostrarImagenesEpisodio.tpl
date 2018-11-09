{include file="header.tpl"}

      <form class="formAdminEliminarImagen m-3 text-center" method="post" action="EliminarImagen/{$id_season}/{$id_episode}">

        {foreach from=$imagenes item=imagen}
          <div class="flex-column align-items-center float-left">
            <div class="custom-control custom-checkbox align-items-center mb-5">
              <input type="checkbox" class="custom-control-input" id="{$imagen["id_image"]}" name="ID[]" value="{$imagen["id_image"]}">
              <label class="custom-control-label" for="{$imagen["id_image"]}"></label>
            </div>
            <img class="episodioImg rounded m-1" src="{$imagen["path_img"]}" alt="Imagen de Temporada {$imagen["id_season"]}, Episodio {$imagen["id_episode"]}">
          </div>
        {/foreach}

        <div class="clearfix"></div>

        <button class="btn btn-success btn-sm" type="submit">Eliminar Imagenes Selecionadas</button>

      </form>

{include file="footer.tpl"}
