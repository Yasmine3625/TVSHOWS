<?php
namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use pdo_wrapper\PdoWrapper;

class Acteur extends PdoWrapper
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
    public function cleActeur(): int {
        $query = "SELECT COUNT(*) AS total_acteurs FROM acteur";
        $result = $this->exec($query, []);
    
        if (!empty($result)) {
            return (int) $result[0]->total_acteurs;
        }
    
        return 0;
    }
    

    public function ajouterActeur(string $nom, string $image, int $cle_saison)
    {
        $sqlCheck = "SELECT cle_act FROM acteur WHERE nom = :nom";
        $result = $this->exec($sqlCheck, ['nom' => $nom]);
    
        if (count($result) > 0) {
            $cle_act = $result[0]->cle_act;
        } else {
            $sqlMax = "SELECT MAX(cle_act) as max_cle FROM acteur";
            $maxResult = $this->exec($sqlMax, []);
            $cle_act = ($maxResult[0]->max_cle ?? 0) + 1;
    
            $sqlInsert = "INSERT INTO acteur (cle_act, nom, image) VALUES (?, ?, ?)";
            $inserted = $this->exec($sqlInsert, [$cle_act, $nom, $image]);
            if ($inserted === false) return false;
        }
    
        $sql = "SELECT 1 FROM saison_acteur WHERE cle_saison = :cle_saison AND cle_acteur = :cle_acteur";
        $linkExists = $this->exec($sql, ['cle_saison' => $cle_saison, 'cle_acteur' => $cle_act]);
    
        if (count($linkExists) === 0) {
            $sqlLink = "INSERT INTO saison_acteur (cle_saison, cle_acteur) VALUES (?, ?)";
            $this->exec($sqlLink, [$cle_saison, $cle_act]);
        }
    
        return $cle_act;
    }
    
}
