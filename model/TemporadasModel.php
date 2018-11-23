<?php

require_once "config/ConfigApp.php";

class TemporadasModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->ConnectToDB();
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function connectToDB()
    {
        return new PDO('mysql:host='.ConfigApp::$host.';dbname='.ConfigApp::$DBname.';charset=utf8', ConfigApp::$DBuser, ConfigApp::$DBpass);
    }

    private function subirImagen($imagen)
    {
        //Si la carpeta no existe, la creamos
        if (!file_exists('images/episodes/')) {
            mkdir('images/episodes/', 0777, true);
        }
        //Se arma el path completo de la imagen a subir
        $destino_final = 'images/episodes/' . uniqid() . '.jpg';
        //Se sube la imagen
        move_uploaded_file($imagen, $destino_final);
        return $destino_final;
    }

    private function insertImg($id_season, $id_episode, $path)
    {
        try {
            $sentencia = $this->db->prepare("INSERT INTO episode_image (id_season, id_episode,	path_img)
																								VALUES (?,?,?)");
            $sentencia->execute(array($id_season, $id_episode, $path));

            $last_id = $this->db->lastInsertId();

            $regInsert = $this->getEpisodioImg($last_id);

            return $regInsert;
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    private function getEpisodios($parameters, $condicion)
    {
        $sentencia = $this->db->prepare("SELECT *
																						FROM episode
																						WHERE	$condicion");

        $sentencia->execute($parameters);
        $episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $episodios;
    }

    public function getImagenes($id_season = '', $id_episode = '')
    {
        if (isset($id_season) && isset($id_episode)) {
            $parameters = array();
            $condicion  = 'id_season=? AND id_episode=?';
            array_push($parameters, $id_season);
            array_push($parameters, $id_episode);
        }

        $sentencia = $this->db->prepare("SELECT *
																						FROM episode_image
																						WHERE	$condicion");

        $sentencia->execute($parameters);
        $episodioImagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $episodioImagenes;
    }

    public function getEpisodioImagenes($id_season, $id_episode = null)
    {
        $parameters = array();

        //Se arma la condicion
        if (isset($id_episode)) {
            $condicion  = 'id_season=? AND id_episode=?';
            array_push($parameters, $id_season);
            array_push($parameters, $id_episode);
        } else {
            $condicion  = 'id_season=?';
            array_push($parameters, $id_season);
        }
        //Se obtienen los datos del episodio
        $episodios = $this->getEpisodios($parameters, $condicion);

        return $episodios;
    }

    public function getTemporadas()
    {
        $sentencia = $this->db->prepare("SELECT * FROM season");
        $sentencia->execute();
        $temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $temporadas;
    }

    public function getTemporada($id_season)
    {
        $sentencia = $this->db->prepare("SELECT * FROM season WHERE id_season = ?");
        $sentencia->execute(array($id_season));
        $temporada = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $temporada;
    }

    public function insertTemporada($id_season, $canEpisodes, $seasonBegin, $seasonEnd)
    {
        try {
            $sentencia = $this->db->prepare("INSERT INTO season (id_season, cant_episodes, season_begin, season_end)
																								VALUES (?,?,?,?)");
            $sentencia->execute(array($id_season, $canEpisodes, $seasonBegin, $seasonEnd));
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function getEpisodioImg($id_image)
    {
        $sentencia = $this->db->prepare("SELECT * FROM episode_image WHERE id_image = ?");
        $sentencia->execute(array($id_image));
        $imagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $imagenes;
    }

    public function getImagen($id_season, $id_episode)
    {
        $sentencia = $this->db->prepare("SELECT * FROM episode_image WHERE id_season = ? AND id_episode=?");
        $sentencia->execute(array($id_season, $id_episode));
        $imagenes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $imagenes;
    }

    public function eliminarImagenEpisodio($id_image)
    {
        try {
            $imagen = $this->getEpisodioImg($id_image);
            if (!empty($imagen)) {
                $sentencia = $this->db->prepare("DELETE FROM `episode_image`
																								WHERE `id_image` = ?");
                $sentencia->execute(array($id_image));
                $path = "./" . $imagen[0]['path_img'];
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function insertEpisodio($id_season, $id_episode, $episodeTitle, $episodeDesc, $pathImg)
    {

        try {
                $sentencia = $this->db->prepare("INSERT INTO episode (id_season, id_episode, titulo, descripcion)
																									VALUES (?,?,?,?)");
                $sentencia->execute(array($id_season, $id_episode, $episodeTitle, $episodeDesc));
                $lastId =  $this->db->lastInsertId();
            /////////////// Subir e insertar imagen ///////////////
            if (!empty($pathImg)) {
                foreach ($pathImg as $key => $tempPath) {
                    $path   = $this->subirImagen($tempPath);
                    $sqlImg = $this->insertImg($id_season, $id_episode, $path);
                }
            }
            ///////////////////////////////////////////////////////
            $episodio = $this->getEpisodioImagenes($id_season, $id_episode);
            return $episodio[0];
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function setTemporada($id_season, $cantEpis, $fechaC, $fechaF)
    {
        try {
            $sentencia = $this->db->prepare("UPDATE `season`
																						 SET `id_season`    = ?,
																								`cant_episodes`= ?,
																								`season_begin` = ?,
																								`season_end`   = ?
																						WHERE id_season = ?");
            $sentencia->execute(array($id_season, $cantEpis, $fechaC, $fechaF, $id_season));
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function setEpisodio($id_season, $id_episode, $title, $desc, $pathImg)
    {
        try {
            $sentencia = $this->db->prepare("UPDATE `episode`
                                                SET `id_season`     = ?,
                                    								`id_episode`    = ?,
                                    								`titulo`        = ?,
                                    								`descripcion`   = ?
                              								WHERE `id_season`  = ? AND
                              								      `id_episode` = ?");
            $sentencia->execute(array($id_season, $id_episode, $title, $desc, $id_season, $id_episode));

            /////////////// Subir e insertar imagen ///////////////
            if (!empty($pathImg)) {
                foreach ($pathImg as $key => $tempPath) {
                    $path   = $this->subirImagen($tempPath);
                    $sqlImg = $this->insertImg($id_season, $id_episode, $path);
                }
            }
            ///////////////////////////////////////////////////////
            // $episodio[0]['imagenes'] = $this->getEpisodioImagenes($id_season, $id_episode);
            // return $episodio[0];
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function eliminarEpisodio($id_season, $id_episode)
    {
        try {
            $episodio = $this->getEpisodioImagenes($id_season, $id_episode);
            for ($i=0; $i < count($episodio); $i++) {
                $imagenesEpisodio = $this->getImagen($episodio[$i]['id_season'], $episodio[$i]['id_episode']);
                for ($j=0; $j < count($imagenesEpisodio); $j++) {
                     $imgElim = $this->eliminarImagenEpisodio($imagenesEpisodio[$j]['id_image']);
                }
            }

            $sentencia = $this->db->prepare("DELETE FROM `episode`
                            									WHERE `id_season` = ? AND
                            									      `id_episode`= ?");
            $sentencia->execute(array($id_season, $id_episode));
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    public function eliminarTemporada($id_season)
    {

        try {
                $sentencia = $this->db->prepare("DELETE FROM `season`
										                              WHERE `id_season` = ? ");
                $sentencia->execute(array($id_season));
        } catch (PDOException $exception) {
            return $exception->getMessage();
        }
    }

    /***********************************/
    /************ AdminTools ***********/
    /***********************************/

    //Metodo usado para el listado de temporadas en dropdown de administrador
    public function getTemporadasID()
    {
        $sentencia = $this->db->prepare("SELECT `id_season` FROM `season`
										                      GROUP BY `id_season`");
        $sentencia->execute();
        $temporadas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $temporadas;
    }

    //Metodo usado para el listado de episodios en dropdown de administrador
    public function getAllEpisodios()
    {
        $sentencia = $this->db->prepare("SELECT * FROM episode");
        $sentencia->execute();
        $episodios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $episodios;
    }
} //ENDCLASS
