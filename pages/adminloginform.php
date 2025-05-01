<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\AdminLogger;
use tvshows\Template;

session_start();

$logger = new AdminLogger();

// Traitement du formulaire
if (isset($_POST['username']) && isset($_POST['password'])) {
    $response = $logger->log(trim($_POST['username']), $_POST['password']);

    if ($response['granted']) {
        $_SESSION['admin'] = true;
        $_SESSION['nick'] = $response['nick'];
        header("Location: /pages/admin.php");
        exit;
    }
}

ob_start();
?>

<?php if (!isset($response)): ?>
    <?php $logger->generateLoginForm(""); ?>

<?php elseif (!$response['granted']): ?>
    <div id="authentication-sct">
        <div class="magic-card" id="error"><?= htmlspecialchars($response['error']) ?></div>
        <?php $logger->generateLoginForm(""); ?>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
Template::render($content);
