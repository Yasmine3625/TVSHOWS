<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\AdminLogger;
use tvshows\Template;


$logger = new AdminLogger();

if (isset($_POST['username']) and isset($_POST['password'])) {
    $response = $logger->log(trim($_POST['username']), $_POST['password']);
    if ($response['granted']) {
        $nick = $response['nick'];
    }
}

?>

<?php ob_start(); ?>

<?php
if (!isset($response)):
    $logger->generateLoginForm("");
elseif (!$response['granted']): ?>
    <div id="authetication-sct">
        <?php echo "<div class='magic-card' id='error'>" . $response['error'] . "</div>";
        $logger->generateLoginForm(""); ?>
    </div>
    <?php
else:
    include "pages/admin.php";
endif;
?>
<?php
$content = ob_get_clean();
Template::render($content);
?>