<?php
session_start();
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM userss WHERE login = '$login' AND password = '$pass'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $login;
    header("Location: cabinet.php");
} else {
    header("Location: login.html?error=1");
}

mysqli_close($conn);
?>