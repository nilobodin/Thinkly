const btnOpenModal = document.getElementById('btn_modal_open');
const modalWindow = document.getElementById('modal');
const btnOpenAuth = document.getElementById('auth-btn');
const btnOpenReg = document.getElementById('reg-btn');
const authForm = document.getElementById('auth-form');
const regForm = document.getElementById('reg-form');
let forms = document.querySelectorAll('#auth-form, #reg-form');

// Открытие модального окна
if (btnOpenModal) {
  btnOpenModal.addEventListener('click', () => {
    modalWindow.showModal();
    // document.body.style = ('overflow: hidden'); Спорное решение с запретом скрола body когда модальное окно запущено
    modalWindow.classList.remove('closing');
  });
}

// Закрытие модального окна, если нажали на область вне окна
modalWindow.addEventListener('click', (event) => {
  if (event.target === modal) {
    closeModal();
  }
});

// Закрытие модального окна по клавише "Esc"
modalWindow.addEventListener('keydown', (event) => {
  if (event.key === 'Escape') {
    event.preventDefault();
    closeModal();
  }
})

// Удаление класса closing для модального окна, когда окно закрыто
modalWindow.addEventListener('close', () => {
  modal.classList.remove('closing');
  document.body.style.overflow = '';
});

// Функция закрытия модального окна
function closeModal() {
  modalWindow.classList.add('closing');
  setTimeout(() => {
    modal.close()
  }, 300);
}

// Функция для переключения форм
function toggleForms(activeForm, inactiveForm, activeBtn, inactiveBtn) {
  inactiveForm.classList.add('hidden');
  inactiveBtn.classList.remove('tap-btn');
  activeForm.classList.remove('hidden');
  activeBtn.classList.add('tap-btn');
}

// Кнопка, открывающая форму авторизации
btnOpenAuth.addEventListener('click', () => {
  toggleForms(authForm, regForm, btnOpenAuth, btnOpenReg);
});

// Кнопка, открывающая форму регистрации
btnOpenReg.addEventListener('click', () => {
  toggleForms(regForm, authForm, btnOpenReg, btnOpenAuth);
});

// Функция для обработки отправки формы
function handleFormSubmit(form, event) {
  event.preventDefault();
  closeModal();
  setTimeout(() => {
    form.submit();
  }, 500);
}

// Перехват события отправки для формы авторизации
authForm.addEventListener('submit', (event) => {
  handleFormSubmit(authForm, event);
});

// Перехват события отправки для формы регистрации
regForm.addEventListener('submit', (event) => {
  handleFormSubmit(regForm, event);
});

// Всплывающее окно (pop-up)
let popupTimer;
// Функция для плавного показа уведомления
function showNotification(message, isSuccess) {
  const popup = document.getElementById('notification-popup');
  const messageElement = document.getElementById('popup-message');

  // Сбрасываем предыдущий таймер
  if (popupTimer) {
    clearTimeout(popupTimer);
    popup.classList.remove('closing');
  }

  // Закрываем модальное окно
  const modalWindow = document.getElementById('modalWindow');
  if (modalWindow) modalWindow.close();

  // Устанавливаем сообщение и стиль
  messageElement.textContent = message;
  popup.className = isSuccess ? 'popup success' : 'popup error';

  // Показываем popup с анимацией
  popup.showModal();

  // Автоматическое закрытие через 2.5 секунды
  popupTimer = setTimeout(() => {
    closePopup();
  }, 2500);
}

// Функция для плавного закрытия
function closePopup() {
  const popup = document.getElementById('notification-popup');
  if (!popup || !popup.open) return;

  // Добавляем класс для анимации исчезновения
  popup.classList.add('closing');

  // Полное закрытие после завершения анимации
  setTimeout(() => {
    popup.close();
    popup.classList.remove('closing');
  }, 250); // Совпадает с длительностью анимации
}

// Обработчик для кнопки OK
document.getElementById('notification-popup').addEventListener('click', function (e) {
  if (e.target.tagName === 'BUTTON') {
    closePopup();
  }
});

// Обработчик клавиши ESC
document.addEventListener('keydown', function (e) {
  const popup = document.getElementById('notification-popup');
  if (e.key === 'Escape' && popup?.open) {
    closePopup();
  }
});

// Обработчик загрузки страницы
document.addEventListener('DOMContentLoaded', function () {
  setTimeout(() => {
    const notificationData = document.getElementById('notification-data');
    if (!notificationData) return;

    const successMsg = notificationData.dataset.success;
    const errorMsg = notificationData.dataset.error;

    if (successMsg) {
      showNotification(successMsg, true);
      clearNotifications();
    } else if (errorMsg) {
      showNotification(errorMsg, false);
      clearNotifications();
    }
  }, 100);
});

// Функция для очистки уведомлений
function clearNotifications() {
  fetch('/vendor/functions/clear-notifications.php', {
    method: 'POST',
    credentials: 'same-origin'
  }).catch(e => console.error('Ошибка при очистке уведомлений:', e));
}