<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Палисадъ | Гостиница</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
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

        <div class="hero">
            <div class="hero-image">
                <img src="номера/ГЛАВНАЯ КАРТИНКА.png" alt="Гостиница Палисадъ">
            </div>
            <div class="hero-text">
                <h1>Уют и комфорт<br>в центре города</h1>
                <p>Гостиница «Палисадъ» — современный стандарт гостеприимства. Номера на любой вкус: от стандарта до свадебного люкса.</p>
            </div>
        </div>
    </div>

    <h2 class="section-title">Наши номера</h2>

    <div class="booking-button-wrapper">
        <button id="mainBookBtn" class="main-book-btn">Забронировать номер</button>
    </div>

    <div class="rooms-grid">
        <!-- Одноместный номер -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/одноместный номер.jpg" alt="Одноместный номер">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Одноместный номер</h3>
                    <p class="room-desc">Односпальная кровать, душевая кабина, фен, телевизор, телефон, сейф, холодильник.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👤</span>
                        <span>1 гость</span>
                    </div>
                    <div class="room-price">
                        <span class="price">3 500 ₽</span>
                        <span class="price-period">/ сутки</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Двухместный стандарт -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/двухместный.jpg" alt="Двухместный стандарт">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Двухместный стандарт</h3>
                    <p class="room-desc">Двуспальная кровать / раздельные кровати (по запросу), кондиционер, душевая кабина, фен, телевизор, телефон, сейф, холодильник.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👥</span>
                        <span>2 гостя</span>
                    </div>
                    <div class="room-price">
                        <span class="price">4 400 ₽</span>
                        <span class="price-period">/ сутки</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Двухместный Twin -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/двухместный.jpeg" alt="Двухместный Twin">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Двухместный (Twin)</h3>
                    <p class="room-desc">Две раздельные кровати, кондиционер, душевая, фен, телевизор, телефон, сейф, холодильник.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👥</span>
                        <span>2 гостя</span>
                    </div>
                    <div class="room-price">
                        <span class="price">4 200 ₽</span>
                        <span class="price-period">/ сутки</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Бизнес-класс мансарда -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/двухместный  бизнескалсс мансард.jpeg" alt="Бизнес-класс мансарда">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Бизнес-класс «Мансарда»</h3>
                    <p class="room-desc">Двуспальная кровать/раздельные (по запросу), кондиционер, душевая кабина, фен, телевизор, телефон, сейф, холодильник.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👥</span>
                        <span>2(+1) гостя</span>
                    </div>
                    <div class="room-price">
                        <span class="price">5 000 ₽</span>
                        <span class="price-period">/ сутки</span>
                        <span class="price-additional">+1200 ₽ доп. место</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Улучшенный с балконом -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/двухместный улучшеный с балконом.jpg" alt="Улучшенный с балконом">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Улучшенный с балконом</h3>
                    <p class="room-desc">Двуспальная кровать, кондиционер, душевая кабина, фен, телевизор, телефон, сейф, холодильник, отдельный балкон.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👥</span>
                        <span>2 гостя</span>
                    </div>
                    <div class="room-price">
                        <span class="price">5 400 ₽</span>
                        <span class="price-period">/ сутки</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Свадебный номер -->
        <div class="room-card">
            <div class="room-image">
                <img src="номера/двухместный свадебный.jpg" alt="Свадебный номер">
            </div>
            <div class="room-content">
                <div class="room-info">
                    <h3>Свадебный номер</h3>
                    <p class="room-desc">Роскошный декор, двуспальная кровать, кондиционер, душевая, фен, ТВ, сейф, холодильник. Идеально для молодожёнов.</p>
                </div>
                <div class="room-details">
                    <div class="room-capacity">
                        <span>👥</span>
                        <span>2 гостя</span>
                    </div>
                    <div class="room-price">
                        <span class="price">6 500 ₽</span>
                        <span class="price-period">/ сутки</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="footer-left">
            <p>
                Гостиница “Палисадъ” (ИП Лаптева Мария Васильевна), ИНН 352533238681, ОГРН 315352500022541 состоит в Едином реестре объектов классификации в сфере туристской индустрии РФ за номером С352025005694 от 31.07.2025.
            </p>
        </div>
    </div>
</div>

<!-- Модальное окно бронирования -->
<div id="bookingModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Бронирование номера</h2>
            <button class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <form id="bookingForm">
                <div class="booking-form-group">
                    <label>Ваше имя</label>
                    <input type="text" id="guestName" required placeholder="Иванов Иван">
                </div>
                <div class="booking-form-group">
                    <label>Телефон</label>
                    <input type="tel" id="guestPhone" required placeholder="+7 (999) 123-45-67">
                </div>
                <div class="booking-form-group">
                    <label>Email</label>
                    <input type="email" id="guestEmail" required placeholder="example@mail.ru">
                </div>
                <div class="booking-form-group">
                    <label>Количество гостей</label>
                    <input type="number" id="guestCount" required placeholder="1" min="1" max="5" value="1">
                </div>
                <div class="booking-form-group">
                    <label>Выберите номер</label>
                    <select name="room_name" id="roomName" required>
                        <option value="Одноместный номер|3500">Одноместный номер — 3500 ₽</option>
                        <option value="Двухместный стандарт|4400">Двухместный стандарт — 4400 ₽</option>
                        <option value="Двухместный Twin|4200">Двухместный Twin — 4200 ₽</option>
                        <option value="Бизнес-класс Мансарда|5000">Бизнес-класс Мансарда — 5000 ₽</option>
                        <option value="Улучшенный с балконом|5400">Улучшенный с балконом — 5400 ₽</option>
                        <option value="Свадебный номер|6500">Свадебный номер — 6500 ₽</option>
                    </select>
                </div>
                <div class="date-row">
                    <div class="booking-form-group">
                        <label>Дата заезда</label>
                        <input type="date" id="checkIn" required>
                    </div>
                    <div class="booking-form-group">
                        <label>Дата выезда</label>
                        <input type="date" id="checkOut" required>
                    </div>
                </div>
                <button type="submit" class="booking-submit">Забронировать</button>
            </form>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>