<?php

use tvshows\AjoutSaisonForm;
session_start();

// Redirection si non admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

// Chargement des dépendances
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Saisons;

ob_start();

// Affiche le formulaire
$form = new AjoutSaisonForm();
$form->generateForm();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
    $nb_episode = isset($_POST['nb_episode']) ? (int)$_POST['nb_episode'] : 0;

    if (empty($titre)) {
        echo "<p style='color: red;'>Le titre est requis.</p>";
    } elseif (!isset($_FILES['le_fichier']) || $_FILES['le_fichier']['error'] !== UPLOAD_ERR_OK) {
        echo "<p style='color: red;'>Fichier image manquant ou invalide.</p>";
    } else {
        $tmpName = $_FILES['le_fichier']['tmp_name'];
        $fileName = basename($_FILES['le_fichier']['name']);
        $targetDir = __DIR__ . '/../uploads/';
        $targetPath = $targetDir . $fileName;

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($tmpName, $targetPath)) {
            $saisons = new Saisons();
            $success = $saisons->AjoutSaison($titre, 0, $fileName);

            if ($success) {
                echo "<p style='color: green;'>Saison ajoutée avec succès !</p>";
            } else {
                echo "<p style='color: red;'>Erreur lors de l'ajout dans la base.</p>";
            }
        } else {
            echo "<p style='color: red;'>Erreur lors du téléchargement du fichier.</p>";
        }
    }
}

$content = ob_get_clean();
Template::render($content);
