{include file="header.tpl"}
<!-- <h1>{$titulo}</h1> -->

    <div class="container">
      <h2>Edicion de Temporada {$episodio["id_season"]} episodio {$episodio["id_episode"]}</h2>
      <form method="post" action="guardarEditarE id="confirmationForm">
        <input type="hidden" class="form-control" id="idTemp" name="idTemp" value="{$episodio["id_season"]}">
        <input type="hidden" class="form-control" id="idEpis" name="idEpis" value="{$episodio["id_episode"]}">

        <div class="form-group">
          <label for="tituloForm">Titulo</label>
          <input type="text" class="form-control" id="idEpis" name="tituloForm" value="{$episodio["episode_title"]}">
        </div>

        <div class="form-group">
          <label for="descForm">Descripción</label>
          <textarea name="descripcion" id="descripcion" form="confirmationForm">{$episodio["episode_desc"]}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Editar Episodio</button>
      </form>
    </div>
{include file="footer.tpl"}