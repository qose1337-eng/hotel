<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "usersg");

$login = $_POST['login'];
$pass = $_POST['pass'];

$check = mysqli_query($conn, "SELECT * FROM userss WHERE login='$login'");

if (mysqli_num_rows($check) > 0) {
    echo "Такой логин уже существует! <a href='register.html'>Попробовать снова</a>";
} else {
    $sql = "INSERT INTO userss (login, password) VALUES ('$login', '$pass')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.html");
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
}
?>