document.addEventListener("DOMContentLoaded", function () {
    const forms = [
        { id: "login-form", message: "Êtes-vous sûr de vouloir vous connecter ?" },
        { id: "ajout-acteur-form", message: "Êtes-vous sûr de vouloir ajouter cet acteur ?" },
        { id: "ajout_form_episode", message: "Êtes-vous sûr de vouloir ajouter cet episode ?" },
        { id: "ajout_form_serie", message: "Êtes-vous sûr de vouloir ajouter cette serie ?" },
        { id: "ajout_form_saison", message: "Êtes-vous sûr de vouloir ajouter cette saison ?" },
        { id: "ajout_form_realisateur", message: "Êtes-vous sûr de vouloir ajouter ce realisateur ?" }
    ];

    // Fonction qui vérifie si tous les champs sont remplis
    function areFieldsFilled(form) {
        const inputs = form.querySelectorAll("input, textarea, select");
        for (let input of inputs) {
            if (input.type !== "submit" && input.value.trim() === "") {
                return false;
            }
        }
        return true;
    }

    // Fonction pour afficher la modale personnalisée avec le message
    function showCustomConfirm(message, onConfirm) {
        const modal = document.getElementById("custom-confirm");
        const msg = document.getElementById("custom-confirm-message");
        const yesBtn = document.getElementById("custom-confirm-yes");
        const noBtn = document.getElementById("custom-confirm-no");

        msg.textContent = message;  // Change le message dans la modale
        modal.classList.remove("hidden");

        // Fonction de nettoyage après la réponse de l'utilisateur
        function cleanup() {
            modal.classList.add("hidden");
            yesBtn.removeEventListener("click", yesHandler);
            noBtn.removeEventListener("click", noHandler);
        }

        function yesHandler() {
            cleanup();
            onConfirm(true);
        }

        function noHandler() {
            cleanup();
            onConfirm(false);
        }

        yesBtn.addEventListener("click", yesHandler);
        noBtn.addEventListener("click", noHandler);
    }

    forms.forEach(({ id, message }) => {
        const form = document.getElementById(id);
        if (form) {
            form.addEventListener("submit", function (e) {
                e.preventDefault();

                // Vérifie si tous les champs sont remplis
                if (!areFieldsFilled(form)) {
                    showCustomConfirm("Veuillez remplir tous les champs avant de soumettre.", function (confirmed) {
                        if (confirmed) {
                            // L'utilisateur a vu le message d'erreur dans la modale
                            // On peut afficher le message d'erreur et empêcher la soumission
                            return;
                        }
                    });
                    return;
                }

                // Si tous les champs sont remplis, on montre la confirmation de soumission
                showCustomConfirm(message, (confirmed) => {
                    if (confirmed) form.submit();
                });
            });
        }
    });
});
