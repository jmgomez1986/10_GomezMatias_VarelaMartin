{include file="header.tpl"}

    <h1>{$titulo}</h1>

    <div class="container">
      <h2>Agregar episodio a la Temporada {$id_temporada}</h2>
      <form method="post" action="guardarAgregarE" id="confirmationForm">
        <input type="hidden" class="form-control" id="idTemp" name="idTemp" value="{$id_temporada}">

        <div class="form-group">
          <label for="tituloForm">Episodio Nº</label>
          <input type="number" class="form-control" id="idEp" name="idEp" value="{$valoresEpisodio[1]}">
          {if $existencia ne ''}
            <p style="color:red;">El episodio ya existe!!!!</p>
          {/if}
        </div>

        <div class="form-group">
          <label for="tituloForm">Titulo</label>
          <input type="text" class="form-control" id="tituloE" name="tituloE" value="{$valoresEpisodio[2]}">
        </div>

        <div class="form-group">
          <label for="descForm">Descripción</label>
          <textarea name="descE" id="descE" form="confirmationForm">{$valoresEpisodio[3]}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Episodio</button>
      </form>
    </div>

{include file="footer.tpl"}
