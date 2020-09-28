<?php

/**
 * Created by PhpStorm.
 * User: tiuno
 * Date: 18.09.2020
 * Time: 12:53
 */
class Database
{
    // укажите свои учетные данные базы данных
    private $host = "127.0.0.1";
    private $db_name = "bitmedia";
    private $username = "mysql";
    private $password = "mysql";
    public $conn;

    // получаем соединение с БД
    public function getConnection(){

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}