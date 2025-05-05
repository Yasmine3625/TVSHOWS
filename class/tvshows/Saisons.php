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
    
    public function getActeurParEpisode($cleSaison)
    {
        $sql = "SELECT a.nom, a.image
                FROM acteur a
                INNER JOIN saison_acteur sa ON sa.cle_acteur = a.cle_act  -- Changer 'cle_act' par 'cle_acteur'
                WHERE sa.cle_saison = :cle_saison";
    
        $params = ['cle_saison' => $cleSaison];
        return $this->exec($sql, $params);
    }
    public function AjoutSaison(int $cle, string $affichage,  string $titre, int $cle_serie, int $nb_episode): bool
    {
        $sql = "INSERT INTO saison (cle_saison, titre, affichage, nb_episode, cle_serie)  VALUES (?, ?, ?, ?, ?)";
        $result = $this->exec($sql, [$cle,$titre, $affichage,$nb_episode , $cle_serie], null);
        return $result !== false;
    }
    
    
}
