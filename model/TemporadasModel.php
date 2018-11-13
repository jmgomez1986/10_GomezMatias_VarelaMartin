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

		private function getEpisodios($parameters, $condicion){

			$sentencia = $this->db->prepare("SELECT *
				FROM episode
				WHERE	$condicion");

				$sentencia->execute( $parameters );

				$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

				return $episodios;
		}

		public function getImagenes($parameters=[], $condicion='', $id_temporada='', $id_episodio=''){

			if ( isset($id_temporada) && isset($id_episodio) && empty($parameters)){
				$parameters = array();
				$condicion  = 'id_season=? AND id_episode=?';
				array_push($parameters, $id_temporada);
				array_push($parameters, $id_episodio);
			}


			$sentencia = $this->db->prepare("SELECT *
																					FROM episode_image
																					WHERE	$condicion");

			$sentencia->execute( $parameters );

			$episodioImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodioImagenes;
		}

		public function getEpisodioImagenes($id_temporada, $id_episodio=NULL){

			$parameters = array();
			$resultEpisodiosImagenes = array();

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
			$episodios = $this->getEpisodios($parameters, $condicion);
			if ( !empty($episodios) ){
				array_push($resultEpisodiosImagenes, $episodios);
			}

			//Se obtienen los datos de las imagenes
			$episodiosImagenes = $this->getImagenes($parameters, $condicion, '', '');
			if ( !empty($episodios) ){
				array_push($resultEpisodiosImagenes, $episodiosImagenes);
			}

			return $resultEpisodiosImagenes;

		}

		public function getTemporadas(){

			$sentencia = $this->db->prepare("SELECT * FROM season");
			$sentencia->execute();
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporadas;

		}

		public function getTemporada($id_temporada){

			$sentencia = $this->db->prepare("SELECT * FROM season WHERE id_season = ?");
			$sentencia->execute( array($id_temporada) );
			$temporada = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporada;

		}

		public function insertTemporada($idSeason, $canEpisodes, $seasonBegin, $seasonEnd){

			try{
				$sentencia = $this->db->prepare("INSERT INTO season (id_season, cant_episodes, season_begin, season_end)
				VALUES (?,?,?,?)");
				$sentencia->execute( array($idSeason, $canEpisodes, $seasonBegin, $seasonEnd) );
			}
			catch(PDOException $exception){
				return $exception->getMessage();
			}

		}

		public function getEpisodioImg($id_image){

			$sentencia = $this->db->prepare("SELECT * FROM episode_image WHERE id_image = ?");
			$sentencia->execute( array($id_image) );
			$imagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $imagenes;

		}

		public function eliminarImagenEpisodio($id_image){

			try{
				$imagen = $this->getEpisodioImg($id_image);

				if ( !empty($imagen) ){
					$sentencia = $this->db->prepare("DELETE FROM `episode_image`
																							WHERE `id_image` = ?");
					$sentencia->execute( array($id_image) );
					// var_dump($imagen);
					// die();
					$path = "./" . $imagen[0]['path_img'];
					if(file_exists($path)){
						unlink($path);
					}
				}
			}
			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		public function insertEpisodio($id_season, $id_episode, $episodeTitle, $episodeDesc, $pathImg){

			try{
				$sentencia = $this->db->prepare( "INSERT INTO episode (id_season, id_episode, titulo, descripcion)
				VALUES (?,?,?,?)" );
				$sentencia->execute( array($id_season, $id_episode, $episodeTitle, $episodeDesc) );

				$lastId =  $this->db->lastInsertId();

				/////////////// Subir e insertar imagen ///////////////
				if ( !empty($pathImg) ){
					foreach ($pathImg as $key => $tempPath) {
						$path   = $this->subirImagen($tempPath);
						$sqlImg = $this->insertImg($id_season, $id_episode, $path);
					}
				}
				///////////////////////////////////////////////////////
				$episodio = $this->getEpisodioImagenes($id_season, $id_episode);

				return $episodio[0];
			}

			catch(PDOException $exception){
				return $exception->getMessage();
			}
		}

		public function setTemporada($idSeason, $cantEpis, $fechaC, $fechaF){

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

		public function setEpisodio($idSeason, $idEpisode, $title, $desc, $pathImg){

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
								$path   = $this->subirImagen($tempPath);
								$sqlImg = $this->insertImg($idSeason, $idEpisode, $path);
							}
						}
						///////////////////////////////////////////////////////
						$episodio = $this->getEpisodioImagenes($id_season, $id_episode);

						return $episodio[0][0];
					}

					catch(PDOException $exception){
						return $exception->getMessage();
					}
				}

		public function eliminarEpisodio($idSeason, $idEpisode){

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

		public function eliminarTemporada($idSeason){

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
		public function getTemporadasID(){

			$sentencia = $this->db->prepare("SELECT `id_season` FROM `season`
																					GROUP BY `id_season`");
			$sentencia->execute( );
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $temporadas;
		}

		//Metodo usado para el listado de episodios en dropdown de administrador
		public function getAllEpisodios(){

			$sentencia = $this->db->prepare("SELECT * FROM episode");
			$sentencia->execute();
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodios;
		}

	} //END CLASS

?>
