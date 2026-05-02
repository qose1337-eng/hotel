<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Палисадъ | Контакты</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="contacts-page-body">
    <div class="contacts-page-container">
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

        <!-- Заголовок -->
        <div class="contacts-title">
            <h1>Контакты</h1>
            <p>Свяжитесь с нами любым удобным способом</p>
        </div>

        <!-- Контакты и карта -->
        <div class="contacts-content">
            <!-- Информация о контактах -->
            <div class="contacts-info">
                <h2>Гостиница «Палисадъ»</h2>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="currentColor" fill="none"/>
                            <circle cx="12" cy="9" r="3" stroke="currentColor" fill="none"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <div class="contact-label">Адрес</div>
                        <div class="contact-value">160035, г. Вологда, ул. Торговая площадь, д. 17 (ул. Орлова, д. 7)</div>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M22 6L12 13 2 6" stroke="currentColor" fill="none"/>
                            <rect x="2" y="4" width="20" height="16" rx="2" stroke="currentColor" fill="none"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <div class="contact-label">E-mail</div>
                        <div class="contact-value"><a href="mailto:palisad@vologda.ru">palisad@vologda.ru</a></div>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.574 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" fill="none"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <div class="contact-label">Телефон / факс</div>
                        <div class="contact-value"><a href="tel:+78172202024">8 (8172) 20-20-24</a></div>
                    </div>
                </div>
            </div>

            <!-- Карта -->
            <div class="contacts-map">
                <h2>Как нас найти</h2>
                <div class="map-container">
                    <iframe 
                        src="https://yandex.ru/map-widget/v1/?ll=39.886377,59.223638&z=17&pt=39.886377,59.223638,pmrdl1"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Реквизиты -->
        <div class="contacts-details">
            <h2>Реквизиты</h2>
            <div class="details-grid">
                <div class="detail-item">
                    <div class="detail-label">ИНН</div>
                    <div class="detail-value">352533238681</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">ОГРН</div>
                    <div class="detail-value">315352500022541</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">Номер классификации</div>
                    <div class="detail-value">С352025005694 от 31.07.2025</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">ИП</div>
                    <div class="detail-value">Лаптева Мария Васильевна</div>
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