document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("login-form");
    
    const acteurForm = document.getElementById("ajout-acteur-form");
    const episodeForm = document.getElementById("ajout_form_episode");
    const serieForm = document.getElementById("ajout_form_serie");
    const saisonForm = document.getElementById("ajout_form_saison");
    const realisateurForm = document.getElementById("ajout_form_realisateur");


    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir vous connecter ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }
    if (acteurForm) {
        acteurForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir ajouter cet acteur ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }
    if (episodeForm) {
        episodeForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir ajouter cet episode ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }
    if (serieForm) {
        serieForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir ajouter cette serie ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }
    if (realisateurForm) {
        realisateurForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir ajouter ce realisateur ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }
    if (saisonForm) {
        saisonForm.addEventListener("submit", function (e) {
            const confirmation = confirm("Êtes-vous sûr de vouloir ajouter cette saison ?");
            if (!confirmation) {
                e.preventDefault();
            }
        });
    }

});

