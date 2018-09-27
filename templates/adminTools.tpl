{include file="header.tpl"}

  <form class="formAdmin" method="post">
    <div class="form-row mt-3">
      <div class="mb-3 mb-sm-3">
        <select class="js-eleccionT input-lg">
          <option value="0" selected>Temporadas...</option>
          {foreach from=$temporadas item=temporada}
            <option value="{$temporada["id_season"]}">Temporada N° {$temporada["id_season"]}</option>
          {/foreach}
        </select>
      </div>

      <div class="ml-3">
        <select class="js-eleccionE input-lg">
          <option selected>Episodios...</option>
            {foreach from=$episodios item=episodio}
              <option value="{$episodio["id_season"]}">{$episodio["id_season"]}Episodio N° {$episodio["id_episode"]} - {$episodio["episode_title"]}</option>
            {/foreach}
        </select>
      </div>
      <div class="px-2">
        <button class="js-edt btn btn-success btn-sm" type="submit">Editar Temporada</button>
      </div>     
      <div class="px-2">
        <button class="js-eds btn btn-success btn-sm" type="submit">Editar Episodio</button>
      </div>
      <div class="px-2">
        <button class="js-elt btn btn-success btn-sm" type="submit">Eliminar Temporada</button>
      </div>
      <div class="px-2">
        <button class="js-ele btn btn-success btn-sm" type="submit">Eliminar Episodio</button>
      </div>      
      <div class="px-2">
        <button class="js-agt btn btn-success btn-sm" type="submit">Agregar Temporada</button>
      </div>
      <div class="px-2">
        <button class="js-age btn btn-success btn-sm" type="submit">Agregar Episodio</button>
      </div>

    </div>
  </form>

{include file="footer.tpl"}
