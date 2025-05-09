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
    public function getSaisonById(int $idSaison)
    {
        $query = "SELECT * FROM saison WHERE cle_saison = :idSaison";
        $params = ['idSaison' => $idSaison];
        $result = $this->exec($query, $params);

        return !empty($result) ? $result[0] : null;
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
                INNER JOIN saison_acteur sa ON sa.cle_acteur = a.cle_act
                WHERE sa.cle_saison = :cle_saison";

        $params = ['cle_saison' => $cleSaison];
        return $this->exec($sql, $params);
    }

    public function AjoutSaison(int $cle, string $affichage, string $titre, int $cle_serie, int $nb_episode): bool
    {
        $sql = "INSERT INTO saison (cle_saison, titre, affichage, nb_episode, cle_serie) VALUES (?, ?, ?, ?, ?)";
        $result = $this->exec($sql, [$cle, $titre, $affichage, $nb_episode, $cle_serie]);
        return $result !== false;
    }

    public function cleSaison(): int
    {
        $query = "SELECT COUNT(*) AS total_saisons FROM saison";
        $result = $this->exec($query, []);

        if (!empty($result)) {
            return (int) $result[0]->total_saisons;
        }

        return 0;
    }

    public function supprimerSaison(int $cle_saison)
    {
        // Récupérer la cle_serie de la saison à supprimer
        $saisonQuery = "SELECT cle_serie FROM saison WHERE cle_saison = :cle_saison";
        $saisonResult = $this->exec($saisonQuery, ['cle_saison' => $cle_saison]);

        if (count($saisonResult) === 0) {
            return false;
        }

        $cleSerie = $saisonResult[0]->cle_serie;

        // Supprimer les épisodes associés à cette saison
        $this->exec(
            "DELETE FROM episode WHERE id_saison = :cle_saison",
            ['cle_saison' => $cle_saison]
        );

        // Supprimer la saison
        $result = $this->exec(
            "DELETE FROM saison WHERE cle_saison = :cle_saison",
            ['cle_saison' => $cle_saison]
        );

        // Si la suppression de la saison est réussie
        if ($result !== false) {
            // Décrémenter le nombre de saisons de la série
            $decrementResult = $this->decrementerNbSaison($cleSerie);

            if (!$decrementResult) {
                die("Échec de la décrémentation du nombre de saisons.");
            }

            return true;
        }

        return false;
    }

    public function decrementerNbSaison(int $cleSerie)
    {
        // Vérifier d'abord la valeur actuelle de nb_saison
        $query = "SELECT nb_saison FROM serie WHERE cle_serie = :cle_serie";
        $result = $this->exec($query, ['cle_serie' => $cleSerie]);

        // Si la série n'existe pas ou nb_saison est déjà 0, ne pas décrémenter
        if (empty($result) || $result[0]->nb_saison <= 0) {
            return false;
        }

        // Décrémenter le nombre de saisons seulement si nb_saison > 0
        $query = "UPDATE serie SET nb_saison = nb_saison - 1 WHERE cle_serie = :cle_serie";
        $this->exec($query, ['cle_serie' => $cleSerie]);

        return true;
    }

    public function supprimerSerie(int $cle_serie)
    {
        $this->exec(
            "DELETE FROM episode WHERE id_saison IN (SELECT cle_saison FROM saison WHERE cle_serie = :cle_serie)",
            ['cle_serie' => $cle_serie]
        );

        $this->exec(
            "DELETE FROM saison WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        $this->exec(
            "DELETE FROM serie_tag WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        $result = $this->exec(
            "DELETE FROM serie WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        return $result !== false;
    }
}
?>