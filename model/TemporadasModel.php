<?php

/**
*
*/

	class TemporadasModel{

		private $db;

		function __construct(){
			$this->db = $this->ConnectToDB();
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		private function ConnectToDB(){
			return new PDO('mysql:host=localhost;'.'dbname=gameofthrones_db;charset=utf8', 'root', '');
		}

		private function subirImagen($imagen){
			$destino_final = 'images/episodes/' . uniqid() . '.jpg';
			move_uploaded_file($imagen, $destino_final);
			return $destino_final;
		}

		private	function insertImg($idSeason, $idEpisode, $path){

			try{
				$sentencia = $this->db->prepare( "INSERT INTO episode_image (id_season, id_episode,	path_img)
				VALUES (?,?,?)" );
				$sentencia->execute( array($idSeason, $idEpisode, $path) );

				$last_id = $this->db->lastInsertId();

				$regInsert = $this->getEpisodioImg($last_id);

				return $regInsert;
			}

			catch(PDOException $exception){
				return $exception->getMessage();
			}

		}

		private function formatearEpisodio($episodio, $episodioImagenes){

			$episodioFormateado = array();
			$arregloEpisodio    = array();

			for ($i=0; $i < count($episodio); $i++) {
				$arregloEpisodio['id_season']   = $episodio[$i]['id_season'];
				$arregloEpisodio['id_episode']  = $episodio[$i]['id_episode'];
				$arregloEpisodio['titulo']      = $episodio[$i]['titulo'];
				$arregloEpisodio['descripcion'] = $episodio[$i]['descripcion'];
				$arregloEpisodio['imagenes'] = [];
				for ($j=0; $j < count($episodioImagenes); $j++) {
					if ( $episodioImagenes[$j]['id_season']  == $episodio[$i]['id_season'] &&
					$episodioImagenes[$j]['id_episode'] == $episodio[$i]['id_episode'] ){

						array_push($arregloEpisodio['imagenes'], $episodioImagenes[$j]['path_img']);
					}
				}
				array_push($episodioFormateado, $arregloEpisodio);
				$arregloEpisodio['imagenes'] = [];
				unset($arregloEpisodio);
			}

			return $episodioFormateado;
		}

		private function getEpisodioImagenes($id_temporada, $id_episodio=NULL){

			$parameters = array();

			//Se arma la condicion
			if ( isset($id_episodio)){
				$condicion  = 'id_season=? AND id_episode=?';
				array_push($parameters, $id_temporada);
				array_push($parameters, $id_episodio);
			}
			else{
				$condicion  = 'id_season=?';
				array_push($parameters, $id_temporada);
			}

			//Se obtienen los datos del episodio
			$sentencia = $this->db->prepare("SELECT *
				FROM episode
				WHERE	$condicion");

				$sentencia->execute( $parameters );

				$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

				//Se obtienen los datos de las imagenes
				$episodioImagenes = $this->getImagenes($id_temporada, $id_episodio);


				//Se unen los dos resultados
				$episodioFormateado = $this->formatearEpisodio($episodio, $episodioImagenes);

				return $episodioFormateado;
		}

		function getImagenes($id_season, $id_episode){

			$sentencia = $this->db->prepare("SELECT *
																					FROM episode_image
																					WHERE	id_season=? AND
																								id_episode=?");

			$sentencia->execute( array($id_season, $id_episode) );

			$episodioImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodioImagenes;
		}

		function getTemporadas(){

			$sentencia = $this->db->prepare("SELECT * FROM season");
			$sentencia->execute();
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporadas;

		}

		function getTemporada($id_temporada){

			$sentencia = $this->db->prepare("SELECT * FROM season WHERE id_season = ?");
			$sentencia->execute( array($id_temporada) );
			$temporada = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporada;

		}

		function getEpisodios($id_temporada){

			$episodios = $this->getEpisodioImagenes($id_temporada);

			return $episodios;
		}

		function getEpisodio($id_temporada, $id_episodio){

			$episodio = $this->getEpisodioImagenes($id_temporada, $id_episodio);

			return $episodio;
		}

		function insertTemporada($idSeason, $canEpisodes, $seasonBegin, $seasonEnd){

			try{
				$sentencia = $this->db->prepare("INSERT INTO season (id_season, cant_episodes, season_begin, season_end)
				VALUES (?,?,?,?)");
				$sentencia->execute( array($idSeason, $canEpisodes, $seasonBegin, $seasonEnd) );
			}
			catch(PDOException $exception){
				return $exception->getMessage();
			}

		}

		function getEpisodioImg($id_image){

			$sentencia = $this->db->prepare("SELECT * FROM episode_image WHERE id_image = ?");
			$sentencia->execute( array($id_image) );
			$imagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $imagenes;

		}

		function eliminarImagenEpisodio($id_image){

			try{
				$imagen = $this->getEpisodioImg($id_image);

				if ( !empty($imagen) ){
					$sentencia = $this->db->prepare("DELETE FROM `episode_image`
																							WHERE `id_image` = ?");
					$sentencia->execute( array($id_image) );
					// var_dump($imagen);
					// die();
					unlink( $imagen['path_img'] );
				}

			}

			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function insertEpisodio($idSeason, $idEpisode, $episodeTitle, $episodeDesc, $pathImg){

			try{
				$sentencia = $this->db->prepare( "INSERT INTO episode (id_season, id_episode, titulo, descripcion)
				VALUES (?,?,?,?)" );
				$sentencia->execute( array($idSeason, $idEpisode, $episodeTitle, $episodeDesc) );

				$lastId =  $this->db->lastInsertId();

				/////////////// Subir e insertar imagen ///////////////
				if ( !empty($pathImg) ){
					foreach ($pathImg as $key => $tempPath) {
						$path   = $this->subirImagen($tempPath);
						$sqlImg = $this->insertImg($idSeason, $idEpisode, $path);
					}
				}
				///////////////////////////////////////////////////////

				return $this->getEpisodio($idSeason, $idEpisode);
			}

			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function setTemporada($idSeason, $cantEpis, $fechaC, $fechaF){

					try{
						$sentencia = $this->db->prepare("UPDATE `season`
							SET `id_season`    = ?,
							`cant_episodes`= ?,
							`season_begin` = ?,
							`season_end`   = ?
							WHERE id_season = ?");
							$sentencia->execute( array($idSeason, $cantEpis, $fechaC, $fechaF, $idSeason) );
						}

						catch(PDOException $exception){
							return $exception->getMessage();
						}
					}

		function setEpisodio($idSeason, $idEpisode, $title, $desc, $pathImg){

				try{
					$sentencia = $this->db->prepare("UPDATE `episode` SET `id_season`     = ?,
						`id_episode`    = ?,
						`titulo`        = ?,
						`descripcion`   = ?
						WHERE `id_season`  = ? AND
						`id_episode` = ?");
						$sentencia->execute( array($idSeason, $idEpisode, $title, $desc, $idSeason, $idEpisode) );

						/////////////// Subir e insertar imagen ///////////////
						if ( !empty($pathImg) ){
							foreach ($pathImg as $key => $tempPath) {
								// var_dump($tempPath);
								// echo "</br></<br>";
								$path   = $this->subirImagen($tempPath);
								$sqlImg = $this->insertImg($idSeason, $idEpisode, $path);
							}
							// die();
						}
						///////////////////////////////////////////////////////

						return $this->getEpisodio($idSeason, $idEpisode);
					}

					catch(PDOException $exception){
						return $exception->getMessage();
					}
				}

		function eliminarEpisodio($idSeason, $idEpisode){

			try{
				$sentencia = $this->db->prepare("DELETE FROM `episode`
																						WHERE `id_season` = ? AND
																									`id_episode`= ?");
				$sentencia->execute( array($idSeason, $idEpisode) );
			}

			catch(PDOException	 $exception){
				return $exception->getMessage();
			}
		}

		function eliminarTemporada($idSeason){

			try{
				$sentencia = $this->db->prepare("DELETE FROM `season`
																						WHERE `id_season` = ? ");
				$sentencia->execute( array($idSeason) );
			}

			catch(PDOException $exception){
				return $exception->getMessage();
			}

		}

		/***********************************/
		/************ AdminTools ***********/
		/***********************************/

		//Metodo usado para el listado de temporadas en dropdown de administrador
		function getTemporadasID(){

			$sentencia = $this->db->prepare("SELECT `id_season` FROM `season`
																					GROUP BY `id_season`");
			$sentencia->execute( );
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporadas;
		}

		//Metodo usado para el listado de episodios en dropdown de administrador
		function getAllEpisodios(){

			$sentencia = $this->db->prepare("SELECT * FROM episode");
			$sentencia->execute();
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodios;
		}

	} //END CLASS

?>
