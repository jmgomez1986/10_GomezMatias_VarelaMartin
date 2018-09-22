<?php

/**
 *
 */
	class TemporadasModel
	{

		function __construct()
		{

		}

		private function connectToDB(){
			$db = new PDO('mysql:host=localhost;'.'dbname=gameofthrones_db;charset=utf8','root','');

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $db;
		}

		private function disconnect(){
			$db =  null;
			return $db;
		}

		function getTemporadas(){
			$db = $this->connectToDB();

			$sentencia = $db->prepare("SELECT * FROM season");
			$sentencia->execute();
			$temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $temporadas;
		}

		function getTemporada($id_temporada){
			$db = $this->connectToDB();

			$sentencia = $db->prepare("SELECT * FROM season WHERE id_season = ?");
			$sentencia->execute( array($id_temporada) );
			$temporada = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $temporada;
		}

		function getEpisodios($temporada){
			$db = connectToDB();

			$sentencia = $db->prepare("SELECT * FROM episode WHERE id_season=$temporada");
			$sentencia->execute();
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $episodios;
		}

		function getEpisodio($temporada,$episodio){
			$db = $this->connectToDB();

			$sentencia = $db->prepare("SELECT * FROM episode WHERE id_season=$temporada AND id_episode=$episodio");
			$sentencia->execute();
			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $episodio;
		}

		function getAllEpisodios(){
			$db = $this->connectToDB();

			$sentencia = $db->prepare("SELECT * FROM episode");
			$sentencia->execute();
			$episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $episodios;
		}

		function getAllEpisodio($episodio){
			$db = $this->connectToDB();

			$sentencia = $db->prepare("SELECT * FROM episode WHERE id_episode=$episodio");
			$sentencia->execute();
			$episodio = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			$db = $this->disconnect();

			return $episodio;
		}

		function insertTemporada($idSeason, $canEpisodes, $seasonBegin, $seasonEnd){
			$db = $this->connectToDB();

			try{
				$sentencia = $db->prepare("INSERT INTO season (id_season, cant_episodes, season_begin, season_end)
																			VALUES (?,?,?,?)");
				$sentencia->execute( array($idSeason, $canEpisodes, $seasonBegin, $seasonEnd) );

				return 'Se inserto bien';
			}
			catch(PDOException $exception){
				 return $exception->getMessage();
			}

			$db = $this->disconnect();

		}

		function insertEpisodio($idSeason, $idEpisode, $episodeTitle, $episodeDesc){
			$db = $this->connectToDB();

			try{
				$sentencia = $db->prepare( "INSERT INTO episode (id_season, id_episode, episode_title, episode_desc)
																			VALUES (?,?,?,?)" );
				$sentencia->execute( array($idSeason, $idEpisode, $episodeTitle, $episodeDesc) );

				return 'Se inserto bien';
			}
			catch(PDOException $exception){
				 return $exception->getMessage();
			}

			$db = $this->disconnect();

		}

		function setTemporada($temporada,$cantEpis,$fechaC,$fechaF){
			$db = $this->connectToDB();

			try{
				$sentencia = $db->prepare("UPDATE `season`
																		SET `id_season`    = '$temporada',
																		    `cant_episodes`= '$cantEpis',
																				`season_begin` = '$fechaC',
																				`season_end`   = '$fechaF'
																		WHERE id_season='$temporada'");
				$sentencia->execute();
			}
			catch(PDOException $exception){
				//return $exception->getMessage();
			}
		}

		function setEpisodio($temporada,$episodio,$title,$desc){
			$db = $this->connectToDB();

			try{
				$sentencia = $db->prepare("UPDATE `episode` SET `id_season`='$temporada',`id_episode`='$episodio',`episode_title`='$title',`episode_desc`='$desc' WHERE `id_season`='$temporada' and `id_episode`='$episodio'");
	    	$sentencia->execute();
	      return "se actualizo bien";
	    }
	    catch(PDOException $exception){
				return $exception->getMessage();
			}

			$db = $this->disconnect();

		}

	}

?>
