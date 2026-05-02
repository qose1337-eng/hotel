document.addEventListener('DOMContentLoaded', function() {
    console.log('Скрипт работает!');
    
    const btn = document.getElementById('mainBookBtn');
    const modal = document.getElementById('bookingModal');
    const closeBtn = document.querySelector('.modal-close');
    const bookingForm = document.getElementById('bookingForm');
    
    // Открытие модального окна
    if (btn && modal) {
        btn.addEventListener('click', function() {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    }
    
    // Закрытие по крестику
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        });
    }
    
    // Закрытие по клику на фон
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    }
    
    // ОТПРАВКА ФОРМЫ - ЭТО БЫЛО ПРОПУЩЕНО!
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Получаем данные из формы
            const guestName = document.getElementById('guestName').value;
            const guestPhone = document.getElementById('guestPhone').value;
            const guestEmail = document.getElementById('guestEmail').value;
            const checkIn = document.getElementById('checkIn').value;
            const checkOut = document.getElementById('checkOut').value;
            const roomSelect = document.getElementById('roomName');
            const roomValue = roomSelect.value;
            
            // Разбираем номер и цену (формат: "Название|Цена")
            const roomParts = roomValue.split('|');
            const roomName = roomParts[0];
            const price = parseInt(roomParts[1]);
            
            // Считаем количество дней
            const days = (new Date(checkOut) - new Date(checkIn)) / (1000 * 60 * 60 * 24);
            const totalPrice = price * days;
            
            // Отправляем данные на сервер
            fetch('book.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'room_name': roomName,
                    'check_in': checkIn,
                    'check_out': checkOut,
                    'guests': 1,
                    'price': totalPrice,
                    'name': guestName,
                    'phone': guestPhone,
                    'email': guestEmail
                })
            })
            .then(response => response.text())
            .then(data => {
                console.log('Ответ сервера:', data);
                if(data.includes('Успех') || data.includes('success')) {
                    alert(`Спасибо, ${guestName}! Ваше бронирование отправлено.`);
                    modal.classList.remove('show');
                    bookingForm.reset();
                } else if(data.includes('авторизованы')) {
                    alert('Пожалуйста, войдите в личный кабинет для бронирования');
                    window.location.href = 'login.html';
                } else {
                    alert('Ошибка при бронировании: ' + data);
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                alert('Ошибка соединения с сервером');
            });
        });
    }
});