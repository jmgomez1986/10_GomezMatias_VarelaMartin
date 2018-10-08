{include file="header.tpl"}

    <h1 class="titulo mt-5 mb-5">{$titulo} {$episodio["id_episode"]} de Temporada {$episodio["id_season"]} </h1>

    <div class="container">
      <form method="post" action="guardarEditarE" id="confirmationForm">
        <input type="hidden" class="form-control" id="idTemp" name="idTemp" value="{$episodio["id_season"]}">
        <input type="hidden" class="form-control" id="idEpis" name="idEpis" value="{$episodio["id_episode"]}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Titulo</label>
          <input type="text" class="form-control" id="idEpis" name="tituloForm" value="{$episodio["episode_title"]}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="descForm">Descripción</label>
          <textarea class="form-control" rows="5" name="descripcion" id="descripcion" form="confirmationForm">{$episodio["episode_desc"]}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-4 mb-5">Editar Episodio</button>
      </form>
    </div>

{include file="footer.tpl"}
