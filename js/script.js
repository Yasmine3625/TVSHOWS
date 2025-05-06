document.addEventListener("DOMContentLoaded", function () {
    const forms = [
        { id: "login-form", message: "Êtes-vous sûr de vouloir vous connecter ?" },
        { id: "ajout-acteur-form", message: "Êtes-vous sûr de vouloir ajouter cet acteur ?" },
        { id: "ajout_form_episode", message: "Êtes-vous sûr de vouloir ajouter cet episode ?" },
        { id: "ajout_form_serie", message: "Êtes-vous sûr de vouloir ajouter cette serie ?" },
        { id: "ajout_form_saison", message: "Êtes-vous sûr de vouloir ajouter cette saison ?" },
        { id: "ajout_form_realisateur", message: "Êtes-vous sûr de vouloir ajouter ce realisateur ?" }
    ];

    function areFieldsFilled(form) {
        const inputs = form.querySelectorAll("input, textarea, select");
        for (let input of inputs) {
            if (input.type !== "submit" && input.value.trim() === "") {
                alert("Veuillez remplir tous les champs.");
                return false;
            }
        }
        return true;
    }

    forms.forEach(({ id, message }) => {
        const form = document.getElementById(id);
        if (form) {
            form.addEventListener("submit", function (e) {
                if (!areFieldsFilled(form)) {
                    e.preventDefault();
                    return;
                }
                const confirmation = confirm(message);
                if (!confirmation) {
                    e.preventDefault();
                }
            });
        }
    });
});
