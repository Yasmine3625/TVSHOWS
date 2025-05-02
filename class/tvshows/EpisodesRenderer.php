<?php
namespace tvshows;

class EpisodesRenderer
{
    public $cle_serie;
    public $num_saison;
    public $numero_episode;
    public $titre;
    public $duree;
    public $affichage;
    public $synopsis;

    public function getHTML()
    {
        $url = "episode.php?serie=" . urlencode($this->cle_serie)
            . "&saison=" . urlencode($this->num_saison)
            . "&episode=" . urlencode($this->numero_episode);
        return "
        <div class='episode-card'>
            <div class='episode-info'>
                <h1>Épisode " . htmlspecialchars($this->numero_episode) . ": " . htmlspecialchars($this->titre) . "</h1>
                <p><strong>Durée:</strong> " . intval($this->duree) . " min</p>
                <p class='synopsis'>" . htmlspecialchars(mb_strimwidth($this->synopsis, 0, 100, "...")) . "</p>
            </div>
        </div>
        ";
    }
}
