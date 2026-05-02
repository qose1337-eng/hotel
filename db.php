<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "usersg");

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");


?>