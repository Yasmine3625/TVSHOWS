<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once __DIR__ . '/../Autoloader.php';
require_once __DIR__ . '/../config.php';

use tvshows\Series;

// Vérification admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

$errors = [];
$cle_serie = (int)$_POST['cle_serie'];
$titre = trim($_POST['titre']);
$nb_saison = (int)$_POST['nb_saison'];
$current_image = $_POST['current_image'];

// Validation serveur
if (empty($titre)) {
    $errors[] = "Le titre est obligatoire";
} elseif (mb_strlen($titre) < 2 || mb_strlen($titre) > 100) {
    $errors[] = "Le titre doit contenir 2 à 100 caractères";
}

if ($nb_saison < 1 || $nb_saison > 50) {
    $errors[] = "Nombre de saisons invalide";
}

// Gestion image
$imagePath = $current_image;
if (!empty($_FILES['image']['tmp_name'])) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $_FILES['image']['tmp_name']);
    
    if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/webp'])) {
        $errors[] = "Format d'image non supporté";
    } elseif ($_FILES['image']['size'] > 2 * 1024 * 1024) {
        $errors[] = "L'image dépasse 2 Mo";
    } else {
        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newFilename = uniqid('serie_') . '.' . $extension;
        $uploadDir = __DIR__ . '/../uploads/';
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newFilename)) {
            $imagePath = $newFilename;
            if (!empty($current_image)) {
                @unlink($uploadDir . $current_image);
            }
        } else {
            $errors[] = "Erreur lors de l'upload";
        }
    }
}

if (empty($errors)) {
    try {
        $seriesDb = new Series();
        $success = $seriesDb->updateSerie($cle_serie, $titre, $nb_saison, $imagePath);

        if ($success) {
            $_SESSION['success_message'] = "✅ Modification réussie ! Redirection...";
            header("Location: /pages/modifier_serie.php?cle_serie=" . $cle_serie);
            exit;
        }
    } catch (Exception $e) {
        error_log("Erreur modification : " . $e->getMessage());
        $errors[] = "Erreur technique";
    }
}

$_SESSION['form_errors'] = $errors;
header("Location: /pages/modifier_serie.php?cle_serie=" . $cle_serie);
exit;
?>