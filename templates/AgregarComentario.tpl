{include file="header.tpl"}

    <h1 class="titulo">Agregar comentario</h1>

    <div class="container  mt-4">

      <form class="formAddComment" id="confirmationForm">

        <input type="hidden" class="form-control idUser" id="idUser" name="idUser" value="{$id_user}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Temporada Nº</label>
          <input enabled type="number" class="form-control idTemp" id="idTemp" name="idTemp" value="{$id_temporada}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Episodio Nº</label>
          <input enabled type="number" class="form-control idEpis" name="idEpis" value="{$id_episodio}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="descForm">Comentario:</label>
          <textarea name="comment" class="form-control comment" rows="5" id="comment" form="confirmationForm"></textarea>
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="tituloForm">Puntaje</label>
          <input enabled type="number" class="form-control score" name="score">
        </div>

        <button type="button" class="btn btn-primary mb-4 mt-2 js-submitAddComment">Agregar comentario</button>
      </form>
    </div>

{include file="footer.tpl"}
