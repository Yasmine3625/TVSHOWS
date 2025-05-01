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
    public function getSeriesByCategory($categoryName)
    {

        $query = "SELECT s.* FROM series s 
                  JOIN series_tags st ON s.id = st.series_id 
                  JOIN tags t ON st.tag_id = t.id 
                  WHERE t.name = :category";

        $stmt = $this::pdo->prepare($query);
        $stmt->bindParam(':category', $categoryName, PDO::PARAM_STR);
        $stmt->execute();

        $seriesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $series = [];

        foreach ($seriesData as $data) {
            $series[] = new SeriesRenderer($data);
        }

        return $series;
    }




}
