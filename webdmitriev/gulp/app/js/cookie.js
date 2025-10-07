(function () {
  // чтобы инкрементить версию при изменениях
  const STORAGE_KEY = 'cookieAccepted_v1.1';
  const popup = document.getElementById('cookie-popup');
  const btnAccept = document.getElementById('cookie-accept');
  const btnClose = document.getElementById('cookie-close');

  function showPopup() {
    if (!popup) return;
    popup.setAttribute('aria-hidden', 'false');
  }
  function hidePopup() {
    if (!popup) return;
    popup.setAttribute('aria-hidden', 'true');
  }

  // Инициализация при загрузке DOM
  document.addEventListener('DOMContentLoaded', function () {
    try {
      const accepted = localStorage.getItem(STORAGE_KEY);
      if (!accepted) {
        setTimeout(showPopup, 300);
      } else {
        hidePopup();
      }
    } catch (e) {
      // Если localStorage недоступен, всё равно покажем (или можно скрыть)
      console.warn('localStorage недоступен:', e);
      setTimeout(showPopup, 300);
    }
  });

  // Нажатие "Принять" — сохраняем и скрываем
  btnAccept && btnAccept.addEventListener('click', function () {
    try {
      localStorage.setItem(STORAGE_KEY, new Date().toISOString());
    } catch (e) {
      console.warn('Не удалось сохранить согласие в localStorage', e);
    }
    hidePopup();
  });

  // Нажатие закрыть — просто скрываем
  btnClose && btnClose.addEventListener('click', function () {
    hidePopup();
  });

  // На клавишу Escape закрывать (UX)
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') hidePopup();
  });
})();