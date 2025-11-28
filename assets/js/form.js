const form = document.getElementById('orderForm');
const steps = Array.from(form.querySelectorAll('.form-step'));
const progressBar = document.getElementById('formProgress');
const stepLabel = document.getElementById('formStepLabel');
const btnSubmit = document.getElementById('submit-btn');
const result = document.getElementById('formResult');
let currentStep = 0;

// --- Показ шагов ---
function showStep(index) {
  steps.forEach((step,i)=>step.classList.toggle('active', i===index));
  // Прогресс
  const progress = ((index)/(steps.length-1))*100;
  document.getElementById('formProgress').style.width = progress+"%";
  // Step-индикаторы
  document.querySelectorAll('.custom-step-indicator').forEach((indicator,i)=>{
    indicator.classList.toggle('active', i===index);
    indicator.classList.toggle('completed', i<index);
  });
}
showStep(currentStep);

// --- Навигация ---
form.querySelectorAll('.next-btn').forEach(btn=>{
  btn.addEventListener('click',()=>{
    if (validateStep(currentStep)) {
      currentStep = Math.min(steps.length-1, currentStep+1);
      showStep(currentStep);
    }
  });
});

form.querySelectorAll('.prev-btn').forEach(btn=>{
  btn.addEventListener('click',()=>{
    currentStep = Math.max(0, currentStep-1);
    showStep(currentStep);
  });
});

// --- Валидация шага ---
function validateStep(index) {
  const step = steps[index];
  let valid = true;
  step.querySelectorAll('input, select, textarea').forEach(input=>{
    input.classList.remove('is-invalid');
    const feedback = input.nextElementSibling;
    if (input.hasAttribute('required') && !input.value.trim()) {
      input.classList.add('is-invalid');
      if (feedback) feedback.textContent='Заполните поле';
      valid=false;
    }
    if (input.type==='email' && input.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
      input.classList.add('is-invalid');
      if (feedback) feedback.textContent='Неверный e-mail';
      valid=false;
    }
    if (input.type==='tel' && input.value.trim() && !/^\+?[0-9\-\s\(\)]{6,20}$/.test(input.value)) {
      input.classList.add('is-invalid');
      if (feedback) feedback.textContent='Неверный телефон';
      valid=false;
    }
  });
  return valid;
}

// --- Отправка формы ---
btnSubmit.addEventListener('click', async()=>{
  result.textContent='';
  form.querySelectorAll('.is-invalid').forEach(el=>el.classList.remove('is-invalid'));
  form.querySelectorAll('.invalid-feedback').forEach(f=>f.textContent='');

  if (!validateStep(currentStep)) return;

  const formData = new FormData(form);
  
  // Показываем индикатор загрузки
  btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Отправка...';
  btnSubmit.disabled = true;
  
  try {
    const res = await fetch('/save_request.php',{method:'POST', body:formData});
    const data = await res.json();
    if (!res.ok) {
      if (data.errors) {
        for (let field in data.errors) {
          const input = form.querySelector(`[name="${field}"]`);
          if (input) {
            input.classList.add('is-invalid');
            input.nextElementSibling.textContent = data.errors[field];
          }
        }
      } else {
        result.className='text-danger';
        result.textContent = data.message || 'Ошибка сервера';
      }
    } else {
      // --- Успех: показываем модалку ---
      const successModalEl = document.getElementById('successModal');
      const successMessageEl = document.getElementById('successMessage');
      const redirectTimerEl = document.getElementById('redirectTimer');

      let message = data.message || 'Заявка успешно отправлена';
      
      // Добавляем информацию о Telegram уведомлении
      if (data.telegram_sent === false) {
        message += ' (Уведомление в Telegram не отправлено)';
      }
      
      successMessageEl.textContent = message;

      // Сбрасываем таймер
      let countdown = 10;
      redirectTimerEl.textContent = countdown;

      // Используем Bootstrap Modal API
      const successModal = new bootstrap.Modal(successModalEl);
      successModal.show();

      // Обратный отсчёт
      const timerInterval = setInterval(()=>{
        countdown--;
        redirectTimerEl.textContent = countdown;
        if (countdown <= 0) {
          clearInterval(timerInterval);
          window.location.href = '/'; // перенаправление на главную
        }
      },1000);

      // Сброс формы и шагов
      form.reset();
      currentStep = 0;
      showStep(currentStep);

    }
  } catch(e) {
    result.className='text-danger';
    result.textContent='Ошибка соединения';
    console.error(e);
  } finally {
    // Восстанавливаем кнопку
    btnSubmit.innerHTML = 'Отправить заявку';
    btnSubmit.disabled = false;
  }
});