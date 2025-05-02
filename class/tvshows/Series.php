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






}
