const btnOpenModal = document.getElementById('btn_modal_open');
const modalWindow = document.getElementById('modal');
const btnOpenAuth = document.getElementById('auth-btn');
const btnOpenReg = document.getElementById('reg-btn');
const authForm = document.getElementById('auth-form');
const regForm = document.getElementById('reg-form');
let forms = document.querySelectorAll('#auth-form, #reg-form');

// Открытие модального окна
btnOpenModal.addEventListener('click', () => {
  modalWindow.showModal();
  modalWindow.classList.remove('closing');
});

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