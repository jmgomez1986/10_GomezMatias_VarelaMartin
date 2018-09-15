<?php
	require_once("database.php");

	if($_GET['action'] == ''){
		//no hay accion, muestro accion por defecto
		echo "debe ingresar una accion a realizar";
	}
	else{
		//parseo la URL
		$partesURL = explode ("/", $_GET['action']);
		//leo las partes de la URL para saber que accion tomar
/*
		.../temporadas                (lista de todas las temporadas de la serie)
		.../temporada/1               (lista de todos los episodios de la temporada 1)
		.../temporada/episodio/1/2    (lista de la temporada 1 y episodio 2)
		.../episodios                 (lista de todos los episodios de la serie)
		.../episodio/1                (lista de todos los episodios 1)
*/
		if($partesURL[0] === 'temporadas') {
			echo "Las temporadas son:<ul>";
			$temporadas = getTemporadas();
			echo "<ul>";
			foreach($temporadas as $temporada){
				echo "<li>" . "Temporada N° "  . $temporada["id_season"] .
								" - Cant. Episodios: " . $temporada["cant_episodes"] .
						 "</li>";
			}
			echo "</ul>";
		}
		elseif ($partesURL[0] === 'temporada' && $partesURL[1] != 'episodio'){
			if(isset($partesURL[1]) && $partesURL[1] !== ''){
				echo "Los episodios de la temporada ". $partesURL[1] . " son:</br>";
				$episodios = getEpisodios($partesURL[1]);
				echo "<ul>";
				foreach($episodios as $episodio){
        	echo "<li>" .
									"Episodio N°: " . $episodio["id_episode"]    .
									" - Titulo: "   . $episodio["episode_title"] .
							 "</li>";
    		}
				echo "</ul>";
			}
			else{
				echo "Debe ingresar un numero de temporada";
			}
		}
		elseif($partesURL[0] === 'temporada' && $partesURL[1] === 'episodio'){
			if(isset($partesURL[2]) && isset($partesURL[3]) && $partesURL[2] !== '' && $partesURL[3] !== ''){
				$episodio = getEpisodio($partesURL[2],$partesURL[3]);
				//var_dump($episodio);
				echo "<ul>";
				echo "<li>" .
						 		"Episodio N°: " . $episodio[0]["id_episode"]    .
								" - Titulo: "   . $episodio[0]["episode_title"] .
								" - Sinopsis: " . $episodio[0]["episode_desc"]  .
						 "</li>";
    		echo "</ul>";
    	}
			else{
				echo "Debe ingresar numero de temporada y numero de episodio";
			}
		}
		elseif($partesURL[0] === 'episodios'){
			echo "Todos los episodios son: </br>";
			$episodios = getAllEpisodios();
			echo "<ul>";
			foreach($episodios as $episodio){
      	echo "<li>" .
								"Temporada N°: "   . $episodio["id_season"]     .
					      " - Episodio N°: " . $episodio["id_episode"]    .
					      " - Titulo: "      . $episodio["episode_title"] .
							"</li>";
    	}
			echo "</ul>";
	  }
		elseif($partesURL[0] === 'episodio'){
			if(isset($partesURL[1]) && $partesURL[1] !== ''){
				echo "Todos los episodios " . $partesURL[1] . " son:" . "</br>";
				$episodios = getAllEpisodio($partesURL[1]);
				echo "<ul>";
				foreach($episodios as $episodio){
	      	echo "<li>" .
									"Temporada N°: "   . $episodio["id_season"]     .
						      " - Episodio N°: " . $episodio["id_episode"]    .
						      " - Titulo: "      . $episodio["episode_title"] .
									" - Sinopsis: "    . $episodio["episode_desc"]  .
								"</li>";
				}
			}
			else{
				echo "Debe ingresar un numero de episodio";
			}
	  }
		elseif($partesURL[0] === 'insertar') {

			if ($partesURL[1] === 'temporada'){
				$insertResult = insertTemporada('8', '9', '2018-09-01', '2018-10-13');
				echo $insertResult;
			}

			elseif ($partesURL[1] === 'episodio') {
				$insertResult = insertEpisodio('6', '1', 'Test', 'lalala');
				echo $insertResult;
			}

		}

		elseif($partesURL[0] === 'actualizar'){

			if ($partesURL[1] === 'temporada'){
				$updateResult = setTemporada('1','10','2011-04-17','2011-06-09');
				echo $updateResult;
			}

			elseif ($partesURL[1] === 'episodio') {
				$updateResult = setEpisodio('1','10','Tyron muestra el pedazo','Tyron muestra la foca muerta que tiene entre las piernas, sorprendiendo a todos los presentes');
				echo $updateResult;
			}

	  }
	}
?>
