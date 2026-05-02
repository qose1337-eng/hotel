<?php
session_start();
require_once('db.php');

// Проверка: авторизован ли пользователь
if (!isset($_SESSION['user'])) {
    echo "not_auth";
    exit;
}

$login = $_SESSION['user'];

// Проверяем, что пришли данные из формы
if (empty($_POST)) {
    echo "no_data";
    exit;
}

// Ищем ID пользователя в таблице userss
$user_result = mysqli_query($conn, "SELECT id FROM userss WHERE login = '$login'");
if (!$user_result) {
    echo "db_error";
    exit;
}
if (mysqli_num_rows($user_result) == 0) {
    echo "user_not_found";
    exit;
}
$user = mysqli_fetch_assoc($user_result);
$user_id = $user['id'];

// Принимаем и очищаем данные из POST
$room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
$check_in = mysqli_real_escape_string($conn, $_POST['check_in']);
$check_out = mysqli_real_escape_string($conn, $_POST['check_out']);
$guests = (int)$_POST['guests'];
$price = (int)$_POST['price'];
$status = 'pending';

// Вставляем запись в таблицу bookings
$sql = "INSERT INTO bookings (user_id, room_name, check_in, check_out, guests, price, status) 
        VALUES ('$user_id', '$room_name', '$check_in', '$check_out', '$guests', '$price', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($conn);
}
?>