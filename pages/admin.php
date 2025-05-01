<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Series;
use tvshows\SeriesRenderer;

ob_start();
?>

<h1>Bienvenue dans l'admin</h1>
<p>Bonjour <?= htmlspecialchars($_SESSION['nick'] ?? 'admin') ?> 👋</p>
<a href="logout.php">Déconnexion</a>

<!-- ici, ajoute ton interface admin CRUD -->

<?php
$content = ob_get_clean();
Template::render($content);
