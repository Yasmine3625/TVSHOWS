<?php
require_once __DIR__ . "/../Autoloader.php";
require_once __DIR__ . "/../config.php";

use tvshows\AdminLogger;
use tvshows\Template;



$logger = new AdminLogger();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $response = $logger->log(trim($_POST['username']), $_POST['password']);

    if ($response['granted']) {
        session_start();

        $_SESSION['admin'] = true;
        $_SESSION['nick'] = $response['nick'];
        header("Location: /index.php");
        exit;
    }
}

ob_start();
?>

<div id="login-container">
    <?php if (!isset($response)): ?>

        <?php $logger->generateLoginForm(""); ?>

    <?php elseif (!$response['granted']): ?>

        <div id="error"><?= htmlspecialchars($response['error']) ?></div>
        <?php $logger->generateLoginForm(""); ?>

    <?php endif; ?>

</div>

<?php
$content = ob_get_clean();
Template::render($content);