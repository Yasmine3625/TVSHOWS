<?php
namespace pdo_wrapper;

use \PDO;

class PdoWrapper
{

    private $db_name;
    private $db_user;
    private $db_pwd;
    private $db_host;
    private $db_port;
    private $pdo;

    public function __construct($db_name = "tv_shows", $db_host = '127.0.0.1', $db_port = '3306', $db_user = 'root', $db_pwd = '')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;

        try {
            // Agrégation des informations de connexion dans une chaine DSN (Data Source Name)
            $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';port=' . $db_port;

            // Connexion et récupération de l'objet connecté
            $pdo = new PDO($dsn, $db_user, $db_pwd);
        }

        // Récupération d'une éventuelle erreur
        catch (\Exception $ex) {
            // Arrêt de l'exécution du script PHP
            die("Erreur : " . $ex->getMessage());
        }

        // Si pas d'erreur : poursuite de l'exécution
        echo "Connexion OK<br>";

    }

    public function exec($statement, $params, $classname = null)
    {
        $res = $this->pdo->prepare($statement);
        $res->execute($params) or die(print_r($res->errorInfo()));

        if ($classname != null) {
            $data = $res->fetchAll(PDO::FETCH_CLASS, $classname);
        } else {
            $data = $res->fetchAll(PDO::FETCH_OBJ);
        }

        return $data;
    }

}