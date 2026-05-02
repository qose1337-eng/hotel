<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Палисадъ | Фото</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="photo-page-body">
    <div class="photo-page-container">
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
        <div class="photo-title">
            <h1>Фотогалерея</h1>
            <p>Интерьеры номеров и территории отеля</p>
        </div>

        <!-- Список категорий с фото -->
        <div class="photo-categories">

            <!-- Первая категория (стандарт) одноместный - 5 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>Одноместный номер</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/1.jpg" alt="Одноместный номер 1"></div>
                    <div class="photo-item"><img src="фото/12.jpg" alt="Одноместный номер 2"></div>
                    <div class="photo-item"><img src="фото/13.jpg" alt="Одноместный номер 3"></div>
                    <div class="photo-item"><img src="фото/14.jpg" alt="Одноместный номер 4"></div>
                    <div class="photo-item"><img src="фото/15.jpg" alt="Одноместный номер 5"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) с двуспальной кроватью - 4 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>С двуспальной кроватью</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/2.jpg" alt="Двуспальный номер 1"></div>
                    <div class="photo-item"><img src="фото/21.jpg" alt="Двуспальный номер 2"></div>
                    <div class="photo-item"><img src="фото/22.jpg" alt="Двуспальный номер 3"></div>
                    <div class="photo-item"><img src="фото/23.jpg" alt="Двуспальный номер 4"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) 2 односпальные кровати - 3 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>2 односпальные кровати (Twin)</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/3.jpeg" alt="Twin номер 1"></div>
                    <div class="photo-item"><img src="фото/31.jpeg" alt="Twin номер 2"></div>
                    <div class="photo-item"><img src="фото/32.jpeg" alt="Twin номер 3"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) «Бизнес-класс мансарда» - 8 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>«Бизнес-класс мансарда»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/4.jpeg" alt="Бизнес класс 2"></div>
                    <div class="photo-item"><img src="фото/42.jpeg" alt="Бизнес класс 3"></div>
                    <div class="photo-item"><img src="фото/43.jpeg" alt="Бизнес класс 4"></div>
                    <div class="photo-item"><img src="фото/44.jpeg" alt="Бизнес класс 5"></div>
                    <div class="photo-item"><img src="фото/45.jpeg" alt="Бизнес класс 6"></div>
                    <div class="photo-item"><img src="фото/46.jpeg" alt="Бизнес класс 7"></div>
                    <div class="photo-item"><img src="фото/47.jpg" alt="Бизнес класс 8"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) «Улучшенный с балконом» - 4 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>«Улучшенный с балконом»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/5.jpg" alt="С балконом 1"></div>
                    <div class="photo-item"><img src="фото/51.jpg" alt="С балконом 2"></div>
                    <div class="photo-item"><img src="фото/52.jpg" alt="С балконом 3"></div>
                    <div class="photo-item"><img src="фото/53.jpg" alt="С балконом 4"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) «Улучшенный мансардный» - 4 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>«Улучшенный мансардный»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/6.jpeg" alt="Мансарда 1"></div>
                    <div class="photo-item"><img src="фото/61.jpg" alt="Мансарда 2"></div>
                    <div class="photo-item"><img src="фото/62.jpg" alt="Мансарда 3"></div>
                    <div class="photo-item"><img src="фото/63.jpg" alt="Мансарда 4"></div>
                </div>
            </div>

            <!-- Категория «Люкс» - 7 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Люкс Категория <span>«Люкс»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/7.jpg" alt="Люкс 1"></div>
                    <div class="photo-item"><img src="фото/71.jpg" alt="Люкс 2"></div>
                    <div class="photo-item"><img src="фото/72.jpg" alt="Люкс 3"></div>
                    <div class="photo-item"><img src="фото/73.jpg" alt="Люкс 4"></div>
                    <div class="photo-item"><img src="фото/74.jpg" alt="Люкс 5"></div>
                    <div class="photo-item"><img src="фото/75.jpg" alt="Люкс 6"></div>
                    <div class="photo-item"><img src="фото/76.jpg" alt="Люкс 7"></div>
                </div>
            </div>

            <!-- Первая категория (стандарт) «Свадебный» - 4 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Первая категория (стандарт) <span>«Свадебный»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/8.jpg" alt="Свадебный 1"></div>
                    <div class="photo-item"><img src="фото/81.jpg" alt="Свадебный 2"></div>
                    <div class="photo-item"><img src="фото/82.jpg" alt="Свадебный 3"></div>
                    <div class="photo-item"><img src="фото/83.jpg" alt="Свадебный 4"></div>
                </div>
            </div>

            <!-- Ресторан «Монблан» - 6 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Ресторан <span>«Монблан»</span></h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/9.jpg" alt="Ресторан 1"></div>
                    <div class="photo-item"><img src="фото/91.jpg" alt="Ресторан 2"></div>
                    <div class="photo-item"><img src="фото/92.jpg" alt="Ресторан 3"></div>
                    <div class="photo-item"><img src="фото/93.jpg" alt="Ресторан 4"></div>
                    <div class="photo-item"><img src="фото/94.jpg" alt="Ресторан 5"></div>
                    <div class="photo-item"><img src="фото/95.jpg" alt="Ресторан 6"></div>
                </div>
            </div>

            <!-- Конференц-зал - 4 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Конференц-зал</h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/zal1.jpg" alt="Конференц-зал 1"></div>
                    <div class="photo-item"><img src="фото/zal2.jpg" alt="Конференц-зал 2"></div>
                    <div class="photo-item"><img src="фото/zal3.jpg" alt="Конференц-зал 3"></div>
                    <div class="photo-item"><img src="фото/zal4.jpg" alt="Конференц-зал 4"></div>
                </div>
            </div>

            <!-- Бильярд - 2 фото -->
            <div class="photo-category">
                <div class="category-header">
                    <h2>Бильярд</h2>
                </div>
                <div class="photo-gallery">
                    <div class="photo-item"><img src="фото/b1.jpeg" alt="Бильярд 1"></div>
                    <div class="photo-item"><img src="фото/b2.jpeg" alt="Бильярд 2"></div>
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