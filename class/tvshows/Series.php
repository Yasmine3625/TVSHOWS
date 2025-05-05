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
    try {
        // On cherche la dernière série insérée pour obtenir son nombre de saisons
        $sql = "SELECT nb_saison FROM serie WHERE titre = ? ORDER BY cle_serie DESC LIMIT 1";
        $lastSerie = $this->exec($sql, [$titre]);

        // Si une série existe déjà, on incrémente le nombre de saisons
        if ($lastSerie) {
            $nb_saison = $lastSerie[0]->nb_saison + 1;
        }

        // Ajout de la nouvelle série avec le nombre de saisons correct
        $sql = "INSERT INTO serie (titre, nb_saison, image) VALUES (?, ?, ?)";
        $result = $this->exec($sql, [$titre, $nb_saison, $image], null);

        if ($result === false) {
            throw new \Exception("Erreur lors de l'ajout de la série dans la base de données.");
        }

        return true;
    } catch (\Exception $e) {
        echo "<p style='color: red;'>Erreur : " . $e->getMessage() . "</p>";
        return false;
    }
}
    
    public function supprimerSerie(int $cle_serie): bool
    {
        // Supprimer les épisodes associés aux saisons de la série
        $this->exec(
            "DELETE FROM episode WHERE id_saison IN (SELECT cle_saison FROM saison WHERE cle_serie = :cle_serie)",
            ['cle_serie' => $cle_serie]
        );

        // Supprimer les saisons de la série
        $this->exec(
            "DELETE FROM saison WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        // Supprimer les liens de tags
        $this->exec(
            "DELETE FROM serie_tag WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        // Supprimer la série elle-même
        $result = $this->exec(
            "DELETE FROM serie WHERE cle_serie = :cle_serie",
            ['cle_serie' => $cle_serie]
        );

        // Si $result est false, la suppression a échoué
        return $result !== false;
    }
    public function getById(int $cle_serie)
    {
        $query = "SELECT * FROM serie WHERE cle_serie = :cle_serie";
        $params = ['cle_serie' => $cle_serie];
        
        $result = $this->exec($query, $params);

        if (!empty($result)) {
            return $result[0];
        }
        
        return null;
    }


    public function getLastInsertId(): int
    {
        return $this->getPDO()->lastInsertId();
    }


}



