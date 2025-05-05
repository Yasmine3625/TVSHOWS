<?php
namespace tvshows;
include __DIR__ . "/../../DB_CREDENTIALS.php";

use pdo_wrapper\PdoWrapper;
class Episode extends PdoWrapper
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

    public function getAllEpisodes()
    {
        return $this->exec(
            "SELECT * FROM episode ORDER BY titre",
            null,
            'tvshows\EpisodesRenderer'
        );
    }
    public function getBySerieSaisonEtNumero($cleSerie, $numSaison, $numEpisode)
    {
        // Récupère la saison ciblée par index
        $querySaison = "SELECT * FROM saison WHERE cle_serie = :cleSerie LIMIT " . ($numSaison - 1) . ", 1";
        $params = ['cleSerie' => $cleSerie];
        $saisons = $this->exec($querySaison, $params);

        if (count($saisons) === 0) {
            return null;
        }

        $saison = $saisons[0];

        $queryEpisode = "SELECT * FROM episode WHERE id_saison = :cleSaison AND numero_episode = :numEpisode";
        $episodeParams = ['cleSaison' => $saison->cle_saison, 'numEpisode' => $numEpisode];
        $episodes = $this->exec($queryEpisode, $episodeParams);

        if (count($episodes) === 0) {
            return null;
        }

        return [
            'saison' => $saison,
            'episode' => $episodes[0]
        ];
    }
    public function getRealisateursParEpisode($idEpisode)
    {
        $sql = "SELECT r.nom, r.image
                FROM realisateur r
                INNER JOIN episode_realisateur re ON re.cle_real = r.cle_real
                WHERE re.cle_episode = :id_episode";

        $params = ['id_episode' => $idEpisode];

        return $this->exec($sql, $params);
    }

    public function AjoutEpisode(int $cle, string $synopsis, string $duree, string $titre, int $id_saison, int $numero_episode): bool
    {

        $sql = "INSERT INTO episode (cle_episode ,synopsis ,duree, titre, id_saison, numero_episode) VALUES (?, ?, ?, ?, ?, ?)";
        $result = $this->exec($sql, [$cle, $synopsis, $duree, $titre, $id_saison, $numero_episode], null);
        return $result !== false;
    }

    public function supprimerEpisode(int $cle_episode): bool
    {
        $sql = "DELETE FROM episode WHERE cle_episode = :cle_episode";
        $params = ['cle_episode' => $cle_episode];
        $result = $this->exec($sql, $params);
        return $result !== false;
    }



}
