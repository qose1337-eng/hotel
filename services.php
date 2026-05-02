<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Палисадъ | Услуги</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="services-page-body">
    <div class="services-page-container">
        <!-- Хедер -->
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
                    <?php if(isset($_SESSION['user'])): 
                        require_once('db.php');
                        $check_admin = mysqli_query($conn, "SELECT role FROM userss WHERE login='{$_SESSION['user']}'");
                        $is_admin = false;
                        if($check_admin && mysqli_num_rows($check_admin) > 0) {
                            $admin_data = mysqli_fetch_assoc($check_admin);
                            $is_admin = ($admin_data['role'] == 'admin');
                        }
                    ?>
                        <?php if($is_admin): ?>
                            <a href="admin.php" class="admin-link">Админка</a>
                        <?php endif; ?>
                        <a href="cabinet.php" class="user-name"><?php echo htmlspecialchars($_SESSION['user']); ?></a>
                        <a href="logout.php" class="logout-link">Выйти</a>
                    <?php else: ?>
                        <a href="login.html" class="login-link">Личный кабинет</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Заголовок страницы -->
        <div class="services-title">
            <h1>Наши услуги</h1>
            <p>Всё для вашего комфортного проживания</p>
        </div>

        <!-- Список услуг -->
        <div class="services-container">

            <!-- Основные услуги -->
            <div class="service-card">
                <div class="card-title">
                    <h2>Основные услуги <span>(входят в стоимость номера)</span></h2>
                </div>
                <div class="services-list">
                    <div class="service-item"><span class="service-name">Круглосуточная стойка регистрации</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Неохраняемая бесплатная парковка с видеонаблюдением</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Вызов скорой помощи, других спецслужб</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Вызов такси</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Wi-Fi предоставляется на всей территории отеля бесплатно</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Пользование медицинской аптечкой</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Доставка в номер корреспонденции, адресованной гостю, по её получении</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Побудка к определенному времени</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Предоставление набора для мелкого ремонта одежды</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Предоставление одного комплекта посуды и столовых приборов</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Предоставление питьевой воды (Кулер на этаже)</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Смена постельного белья не реже 1 раза в 3 дня, полотенец — 1 раз в 2 дня</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Ежедневная уборка номера</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Предоставление гладильной доски и утюга</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Хранение багажа</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Приём платежей по банковским картам</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Прокат зонта</span><span class="service-free">Бесплатно</span></div>
                    <div class="service-item"><span class="service-name">Чай и чайные принадлежности в номере</span><span class="service-free">Бесплатно</span></div>
                </div>
            </div>

            <!-- Дополнительные услуги -->
            <div class="service-card">
                <div class="card-title">
                    <h2>Дополнительные услуги</h2>
                </div>
                <div class="services-list">
                    <div class="service-item"><span class="service-name">Завтрак «Шведский стол»</span><span class="service-price">500 руб/чел.</span></div>
                    <div class="service-item"><span class="service-name">Конференц зал</span><span class="service-price">4000 руб/час</span></div>
                    <div class="service-item"><span class="service-name">Бильярд</span><span class="service-price">350 руб/час</span></div>
                </div>
            </div>
        </div>

        <!-- Футер -->
        <div class="footer">
            <div class="footer-left">
                <p>Гостиница “Палисадъ” (ИП Лаптева Мария Васильевна), ИНН 352533238681, ОГРН 315352500022541 состоит в Едином реестре объектов классификации в сфере туристской индустрии РФ за номером С352025005694 от 31.07.2025.</p>
            </div>
        </div>
    </div>
</body>
</html>