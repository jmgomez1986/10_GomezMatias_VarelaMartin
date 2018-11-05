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

			$sentencia = $this->db->prepare("SELECT * FROM episode WHERE id_season = ?");
			$sentencia->execute( array($id_temporada) );
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $episodios;
		}

		function getEpisodio($temporada, $episodio){

			$sentencia = $this->db->prepare("SELECT * FROM episode WHERE id_season = ? AND
				                                                     			id_episode = ?");
			$sentencia->execute( array($temporada, $episodio) );
			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

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

		private function subirImagen($imagen){
	        $destino_final = 'images/episodes/' . uniqid() . '.jpg';
	        //echo "destino_final: ".$destino_final;
	        move_uploaded_file($imagen, $destino_final);
	        return $destino_final;
	    }


		function insertEpisodio($idSeason, $idEpisode, $episodeTitle, $episodeDesc,$tempPath){

			try{
				$path = $this->subirImagen($tempPath);

				$sentencia = $this->db->prepare( "INSERT INTO episode (id_season, id_episode, episode_title, episode_desc, imagen)
																						VALUES (?,?,?,?,?)" );
				$sentencia->execute( array($idSeason, $idEpisode, $episodeTitle, $episodeDesc, $path) );

				$lastId =  $this->db->lastInsertId();
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

		function setEpisodio($temporada,$episodio,$title,$desc){
			$db = $this->connectToDB();

			try{
				$sentencia = $this->db->prepare("UPDATE `episode` SET `id_season`     = ?,
								                                              `id_episode`    = ?,
																															`episode_title` = ?,
																															`episode_desc`  = ?
																										WHERE `id_season`  = ? AND
																										      `id_episode` = ?");
	    	$sentencia->execute( array($temporada,$episodio, $title, $desc, $temporada, $episodio) );
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
