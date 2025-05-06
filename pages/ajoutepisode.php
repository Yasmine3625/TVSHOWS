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

// Récupérer l'ID de la saison depuis l'URL (GET)
$id_saison = isset($_GET['id_saison']) && is_numeric($_GET['id_saison']) ? intval($_GET['id_saison']) : 0;

// Affichage du formulaire avec l'ID de la saison
$form = new AjoutEpisodeForm();
$form->generateForm($id_saison);


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $synopsis = trim($_POST['synopsis'] ?? '');
    $duree = trim($_POST['duree'] ?? '');
    $numero_episode = isset($_POST['numero_episode']) ? intval($_POST['numero_episode']) : 0;

    $id_saison = isset($_POST['id_saison']) && is_numeric($_POST['id_saison']) ? intval($_POST['id_saison']) : 0;
    $cle = $id_saison + 1000 * $numero_episode;
    if (empty($titre)) {
        $errors[] = "Le titre de l'épisode est requis.";
    }

    if (empty($synopsis)) {
        $errors[] = "Le synopsis de l'épisode est requis.";
    }

    if (empty($duree)) {
        $errors[] = "La durée de l'épisode est requise.";
    }

    if ($numero_episode <= 0) {
        $errors[] = "Le numéro de l'épisode doit être un nombre positif.";
    }

    if (empty($errors)) {
        $episode = new Episode();
        $success = $episode->ajouterEpisode($cle, $synopsis, $duree, $titre, $id_saison, $numero_episode);

        if ($success) {
            $sqlUpdate = "UPDATE saison SET nb_episode = nb_episode + 1 WHERE cle_saison = :cle_saison";
            $episode->exec($sqlUpdate, ['cle_saison' => $id_saison]);
            echo "<p style='color: green;'>L'épisode a été ajouté avec succès !</p>";
        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout dans la base de données.</p>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

$content = ob_get_clean();
Template::render($content);
?>