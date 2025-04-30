<?php
namespace tvshows;

class AdminLogger
{

    public function generateLoginForm(string $action): void
    { ?>
        <div id="login-form-container">
            <form method="post" action="<?php $action ?>" id="login-form">
                <legend style="text-align: center">Please Login</legend>
                <div class="form-group">
                    <input type="text" name="username" placeholder="username">
                    <input type="password" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>


        <?php
    }

    public function log(string $username, string $password): array
    {

        // les data devraient être récupérées dans une base de données...
        $user = "yasmine";
        $pwd = "labchri";

        $error = null;
        $nick = null;
        $granted = false;
        if (empty($username)) {
            $error = "username is empty";
        } elseif (empty($password)) {
            $error = "password is empty";
        } elseif ($user == $username and $pwd == $password) {
            $granted = true;
            $nick = htmlspecialchars("heyyyy !!!"); // devrait provenir d'un BD...
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