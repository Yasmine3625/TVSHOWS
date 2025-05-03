<?php
$tagDb = new Tags();
        $tags = $tagDb->exec("SELECT * FROM tag ORDER BY nom", null, 'tvshows\TagsRenderer');

        foreach ($tags as $tag) {
            echo $tag->getHTML();
        }