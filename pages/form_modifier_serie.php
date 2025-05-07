<?php

if (!isset($serie)) {
    die("Accès interdit");
}
?>

<div class="form-modifier-serie"
    style="max-width: 450px; margin: 0 auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
    <?php if (!empty($_SESSION['success_message'])): ?>
        <div class="success-message"
            style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 16px; text-align: center; font-weight: bold;">
            <?= htmlspecialchars($_SESSION['success_message']) ?>
            <div class="redirect-countdown" style="font-size: 0.9rem; margin-top: 6px;">Redirection dans <span
                    id="countdown">3</span> secondes...</div>
        </div>
        <?php unset($_SESSION['success_message']); ?>
        <script>
            let seconds = 3;
            const countdownEl = document.getElementById('countdown');
            const interval = setInterval(() => {
                seconds--;
                countdownEl.textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(interval);
                    window.location.href = '/index.php';
                }
            }, 1000);
        </script>
    <?php endif; ?>

    <?php if (!empty($_SESSION['form_errors'])): ?>
        <div class="alert-errors"
            style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 16px;">
            <?php foreach ($_SESSION['form_errors'] as $error): ?>
                <p class="error" style="margin: 5px 0;"><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
        <?php unset($_SESSION['form_errors']); ?>
    <?php endif; ?>

    <form method="POST" action="/pages/traitement_modifier_serie.php" enctype="multipart/form-data"
        class="modifier-form" style="display: flex; flex-direction: column;">
        <input type="hidden" name="cle_serie" value="<?= htmlspecialchars($serie->cle_serie) ?>">
        <input type="hidden" name="current_image" value="<?= htmlspecialchars($serie->image) ?>">

        <label for="titre" style="font-weight: 600; margin-bottom: 5px;">Titre* :</label>
        <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($serie->titre) ?>" required minlength="2"
            maxlength="100" placeholder="Ex : The Rookie"
            style="margin-bottom: 15px; padding: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 1rem;">

        <label for="nb_saison" style="font-weight: 600; margin-bottom: 5px;">Nombre de saisons* :</label>
        <input type="number" id="nb_saison" name="nb_saison" value="<?= htmlspecialchars($serie->nb_saison) ?>" min="1"
            max="50" required
            style="margin-bottom: 15px; padding: 8px; border-radius: 5px; border: 1px solid #ccc; font-size: 1rem;">

        <label for="image" style="font-weight: 600; margin-bottom: 5px;">Changer l'image :</label>
        <input type="file" id="image" name="image" accept="image/jpeg, image/png, image/webp"
            style="margin-bottom: 10px;">

        <?php if (!empty($serie->image)): ?>
            <div class="current-image-preview" style="text-align: center; margin-bottom: 15px;">
                <img src="/uploads/<?= htmlspecialchars($serie->image) ?>"
                    alt="Affiche actuelle de <?= htmlspecialchars($serie->titre) ?>"
                    style="max-width: 100%; max-height: 140px; border-radius: 8px; box-shadow: 0 3px 8px rgba(0,0,0,0.12);">
                <p style="color: #666; font-size: 0.9rem; margin-top: 4px; word-break: break-word;">
                    <?= htmlspecialchars($serie->image) ?>
                </p>
            </div>
        <?php endif; ?>

        <div class="form-actions" style="display: flex; justify-content: space-between; gap: 10px;">
            <button type="submit" class="btn-save"
                style="flex-grow: 1; background: #007bff; color: white; padding: 10px 18px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;">Enregistrer</button>
            <a href="/pages/selectionserie.php" class="btn-cancel"
                style="flex-grow: 1; text-align: center; padding: 10px 18px; border: 2px solid #ccc; border-radius: 6px; color: #555; text-decoration: none; font-weight: 600;">Annuler</a>
        </div>
    </form>
</div>