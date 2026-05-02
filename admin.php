<?php
session_start();
require_once('db.php');

// Проверка — авторизован ли пользователь
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}

// Проверка — является ли пользователь админом
$login = $_SESSION['user'];
$user_result = mysqli_query($conn, "SELECT role FROM userss WHERE login='$login'");
$user_data = mysqli_fetch_assoc($user_result);

if ($user_data['role'] != 'admin') {
    header("Location: cabinet.php");
    exit;
}

// Обработка смены статуса
if (isset($_POST['change_status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['new_status'];
    mysqli_query($conn, "UPDATE bookings SET status='$new_status' WHERE id='$booking_id'");
    header("Location: admin.php");
    exit;
}

// Обработка удаления брони
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id='$delete_id'");
    header("Location: admin.php");
    exit;
}

// Получаем все бронирования с именами пользователей
$bookings_result = mysqli_query($conn, "SELECT b.*, u.login as user_login 
                                        FROM bookings b 
                                        JOIN userss u ON b.user_id = u.id 
                                        ORDER BY b.created_at DESC");

// Статистика
$total = mysqli_num_rows($bookings_result);
$pending = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookings WHERE status='pending'"));
$confirmed = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookings WHERE status='confirmed'"));
$cancelled = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM bookings WHERE status='cancelled'"));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель | Палисадъ</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="admin-container">
        
        <div class="admin-header">
            <h1> Админ-панель | Палисадъ</h1>
            <div>
                <span style="margin-right: 15px;"> <?php echo htmlspecialchars($_SESSION['user']); ?></span>
                <a href="index.php">На сайт</a>
                <a href="logout.php">Выйти</a>
            </div>
        </div>

        <!-- Статистика -->
        <div class="stats">
            <div class="stat-card"><div class="stat-number"><?php echo $total; ?></div><div class="stat-label">Всего броней</div></div>
            <div class="stat-card"><div class="stat-number" style="color: #d97706;"><?php echo $pending; ?></div><div class="stat-label">На рассмотрении</div></div>
            <div class="stat-card"><div class="stat-number" style="color: #16a34a;"><?php echo $confirmed; ?></div><div class="stat-label">Подтверждено</div></div>
            <div class="stat-card"><div class="stat-number" style="color: #dc2626;"><?php echo $cancelled; ?></div><div class="stat-label">Отменено</div></div>
        </div>

        <!-- Таблица бронирований -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Номер</th>
                        <th>Заезд</th>
                        <th>Выезд</th>
                        <th>Гостей</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($bookings_result)): ?>
                        <tr>
                            <form method="POST">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['user_login']); ?></td>
                                <td><?php echo htmlspecialchars($row['room_name']); ?></td>
                                <td><?php echo $row['check_in']; ?></td>
                                <td><?php echo $row['check_out']; ?></td>
                                <td><?php echo $row['guests']; ?></td>
                                <td><?php echo number_format($row['price'], 0, '', ' '); ?> ₽</td>
                                <td>
                                    <select name="new_status" class="status-select">
                                        <option value="pending" <?php if($row['status'] == 'pending') echo 'selected'; ?>>⏳ На рассмотрении</option>
                                        <option value="confirmed" <?php if($row['status'] == 'confirmed') echo 'selected'; ?>>✅ Подтверждено</option>
                                        <option value="cancelled" <?php if($row['status'] == 'cancelled') echo 'selected'; ?>>❌ Отменено</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="change_status" class="btn-save">Сохранить</button>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Удалить бронирование?')">Удалить</a>
                                </td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="admin-footer">

        </div>
    </div>
</body>
</html>