<?php

namespace tvshows;

class TagsRenderer
{
    public string $nom;

    public function getHTML(): string
    {
        $safeName = htmlspecialchars(ucfirst($this->nom));
        $encodedName = urlencode($this->nom);

        return "<a class=\"category-item\" href=\"/index.php?category={$encodedName}\">{$safeName}</a>";
    }
}

