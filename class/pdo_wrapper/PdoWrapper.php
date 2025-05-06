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
            $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';port=' . $db_port;

            $this->pdo = new PDO($dsn, $db_user, $db_pwd);
        } catch (\Exception $ex) {
            die("Erreur : " . $ex->getMessage());
        }



    }
    public function getPDO(): \PDO
    {
        return $this->pdo;
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