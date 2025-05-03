<?php

namespace tvshows;

class TagsRenderer
{
    public string $nom; // doit être public pour que PDO puisse l’hydrater

    public function __construct()
    {
        // rien ici
    }

    public function getHTML(): string
    {
        $safeName = htmlspecialchars($this->nom);
        $encodedName = urlencode($this->nom);

        return "<a class=\"category-item\" href=\"/index.php?category={$encodedName}\">{$safeName}</a>";
    }
}
