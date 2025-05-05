<?php

use tvshows\AjoutSaisonForm;
use tvshows\Template;
use tvshows\Saisons;

session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

ob_start();

$cle_serie = 0;
if (isset($_GET['cle_serie'])) {
    $cle_serie = intval($_GET['cle_serie']);
} elseif (isset($_POST['cle_serie'])) {
    $cle_serie = intval($_POST['cle_serie']);
}

$form = new AjoutSaisonForm();
$form->generateForm($cle_serie);
$errors = [];

// Initialisation variables POST
$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
$numero_episode = isset($_POST['numero_episode']) ? intval($_POST['numero_episode']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debug : vérifier données reçues
    // var_dump($_POST);

    // Validation des champs
    if (empty($titre)) {
        $errors[] = "Le titre de la saison est vide.";
    }
    if ($numero_episode <= 0) {
        $errors[] = "Le numéro d'épisode doit être un nombre supérieur à 0.";
    }
    if ($cle_serie <= 0) {
        $errors[] = "La clé de la série est invalide.";
    }

    if (isset($_FILES['affichage']) && $_FILES['affichage']['error'] === UPLOAD_ERR_OK) {
        $affichage = $_FILES['affichage'];

        $imageFileType = strtolower(pathinfo($affichage['name'], PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($imageFileType, $allowedTypes)) {
            $errors[] = "L'image doit être au format JPG, JPEG, PNG ou GIF.";
        }

        if (empty($errors)) {
            $destination =  basename($affichage['name']);
            if (move_uploaded_file($affichage['tmp_name'], $destination)) {
                // Chemin relatif pour la BD et affichage web
                $affichagePath = 'images/images_series/' . basename($affichage['name']);
            } else {
                $errors[] = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        $errors[] = "L'image de la saison est vide ou une erreur s'est produite.";
    }

    if (empty($errors)) {
        $saison = new Saisons();

        // Générer une clé unique pour la nouvelle saison
        $cle = $saison->cleSaison() + 1;

        // Debug : afficher les valeurs utilisées
        // var_dump($cle, $affichagePath, $titre, $cle_serie, $numero_episode);

        $success = $saison->AjoutSaison($cle, $affichagePath, $titre, $cle_serie, $numero_episode);

        if ($success) {
            // Mettre à jour le nombre de saisons dans la table serie
            $sqlUpdate = "UPDATE serie SET nb_saison = nb_saison + 1 WHERE cle_serie = :cle_serie";
            $result = $saison->exec($sqlUpdate, ['cle_serie' => $cle_serie]);

            // Redirection vers liste des saisons (mettre le chemin correct)
            header("Location: /pages/season_list.php?cle_serie=" . $cle_serie);
            exit;
        } else {
            echo "<p style='color: red;'>Erreur lors de l'ajout dans la base de données.</p>";
        }
    } else {
        // Afficher les erreurs
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}

$content = ob_get_clean();
Template::render($content);

?>
