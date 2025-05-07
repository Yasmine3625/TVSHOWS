<?php
namespace tvshows;

class AdminLogger
{

    public function generateLoginForm(string $action): void
    { ?>
        <div id="login-form-container">
            <form method="post" action="<?= htmlspecialchars($action) ?>" id="login-form">
                <legend style="text-align: center">Veuillez vous connecter</legend>
                <div class="form-group">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary">SE CONNECTER</button>
            </form>
        </div>
        <div id="custom-confirm" class="custom-modal hidden">
            <div class="custom-modal-content">
                <p id="custom-confirm-message">Êtes-vous sûr ?</p>
                <div class="modal-buttons">
                    <button id="custom-confirm-yes">Oui</button>
                    <button id="custom-confirm-no">Non</button>
                </div>
            </div>
</div>

</div>

    </div>


        <?php
    }

    public function log(string $username, string $password): array
    {

        $user = "LYD-TV";
        $pwd = "L2INFO";

        $error = null;
        $nick = null;
        $granted = false;
        if (empty($username)) {
            $error = "username is empty";
        } elseif (empty($password)) {
            $error = "password is empty";
        } elseif ($user == $username and $pwd == $password) {
            $granted = true;
            $nick = htmlspecialchars("heyyyy !!!");
        } else {
            $error = "Authetication Failed";
        }
        return array(
            'granted' => $granted,
            'nick' => $nick,
            'error' => $error
        );
    

    }

}