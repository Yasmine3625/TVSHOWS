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

$cle_saison = isset($_GET['id_saison']) && is_numeric($_GET['id_saison']) ? intval($_GET['id_saison']) : 0;

$form = new AjoutActeurForm();
$form->generateForm($cle_saison);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $cle_saison = isset($_POST['id_saison']) && is_numeric($_POST['id_saison']) ? intval($_POST['id_saison']) : 0;


    $imageName = '';

    if (isset($_FILES['affichage']) && $_FILES['affichage']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['affichage']['tmp_name'];
        $fileName = basename($_FILES['affichage']['name']);
        $targetDir = __DIR__ . '/../upload/';
        $targetPath = $targetDir . $fileName;

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($tmpName, $targetPath)) {
            $imageName = $fileName;
        } else {
            $errors[] = "Erreur lors du téléchargement de l'image.";
        }
    } else {
        $errors[] = "Fichier image manquant ou invalide.";
    }

    if (empty($nom)) {
        $errors[] = "Le nom de l'acteur est requis.";
    }

    if (empty($errors)) {
        $acteur = new Acteur();
        $success = $acteur->ajouterActeur($nom, $imageName, $cle_saison);

    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

$content = ob_get_clean();
Template::render($content);
?>