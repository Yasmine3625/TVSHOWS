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
use tvshows\Selection ;

$browser = new Selection() ;
?>

<?php ob_start() ?>


<?php $browser->generateGrid() ?>

<?php $code = ob_get_clean() ?>
<?php Template::render($code); ?>