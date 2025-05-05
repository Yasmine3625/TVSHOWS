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
    public function AjoutSaison(string $titre, int $nb_episode, string $image, int $cle_serie): bool
    {
        $sqlGetNbSaisons = "SELECT COUNT(*) AS nb_saisons FROM saison WHERE cle_serie = :cle_serie";
        $params = ['cle_serie' => $cle_serie];
        $result = $this->exec($sqlGetNbSaisons, $params);
        $nb_saisons = $result[0]['nb_saisons'];
        
        $nb_saison = $nb_saisons + 1;
        
        $cle_saison = $cle_serie * 100 + $nb_saison;
    
        $sql = "INSERT INTO saison (cle_saison, titre, nb_episode, affichage, cle_serie, nb_saison) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $result = $this->exec($sql, [$cle_saison, $titre, $nb_episode, $image, $cle_serie, $nb_saison], null);
        
        return $result !== false;
    }
    
    
}
