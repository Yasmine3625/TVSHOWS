<?php

namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use \pdo_wrapper\PdoWrapper;

class Saisons extends PdoWrapper
{
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

    public function getSaisonsBySerieAndIndex($cleSerie, $index)
    {
        $query = "SELECT * FROM saison WHERE cle_serie = :cleSerie LIMIT $index, 1";
        $params = ['cleSerie' => $cleSerie];
        return $this->exec($query, $params);
    }

    public function getAllSaisonsBySerie($cleSerie)
    {
        $query = "SELECT * FROM saison WHERE cle_serie = :cleSerie ORDER BY numero_saison ASC";
        $params = ['cleSerie' => $cleSerie];
        return $this->exec($query, $params);
    }
}
