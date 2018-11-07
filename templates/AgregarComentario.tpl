{include file="header.tpl"}

    <h1 class="titulo">Agregar comentario</h1>

    <div class="container  mt-4">

      <form method="post" action="guardarComentario" id="confirmationForm">

        <input type="hidden" class="form-control" id="idUser" name="idUser" value="{$id_user}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Temporada Nº</label>
          <input enabled type="number" class="form-control" id="idTemp" name="idTemp" value="{$id_temporada}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Episodio Nº</label>
          <input enabled type="number" class="form-control" id="idEp" name="idEp" value="{$id_episodio}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="descForm">Comentario:</label>
          <textarea name="comment" class="form-control" rows="5" id="comment" form="confirmationForm"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-4 mt-2">Agregar comentario</button>
      </form>
    </div>

{include file="footer.tpl"}
