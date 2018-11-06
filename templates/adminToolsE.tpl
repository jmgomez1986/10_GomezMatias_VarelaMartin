  <form class="formAdminE" method="post">
    <div class="form-row mt-3">
      <div class="mb-3 mb-sm-3">
        <select class="js-eleccionTE input-lg ml-4">
          <option name="0" selected>Temporadas...</option>
          {foreach from=$temporadas item=temporada}
            <option value="{$temporada["id_season"]}" name="{$temporada["id_season"]}">Temporada N° {$temporada["id_season"]}</option>
          {/foreach}
        </select>
      </div>

      <div class="ml-3">
        <select class="js-eleccionE input-lg">
          <option name="0" selected>Episodios...</option>
            {foreach from=$episodios item=episodio}
              <option value="{$episodio["id_season"]}" name="{$episodio["id_episode"]}">Episodio N° {$episodio["id_episode"]} - {$episodio["titulo"]}</option>
            {/foreach}
        </select>
      </div>

      <div class="px-2">
        <button class="js-ede btn btn-success btn-sm" type="submit">Editar</button>
      </div>
      <div class="px-2">
        <button class="js-ele btn btn-success btn-sm" type="submit">Eliminar</button>
      </div>
      <div class="px-2">
        <button class="js-age btn btn-success btn-sm" type="submit">Agregar</button>
      </div>

    </div>
  </form>
