<?php

use tvshows\AjoutSaisonForm;
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Saisons;

ob_start();

$form = new AjoutSaisonForm();

$errors = [];

$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
$affichage = isset($_POST['affichage']) ? trim(string: $_POST['affichage']) : '';
$nb_episode = isset($_POST['nb_episode']) ? intval($_POST['nb_episode']) : 0;
$cle_serie = isset($_GET['cle_serie']) ? intval($_GET['cle_serie']) : 0;
$cle = $cle_serie*100 + 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($titre)) {
        $errors[] = "Le titre de la saison est vide.";
    }

    if (empty($affichage)) {
        $errors[] = "L'image de la saison est vide.";
    }


    if (empty($errors)) {
        $saison = new Saisons();
        
        $success = $saison->AjoutSaison($cle, $affichage, $titre, $cle_serie, $nb_episode);

        if ($success) {
            $sqlUpdate = "UPDATE serie SET nb_saison = nb_saison + 1 WHERE cle_serie = :cle_serie";
            $saison->exec($sqlUpdate, ['cle_serie' => $cle_serie]);
        
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