{include file="header.tpl"}

    <h1 class="titulo">Agregar comentario</h1>

    <div class="container mt-4">

      <form class="formAddComment" id="confirmationForm" method="post" action="" >

        <input type="hidden" class="form-control idUser" id="idUser" name="idUser" value="{$id_user}">

        <div class="form-group">
          <label class="text-white font-weight-bold" for="idTemp">Temporada Nº</label>
          <input type="number" class="form-control idTemp" id="idTemp" name="idTemp" value="{$id_temporada}">
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="idEpis">Episodio Nº</label>
          <input type="number" class="form-control idEpis" id="idEpis" name="idEpis" value="{$id_episodio}">
        </div>

        <div class="form-group">
          <label class=" text-white font-weight-bold" for="comment">Comentario</label>
          <textarea name="comment" class="form-control comment" rows="5" id="comment" form="confirmationForm"></textarea>
        </div>

        <div class="form-group">
          <label class="text-white font-weight-bold" for="score">Puntaje</label>
          <input enabled type="number" class="form-control score" id="score" name="score" min="0" max="5">
        </div>

        <div class="">
          <p class="errorForm"></p>
        </div>

        <div class="g-recaptcha" data-sitekey="6Lf9l3kUAAAAAMtoVTGhrcnEkmj1s_kxLhM36yXC"></div>
        <!-- <input class="btn btn-primary m-2" type="submit" value="Agregar comentario"> -->
        <button type="submit" class="btn btn-primary mb-4 mt-2 js-submitAddComment">Agregar comentario</button>

      </form>
    </div>

{include file="footer.tpl"}
