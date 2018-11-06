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

			$sentencia = $this->db->prepare("SELECT episode.*, episode_image.path_img
																				FROM episode
																				LEFT JOIN episode_image
																					ON ( episode.id_season  = episode_image.id_season AND
																					     episode.id_episode = episode_image.id_episode )
																			  WHERE	episode.id_season  = ?");
      $sentencia->execute( array($id_temporada) );

			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodios;
		}

		private function formatearEpisodio01($episodio){

			$episodioFormateado = array();

			for ($i=0; $i < count($episodio); $i++) {
				$episodioFormateado['informacion']['id_season']   = $episodio[$i]['id_season'];
				$episodioFormateado['informacion']['id_episode']  = $episodio[$i]['id_episode'];
				$episodioFormateado['informacion']['titulo']      = $episodio[$i]['titulo'];
				$episodioFormateado['informacion']['descripcion'] = $episodio[$i]['descripcion'];
				$episodioFormateado['imagenes'] = [];
				foreach ($episodio as $key => $ep) {
					array_push($episodioFormateado['imagenes'], $ep['path_img']);
				}
			}

			return $episodioFormateado;
		}

		private function formatearEpisodio02($episodio, $episodioImagenes){

			$episodioFormateado = array();

			for ($i=0; $i < count($episodio); $i++) {
				$episodioFormateado['id_season']   = $episodio[$i]['id_season'];
				$episodioFormateado['id_episode']  = $episodio[$i]['id_episode'];
				$episodioFormateado['titulo']      = $episodio[$i]['titulo'];
				$episodioFormateado['descripcion'] = $episodio[$i]['descripcion'];
				$episodioFormateado['imagenes'] = [];
				foreach ($episodioImagenes as $key => $ep) {
					array_push($episodioFormateado['imagenes'], $ep['path_img']);
				}
			}

			return $episodioFormateado;
		}

		private function getEpisodioImagenes01($id_temporada, $id_episodio){

			$sentencia = $this->db->prepare("SELECT episode.*, episode_image.path_img
																				FROM episode
																				LEFT JOIN episode_image
																					ON ( episode.id_season  = episode_image.id_season  AND
																				       episode.id_episode = episode_image.id_episode )
																			  WHERE	episode.id_season  = ?   AND
				                                      episode.id_episode = ?");

			$sentencia->execute( array($id_temporada, $id_episodio) );

			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$episodioFormateado = $this->formatearEpisodio01($episodio);

			return $episodioFormateado;
		}

		private function getEpisodioImagenes02($id_temporada, $id_episodio){

			$sentencia = $this->db->prepare("SELECT *
																				FROM episode
																			  WHERE	id_season  = ?   AND
				                                      id_episode = ?");

			$sentencia->execute( array($id_temporada, $id_episodio) );

			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$sentencia = $this->db->prepare("SELECT path_img
																				FROM episode_image
																				WHERE	id_season  = ?   AND
																							id_episode = ?");

			$sentencia->execute( array($id_temporada, $id_episodio) );

			$episodioImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$episodioFormateado = $this->formatearEpisodio02($episodio,$episodioImagenes);

			return $episodioFormateado;
		}

		function getEpisodio($id_temporada, $id_episodio){

			// $episodio = $this->getEpisodioImagenes01($id_temporada, $id_episodio);

			$episodio = $this->getEpisodioImagenes02($id_temporada, $id_episodio);

			var_dump($episodio);
			die();

			return $episodio;
		}

		function getAllEpisodios(){

			$sentencia = $this->db->prepare("SELECT * FROM episode");
			$sentencia->execute();
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodios;
		}

		function getAllEpisodio($episodio){

			$sentencia = $this->db->prepare("SELECT * FROM episode WHERE id_episode = ?");
			$sentencia->execute( array($episodio) );
			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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

		function insertEpisodio($idSeason, $idEpisode, $episodeTitle, $episodeDesc, $tempPath){

			try{

				$sentencia = $this->db->prepare( "INSERT INTO episode (id_season, id_episode, titulo, descripcion)
																						VALUES (?,?,?,?)" );
				$sentencia->execute( array($idSeason, $idEpisode, $episodeTitle, $episodeDesc) );

				$lastId =  $this->db->lastInsertId();

				/////////////// Subir e insertar imagen ///////////////
				$path = $this->subirImagen($tempPath);

				$sqlImg = $this->insertImg($idSeason, $idEpisode, $path);
				// var_dump($sqlImg);
				// die();
				///////////////////////////////////////////////////////
		    return $this->getEpisodio($idSeason, $idEpisode);
			}
			catch(PDOException $exception){
				 return $exception->getMessage();
			}
		}

		function setTemporada($temporada,$cantEpis,$fechaC,$fechaF){

			try{
				$sentencia = $this->db->prepare("UPDATE `season`
																						SET `id_season`    = ?,
																						    `cant_episodes`= ?,
																								`season_begin` = ?,
																								`season_end`   = ?
																						WHERE id_season = ?");
				$sentencia->execute( array($temporada, $cantEpis, $fechaC, $fechaF, $temporada) );
			}
			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function setEpisodio($temporada, $episodio, $title, $desc, $tempPath){

			try{
				$path = $this->subirImagen($tempPath);

				$sentencia = $this->db->prepare("UPDATE `episode` SET `id_season`     = ?,
								                                              `id_episode`    = ?,
																															`titulo`        = ?,
																															`descripcion`   = ?,
																															`imagen`        = ?
																										WHERE `id_season`  = ? AND
																										      `id_episode` = ?");

	    	$sentencia->execute( array($temporada, $episodio, $title, $desc, $path, $temporada, $episodio) );
	    }
	    catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		function eliminarEpisodio($temporada,$episodio){

			try{
				$sentencia = $this->db->prepare("DELETE FROM `episode`
								                         	WHERE `id_season` = ? AND
																					      `id_episode`= ?");
	    	$sentencia->execute(array($temporada,$episodio));
	    }
	    catch(PDOException	 $exception){
				return $exception->getMessage();
			}
		}

		function eliminarTemporada($temporada){

			try{
				$sentencia = $this->db->prepare("DELETE FROM `season`
					                         				WHERE `id_season` = ? ");
	    	$sentencia->execute(array($temporada));
	    }
	    catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

/***********************************/
/*********** AdminTools ***********/
/***********************************/
		function getTemporadasID(){

			$sentencia = $this->db->prepare("SELECT `id_season` FROM `season`
				                           			GROUP BY `id_season`");
			$sentencia->execute( );
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporadas;
		}
	} //END CLASS

?>
