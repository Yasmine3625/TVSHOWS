<?php

use tvshows\AjoutEpisodeForm;
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Episode;

ob_start();

$form = new AjoutEpisodeForm();

$errors = [];

$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
$synopsis = isset($_POST['synopsis']) ? trim($_POST['synopsis']) : '';
$duree = isset($_POST['duree']) ? trim($_POST['duree']) : '';
$numero_episode = isset($_POST['numero_episode']) ? intval($_POST['numero_episode']) : 0;
$id_saison = isset($_GET['id_saison']) ? intval($_GET['id_saison']) : 0;
$cle = $id_saison + 1000;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($titre)) {
        $errors[] = "Le titre de l'épisode est vide.";
    }

    if (empty($synopsis)) {
        $errors[] = "Le synopsis de l'épisode est vide.";
    }

    if (empty($duree)) {
        $errors[] = "La durée de l'épisode est vide.";
    }

    if (empty($errors)) {
        $episode = new Episode();
        $success = $episode->ajoutEpisode($cle, $synopsis, $duree, $titre, $id_saison, $numero_episode);

        if ($success) {

            $sqlUpdate = "UPDATE saison SET nb_episode = nb_episode + 1 WHERE cle_saison = :cle_saison";
            $episode->exec($sqlUpdate, ['cle_saison' => $id_saison]);


        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout dans la base de données.</p>";
        }
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}

$form->generateForm();

$content = ob_get_clean();
Template::render($content);
?>