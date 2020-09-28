<?php
/**
 * Created by PhpStorm.
 * User: tiuno
 * Date: 18.09.2020
 * Time: 12:58
 */
// подключение базы данных и файл, содержащий объекты
include_once '../config/Database.php';
include_once '../objects/Users.php';

// необходимые HTTP-заголовки
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// получаем соединение с базой данных
$database = new Database();
$db = $database->getConnection();

// инициализируем объект
$users = new Users($db);

// запрашиваем товары
$stmt = $users->readOne();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num>0) {

    // массив пользователей
    $stats_arr = [];
    $stats_arr["records"] = [];

    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // извлекаем строку
        extract($row);

        $stats_item=[
            "id" => $id,
            "user_id" => $user_id,
            "date" => $date,
            "page_views" => $page_views,
            "clicks" => $clicks,
        ];

        array_push($stats_arr["records"], $stats_item);
    }

    // устанавливаем код ответа - 200 OK
    http_response_code(200);

    // выводим данные о статистике в формате JSON
    echo json_encode($stats_arr);
}
else {

    // установим код ответа - 404 Не найдено
    http_response_code(404);

    // сообщаем пользователю, что статистика не найдена
    echo json_encode(array("message" => "Статистика не найдена."), JSON_UNESCAPED_UNICODE);
}