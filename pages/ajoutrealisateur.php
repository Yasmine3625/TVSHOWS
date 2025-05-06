<?php

use tvshows\AjoutRealisateurFrom;
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Realisateur;

ob_start();

$cle_episode = isset($_GET['cle_episode']) && is_numeric($_GET['cle_episode']) ? intval($_GET['cle_episode']) : 0;

$form = new AjoutRealisateurFrom();
$form->generateForm($cle_episode);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $cle_episode = isset($_POST['cle_episode']) && is_numeric($_POST['cle_episode']) ? intval($_POST['cle_episode']) : 0;

    var_dump($cle_episode);

    $imageName = '';

    if (isset($_FILES['affichage']) && $_FILES['affichage']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['affichage']['tmp_name'];
        $fileName = basename($_FILES['affichage']['name']);
        $targetPath = $fileName;

        if (move_uploaded_file($tmpName, $targetPath)) {
            $imageName = $fileName;
        } else {
            $errors[] = "Erreur lors du téléchargement de l'image.";
        }
    } else {
        $errors[] = "Fichier image manquant ou invalide.";
    }

    if (empty($nom)) {
        $errors[] = "Le nom du realisateur est requis.";
    }

    if (empty($errors)) {
        $acteur = new Realisateur();
        $success = $acteur->ajouterRealisateur($nom, $imageName, $cle_episode);

        if ($success) {
            echo "<p style='color: green;'>Acteur ajouté avec succès !</p>";
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