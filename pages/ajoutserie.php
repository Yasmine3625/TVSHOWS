<?php

use tvshows\AjoutSerieForm;
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\AjoutSerie;

ob_start();

$form = new AjoutSerieForm();
$form->generateForm();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre']);
    $tags = $_POST['tags'] ?? [];

    if (isset($_FILES['le_fichier']) && $_FILES['le_fichier']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['le_fichier']['tmp_name'];
        $fileName = basename($_FILES['le_fichier']['name']);
        $targetDir = __DIR__ . '/../uploads/';
        $targetPath = $targetDir . $fileName;

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($tmpName, $targetPath)) {
            $series = new Series();
            $success = $series->AjoutSerie($titre, 0, $fileName);

            if ($success) {
                $lastId = $series->getLastInsertId(); // À ajouter dans Series si pas encore fait
                foreach ($tags as $tagId) {
                    $series->exec("INSERT INTO serie_tag (cle_serie, cle_tag) VALUES (?, ?)", [$lastId, $tagId]);
                }
                echo "<p style='color: green;'> Série ajoutée avec succès !</p>";
            } else {
                echo "<p style='color: red;'> Erreur lors de l'ajout dans la base.</p>";
            }
        } else {
            echo "<p style='color: red;'>Erreur lors du téléchargement du fichier.</p>";
        }
    } else {
        echo "<p style='color: red;'> Fichier image manquant ou invalide.</p>";
    }
}

$content = ob_get_clean();
Template::render($content);
