<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет | Палисадъ</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="cabinet-page-body">
    <div class="cabinet-container">
        
        <div class="header">
            <div class="nav">
                <div class="logo">ПАЛИСАДЪ</div>
                <div class="nav-links">
                    <a href="index.php">Главная</a>
                    <a href="services.php">Услуги</a>
                    <a href="photos.php">Фото</a>
                    <a href="contacts.php">Контакты</a>
                    <a href="location.php">Расположение</a>
                </div>
                <div class="nav-right">
                    <div class="lk">
                        <span><?php echo htmlspecialchars($_SESSION['user']); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="welcome-card">
            <h1>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
            <p>Это ваш личный кабинет. Здесь отображаются ваши бронирования.</p>
            <a href="logout.php" class="logout-btn">Выйти из кабинета</a>
        </div>
        
        <h3>Мои бронирования</h3>

        <?php
        // Получаем ID пользователя по логину
        $login = $_SESSION['user'];
        $user_result = mysqli_query($conn, "SELECT id FROM userss WHERE login='$login'");
        
        if (mysqli_num_rows($user_result) == 0) {
            echo "<p style='color: red;'>Ошибка: пользователь не найден</p>";
        } else {
            $user = mysqli_fetch_assoc($user_result);
            $user_id = $user['id'];
            
            // Получаем бронирования пользователя
            $bookings_result = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY created_at DESC");
            
            if (mysqli_num_rows($bookings_result) == 0) {
                echo "<p>У вас пока нет бронирований.</p>";
                echo "<p><a href='index.php' style='color: #006ce4;'>Забронировать номер →</a></p>";
            } else {
                ?>
                <div class="table-responsive">
                    <table class="bookings-table">
                        <thead>
                            <tr>
                                <th>Номер</th>
                                <th>Заезд</th>
                                <th>Выезд</th>
                                <th>Гостей</th>
                                <th>Цена</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($booking = mysqli_fetch_assoc($bookings_result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($booking['room_name']); ?></td>
                                <td><?php echo $booking['check_in']; ?></td>
                                <td><?php echo $booking['check_out']; ?></td>
                                <td><?php echo $booking['guests']; ?> чел.</td>
                                <td><?php echo number_format($booking['price'], 0, '', ' '); ?> ₽</p></td>
                                <td>
                                    <?php 
                                    if($booking['status'] == 'pending') echo '<span class="status-pending">⏳ На рассмотрении</span>';
                                    elseif($booking['status'] == 'confirmed') echo '<span class="status-confirmed">✅ Подтверждено</span>';
                                    elseif($booking['status'] == 'cancelled') echo '<span class="status-cancelled">❌ Отменено</span>';
                                    else echo $booking['status'];
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php
            }
        }
        ?>
        
        <!-- Футер как на всех страницах -->
        <div class="photo-footer">
            <div class="footer-text">
                <p>
                    Гостиница “Палисадъ” (ИП Лаптева Мария Васильевна), ИНН 352533238681, ОГРН 315352500022541 состоит в Едином реестре объектов классификации в сфере туристской индустрии РФ за номером С352025005694 от 31.07.2025.
                </p>
            </div>
        </div>
    </div>
</body>
</html>