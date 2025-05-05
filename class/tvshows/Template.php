<?php


namespace tvshows;


class Template
{

    public static function render($code): void
    { ?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>TV Shows</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
            <link rel="stylesheet" href="https://fonts.google.com/specimen/Cinzel">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>adminlogger.css">
            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>style.css">
            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>serie.css">
            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>saison.css">
            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>episode.css">
            <link rel="stylesheet" href="/../<?php echo $GLOBALS['CSS_DIR'] ?>ajoutserie.css">



        </head>

        <body>

            <?php

            include $GLOBALS['PHP_DIR'] . "pages/header.php"; ?>

            <div id="main-content">

                <?php echo $code ?>

            </div> <!-- #main-content -->
            <?php include $GLOBALS['PHP_DIR'] . "pages/footer.php" ?>
            <script>
                window.addEventListener('scroll', function () {
                    const header = document.querySelector('header');
                    if (window.scrollY > 10) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                });
            </script>

        </body>

        </html <?php
    }

}