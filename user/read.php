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
$stmt = $users->read();
$num = $stmt->rowCount();

// проверка, найдено ли больше 0 записей
if ($num>0) {

    // массив товаров
    $users_arr = [];
    $users_arr["records"] = [];

    // получаем содержимое нашей таблицы
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        // извлекаем строку
        extract($row);

        $user_item=[
            "id" => $id,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "gender" => $gender,
            "ip_adress" => $ip_adress
        ];

        array_push($users_arr["records"], $user_item);
    }

    // устанавливаем код ответа - 200 OK
    http_response_code(200);

    // выводим данные о товаре в формате JSON
    echo json_encode($users_arr);
}
else {

    // установим код ответа - 404 Не найдено
    http_response_code(404);

    // сообщаем пользователю, что пользователи не найдены
    echo json_encode(array("message" => "Пользователи не найдены."), JSON_UNESCAPED_UNICODE);
}