<?php
$isAdminLogged = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>


<header>
    <div id="logo-container">
        <h1 class="main-title">LYD-TV</h1>
    </div>

    <div id="nav-bar">
        <a class="nav-btn-acc" href="/../index.php" title="Accueil">
            <i class="fas fa-home"></i>
        </a>
        <div class="search-bar">
            <form action="/pages/search_results.php" method="get" style="display: flex;">
                <button type="submit" class="search-button">
                    <i class="fas fa-search search-icon"></i>
                </button>
                <input type="text" name="search" placeholder="Rechercher une série..." class="search-input" />

            </form>

        </div>
        <?php if ($isAdminLogged): ?>
<!-- Bouton Déconnexion -->
<a href="#" class="nav-btn-log" onclick="showLogoutModal()">Déconnexion</a>

<!-- Fenêtre modale personnalisée -->
<div id="custom-confirm" class="custom-modal hidden">
    <div class="custom-modal-content">
        <p id="custom-confirm-message">Voulez-vous vraiment vous déconnecter ?</p>
        <div class="modal-buttons">
            <button id="custom-confirm-yes" onclick="logout()">Oui</button>
            <button id="custom-confirm-no" onclick="closeLogoutModal()">Non</button>
        </div>
    </div>
</div>

<script>
    function showLogoutModal() {
        document.getElementById('custom-confirm').classList.remove('hidden');
    }

    function closeLogoutModal() {
        document.getElementById('custom-confirm').classList.add('hidden');
    }

    function logout() {
        window.location.href = "/pages/logout.php";
    }
</script>
        <?php else: ?>
            <a href="/../pages/adminloginform.php"  class="nav-btn-log" id="btn-admin-Login" role="button">Connexion</a>
        <?php endif ?>
    </div>



</header>