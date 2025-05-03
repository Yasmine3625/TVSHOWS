<?php

namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use \pdo_wrapper\PdoWrapper;

class Series extends PdoWrapper
{
    public $file;

    public const UPLOAD_DIR = "uploads/";

    public function __construct()
    {
        parent::__construct(
            $GLOBALS['db_name'],
            $GLOBALS['db_host'],
            $GLOBALS['db_port'],
            $GLOBALS['db_user'],
            $GLOBALS['db_pwd']
        );
    }

    public function getAllSeries()
    {
        return $this->exec(
            "SELECT * FROM serie ORDER BY titre",
            null,
            'tvshows\SeriesRenderer'
        );

    }
    public function getSeriesByCategory(string $categoryName)
    {
        $sql = "
        SELECT s.*
        FROM serie s
        JOIN serie_tag st ON s.cle_serie = st.cle_serie
        JOIN tag t ON st.cle_tag = t.id_tag
        WHERE LOWER(t.nom) = LOWER(:category)
        ORDER BY s.titre
    ";

        return $this->exec(
            $sql,
            [':category' => $categoryName],
            'tvshows\SeriesRenderer'
        );
    }

    public function searchSeries(string $searchTerm)
    {
        $sql = "SELECT * FROM serie WHERE LOWER(titre) LIKE LOWER(:searchTerm) ORDER BY titre";
        return $this->exec(
            $sql,
            [':searchTerm' => "%" . $searchTerm . "%"],
            'tvshows\SeriesRenderer'
        );
    }

    public function AjoutSerie(string $titre, int $nb_saison, string $image): bool
    {
        $sql = "INSERT INTO serie (titre, nb_saison, image) VALUES (:titre, :nb_saison, :image)";
        $params = [
            ':titre' => $titre,
            ':nb_saison' => $nb_saison,
            ':image' => $image
        ];
    
        // On exécute la requête sans attendre un résultat, juste savoir si elle a fonctionné
        try {
            $this->prepare($sql);
            $this->bind($params);
            return $this->execute();
        } catch (\Exception $e) {
            // Tu peux loguer ici si nécessaire
            return false;
        }
    }
    
}



