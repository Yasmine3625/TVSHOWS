<?php

use tvshows\AjoutActeurForm;
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Acteur;

ob_start();

$form = new AjoutActeurForm();

$errors = [];

$nom = isset($_POST['nom']) ? trim($_POST['nom']) : '';
$affichage = isset($_POST['affichage']) ? trim(string: $_POST['affichage']) : '';
$id_saison = isset($_GET['cle_saison']) ? intval($_GET['cle_saison']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nom)) {
        $errors[] = "Le nom de l'acteur est vide.";
    }

    if (empty($affichage)) {
        $errors[] = "L'image de l'acteur est vide.";
    }

    if (empty($errors)) {
        $acteur = new Acteur();
        $cle = $acteur->cleActeur()+1;

        $success = $acteur->ajouterActeur($nom, $affichage, $id_saison);

        if ($success) {
            echo "<p style='color: green;'>L'épisode a été ajouté avec succès !</p>";
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