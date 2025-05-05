<?php
namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use pdo_wrapper\PdoWrapper;

class Realisateur extends PdoWrapper
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

    public function cleRealisateur(): int {
        $query = "SELECT COUNT(*) AS total_realisateurs FROM realisateur";
        $result = $this->exec($query, []);
    
        if (!empty($result)) {
            return (int) $result[0]->total_realisateurs;
        }
    
        return 0;
    }

    public function ajouterRealisateur(string $nom, string $image, int $cle_episode)
    {
        $sqlCheck = "SELECT cle_real FROM realisateur WHERE nom = :nom";
        $result = $this->exec($sqlCheck, ['nom' => $nom]);
        $nbr = count($result);

        if ($nbr > 0) {
            $cle_real = $result[0]->cle_real;
        } else {
            $sqlInsert = "INSERT INTO realisateur (nom, image) VALUES (?, ?)";
            $inserted = $this->exec($sqlInsert, [$nom, $image]);
            if ($inserted === false)
                return false;

            $cle_real = $nbr + 1;
        }

        $sql = "SELECT 1 FROM episode_realisateur WHERE cle_episode = :cle_episode AND cle_real = :cle_real";
        $linkExists = $this->exec($sql, ['cle_episode' => $cle_episode, 'cle_real' => $cle_real]);

        if (count($linkExists) === 0) {
            $sqlLink = "INSERT INTO episode_realisateur (cle_episode, cle_real) VALUES (?, ?)";
            $this->exec($sqlLink, [$cle_episode, $cle_real]);
        }

        return $cle_real;


    }
}
