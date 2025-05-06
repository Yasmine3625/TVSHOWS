<?php
namespace tvshows;

include __DIR__ . "/../../DB_CREDENTIALS.php";

use pdo_wrapper\PdoWrapper;

class Episode extends PdoWrapper
{
    public function getAllEpisodes()
    {
        return $this->exec("SELECT * FROM episode ORDER BY titre", null, 'tvshows\EpisodesRenderer');
    }

    public function getBySerieSaisonEtNumero($cleSerie, $numSaison, $numEpisode)
    {
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

    public function ajouterEpisode(int $cle, string $synopsis, string $duree, string $titre, int $id_saison, int $numero_episode): bool
    {
        $sql = "INSERT INTO episode (cle_episode, synopsis, duree, titre, id_saison, numero_episode) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->exec($sql, [$cle, $synopsis, $duree, $titre, $id_saison, $numero_episode]) !== false;
    }

    public function supprimerEpisode(int $id_saison, int $num_episode): bool
    {
        $sql = "DELETE FROM episode WHERE id_saison = :saison AND numero_episode = :numero";
        $result = $this->exec($sql, ['saison' => $id_saison, 'numero' => $num_episode]);

        if ($result) {
            $updateSql = "UPDATE saison SET nb_episode = nb_episode - 1 WHERE cle_saison = :saison";
            $this->exec($updateSql, ['saison' => $id_saison]);
        }

        return $result !== false;
    }

}