<?php

/**
 * Created by PhpStorm.
 * User: tiuno
 * Date: 18.09.2020
 * Time: 12:54
 */
class Users
{
    private $conn;
    private $table_name = "users";

    // свойства объекта
    public $id;

    // конструктор для соединения с базой данных
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        // выбираем все записи
        $query = "SELECT
                *
            FROM
                " . $this->table_name . "
            ORDER BY `id` ASC
            LIMIT 20";

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();

        return $stmt;
    }

    // используется при заполнении формы обновления товара
    function readOne() {

        $id = $_GET["user/id"];
        /// выбираем все записи
        $query = "SELECT * FROM `users_statistic` WHERE `user_id` = " . $id;

        // подготовка запроса
        $stmt = $this->conn->prepare($query);

        // выполняем запрос
        $stmt->execute();

        return $stmt;
    }

    public function readPaging($from_record_num, $records_per_page){
        // выборка
        $query = "SELECT
                *
            FROM
                " . $this->table_name . " p
            ORDER BY id ASC
            LIMIT ?, ?";

        // подготовка запроса
        $stmt = $this->conn->prepare( $query );

        // свяжем значения переменных
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // выполняем запрос
        $stmt->execute();

        // вернём значения из базы данных
        return $stmt;
    }

    // используется для пагинации товаров
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}