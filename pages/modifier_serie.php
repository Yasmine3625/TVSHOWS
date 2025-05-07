<?php
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: /pages/adminloginform.php");
    exit;
}

require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\Template;
use tvshows\Selection;
use tvshows\Series;

ob_start();?>

<div id="main-modif" style =" margin-top: 50px;
">
 <?php  
// Si une série est sélectionnée
if (isset($_GET['cle_serie'])) {
 $cle_serie = (int)$_GET['cle_serie'];
 $seriesDb = new Series();
 $serie = $seriesDb->getById($cle_serie);
 
 if ($serie) {
     require __DIR__ . '/form_modifier_serie.php';
 } else {
     echo "Série non trouvée";
 }
} else {
 // Afficher la liste de sélection
 
 $browser = new Selection();
 $browser->generateShop();
}
?>
</div>
<?php
$content = ob_get_clean();
Template::render($content);
?>