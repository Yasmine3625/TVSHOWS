<?php
namespace tvshows;

class SeriesRenderer
{
    public $cle_serie;
    public $titre;
    public $nb_saison;
    public $image;

    public function getHTML()
    {
        // construction du chemin de l’image
        $imagePath = "/../uploads/" . $this->image;

        // retourne le bloc HTML sous forme de chaîne
        return "
        <div class='serie'>
            <div class='image-container'>
                <a href='pages/serie.php?serie=" . urlencode($this->cle_serie) . "'>
                    <img src='$imagePath' alt='Image de la série " . htmlspecialchars($this->titre) . "'>
                </a>
            </div>
            <div class='serie-label'>" . htmlspecialchars($this->titre) . " (" . intval($this->nb_saison) . " saisons)</div>
        </div>
        ";
    }
}
