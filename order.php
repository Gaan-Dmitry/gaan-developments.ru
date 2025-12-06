<?php
require 'config.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- SEO -->
  <title>Заказать сайт — Дмитрий Гаан (Gaan Developments)</title>
  <meta name="description" content="Закажите разработку сайта, лендинга или интернет-магазина у самозанятого веб-разработчика. Индивидуальный подход и качественный результат.">
  <meta name="keywords" content="заказать сайт, веб-разработка, лендинг, интернет-магазин, корпоративный сайт, портфолио, самозанятый">
  <meta name="author" content="Дмитрий Гаан">
  <link rel="canonical" href="https://gaan-developments.ru/order.php">

  <!-- Open Graph -->
  <meta property="og:title" content="Заказать сайт — Дмитрий Гаан (Gaan Developments)">
  <meta property="og:description" content="Создаю сайты под ключ: лендинги, интернет-магазины, корпоративные сайты. Самозанятый специалист с индивидуальным подходом.">
  <meta property="og:image" content="https://gaan-developments.ru/uploads/logo-60x56.svg">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://gaan-developments.ru/order.php">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="Заказать сайт — Дмитрий Гаан (Gaan Developments)">
  <meta name="twitter:description" content="Создаю сайты под ключ: лендинги, интернет-магазины, корпоративные сайты. Самозанятый специалист с индивидуальным подходом.">
  <meta name="twitter:image" content="https://gaan-developments.ru/uploads/logo-60x56.svg">

  <!-- Favicon & CSS -->
  <link rel="icon" href="https://gaan-developments.ru/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  
  <!-- Стили для формы -->
  <style>
    
    /* Улучшаем радио-кнопки */
    .form-check {
      margin-bottom: 0.5rem;
      padding: 0.75rem;
      border: 1px solid #dee2e6;
      border-radius: 0.375rem;
      transition: all 0.2s;
    }
    
    .form-check:hover {
      background-color: #f8f9fa;
      border-color: #86b7fe;
    }
    
    .form-check-input {
      margin-right: 0.5rem;
      cursor: pointer;
    }
    
    .form-check-label {
      cursor: pointer;
      width: 100%;
      display: flex;
      align-items: center;
      padding-left: 0.5rem;
    }
    
    /* Улучшаем прогресс-бар */
    .custom-progress-bar {
      height: 8px;
      background-color: #e9ecef;
      border-radius: 4px;
      overflow: hidden;
      margin-bottom: 1.5rem;
    }
    
    .custom-progress-bar-inner {
      height: 100%;
      background-color: #0d6efd;
      width: 0%;
      transition: width 0.3s ease;
    }
    
    .custom-step-indicator {
      position: relative;
      text-align: center;
      flex: 1;
      color: #6c757d;
      font-size: 0.875rem;
      cursor: pointer;
      transition: color 0.3s;
    }
    
    .custom-step-indicator.active {
      color: #0d6efd;
      font-weight: 600;
    }
    
    .custom-step-indicator::before {
      content: '';
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 12px;
      height: 12px;
      background-color: #e9ecef;
      border-radius: 50%;
      border: 2px solid #fff;
      transition: all 0.3s;
    }
    
    .custom-step-indicator.active::before {
      background-color: #0d6efd;
      box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.25);
    }
  </style>
  
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
<!-- JSON-LD Schema.org -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Дмитрий Гаан",
  "brand": "Gaan Developments",
  "jobTitle": "Самозанятый веб-разработчик",
  "url": "https://gaan-developments.ru/",
  "image": "https://gaan-developments.ru/uploads/logo-60x56.svg",
  "sameAs": [
    "https://vk.com/Gaan_Dmitry",
    "https://t.me/gaan_developments",
    "https://github.com/Gaan-Dmitry"
  ],
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "customer support",
    "email": "gaandima55@yandex.ru",
    "url": "https://t.me/Gaan_Developments_bot",
    "availableLanguage": ["Russian"]
  },
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "RU"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Услуги веб-разработки",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Разработка лендингов"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Интернет-магазины"
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Корпоративные сайты"
        }
      }
    ]
  }
}
</script>

<!-- FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Сколько стоит сайт?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Стоимость зависит от типа сайта и объема работ. Лендинги начинаются от 15 000 ₽, интернет-магазины — от 70 000 ₽."
      }
    },
    {
      "@type": "Question",
      "name": "Сколько времени занимает разработка?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Средний срок создания сайта — от 2 до 6 недель, в зависимости от сложности проекта и наличия контента."
      }
    },
    {
      "@type": "Question",
      "name": "Можно ли заказать SEO вместе с сайтом?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да, можно заказать как техническую поддержку, так и SEO-продвижение сайта."
      }
    }
  ]
}
</script>

<main class="container" itemscope itemtype="https://schema.org/Person">
  <?php require_once __DIR__ . '/header.php'; ?>

  <!-- Schema.org -->
  <meta itemprop="name" content="Дмитрий Гаан">
  <meta itemprop="brand" content="Gaan Developments">
  <meta itemprop="jobTitle" content="Самозанятый веб-разработчик">
  <meta itemprop="url" content="https://gaan-developments.ru/">
  <meta itemprop="image" content="https://gaan-developments.ru/uploads/logo-60x56.svg">

  <link itemprop="sameAs" href="https://vk.com/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://t.me/gaan_developments">
  <link itemprop="sameAs" href="https://github.com/Gaan_Dmitry">

  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
    <meta itemprop="contactType" content="customer support">
    <meta itemprop="email" content="gaandima55@yandex.ru">
    <meta itemprop="url" content="https://t.me/Gaan_Developments_bot">
  </div>

  <!-- Заголовок -->
  <section class="card shadow-sm p-4 mb-4" itemprop="description">
    <h1 class="text-center mb-4" itemprop="name">Заказать разработку сайта</h1>
    <p class="lead text-center">Создаю сайты, которые работают на ваш бизнес. Выберите тип сайта, бюджет и оставьте контактные данные — я свяжусь с вами в течение дня.</p>
    
    <div class="text-center mt-3">
      <p class="text-muted mb-2">Для быстрой консультации пишите прямо в Telegram-бота:</p>
      <a href="https://t.me/Gaan_Developments_bot" class="btn btn-outline-primary btn-sm" target="_blank" rel="noopener">
        Написать в Telegram-боте
      </a>
    </div>
  </section>

  <div class="card shadow-sm p-4 mb-4">
    <form id="orderForm" novalidate>
      <!-- Прогресс и шаги -->
      <div class="progress-steps mb-4">
        <div class="custom-progress-bar">
          <div id="formProgress" class="custom-progress-bar-inner"></div>
        </div>
        <div class="step-labels d-flex justify-content-between mt-3">
          <div class="custom-step-indicator active" data-step="1">Тип сайта</div>
          <div class="custom-step-indicator" data-step="2">Дизайн</div>
          <div class="custom-step-indicator" data-step="3">Контент</div>
          <div class="custom-step-indicator" data-step="4">Бюджет</div>
          <div class="custom-step-indicator" data-step="5">Контакты</div>
        </div>
      </div>

      <!-- Шаги формы -->
      <div class="form-step active" data-step="1">
        <label for="site_type" class="form-label">Тип сайта *</label>
        <select id="site_type" name="site_type" class="form-select" required>
          <option value="">— Выберите —</option>
          <option value="landing">📰 Лендинг страница (от 15 000 ₽)</option>
          <option value="shop">🛍 Интернет магазин (от 70 000 ₽)</option>
          <option value="blog">📝 Блог (от 25 000 ₽)</option>
          <option value="forum">💬 Форум (от 45 000 ₽)</option>
          <option value="corporate">🏠 Корпоративный сайт (от 35 000 ₽)</option>
          <option value="tool">🛠 Веб инструмент (от 60 000 ₽)</option>
          <option value="portfolio">🎨 Портфолио (от 28 000 ₽)</option>
          <option value="learning">🎓 Обучающая платформа (от 90 000 ₽)</option>
          <option value="other">Другое</option>
        </select>
        <div class="mt-2">
          <small class="text-muted" id="site_type_description">
            Выберите тип сайта, чтобы увидеть описание
          </small>
        </div>
        <div class="invalid-feedback"></div>
        <div class="d-flex justify-content-end mt-4">
          <button type="button" class="btn btn-primary next-btn">Далее</button>
        </div>
      </div>

      <div class="form-step" data-step="2">
        <label class="form-label">Наличие дизайна</label>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="design" id="design_ready" value="ready" required>
            <label class="form-check-label" for="design_ready">Готовый дизайн</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="design" id="design_need" value="need">
            <label class="form-check-label" for="design_need">Нужен дизайн</label>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
          <button type="button" class="btn btn-primary next-btn">Далее</button>
        </div>
      </div>

      <div class="form-step" data-step="3">
        <label class="form-label">Контент</label>
        <div class="mb-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="content" id="content_provide" value="provide" required>
            <label class="form-check-label" for="content_provide">Я предоставляю</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="content" id="content_create" value="create">
            <label class="form-check-label" for="content_create">Нужна помощь</label>
          </div>
        </div>
        <label class="form-label mt-2">Поддержка после запуска</label>
        <select name="support" class="form-select">
          <option value="no">Нет</option>
          <option value="maintenance">Техподдержка</option>
          <option value="seo">Маркетинг / SEO</option>
          <option value="both">Поддержка + Маркетинг</option>
        </select>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
          <button type="button" class="btn btn-primary next-btn">Далее</button>
        </div>
      </div>

      <div class="form-step" data-step="4">
        <label class="form-label">Бюджет *</label>
        <select name="budget" class="form-select" required>
          <option value="">— Выберите —</option>
          <option value="under_30">До 30 000 ₽</option>
          <option value="30_60">30 000 — 60 000 ₽</option>
          <option value="60_100">60 000 — 100 000 ₽</option>
          <option value="100_plus">100 000 ₽ и выше</option>
        </select>
        <label class="form-label mt-3">Кратко опишите задачу</label>
        <textarea name="details" class="form-control" rows="4" placeholder="Опишите вашу задачу, цели и особенности проекта..."></textarea>
        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
          <button type="button" class="btn btn-primary next-btn">Далее</button>
        </div>
      </div>

      <div class="form-step" data-step="5">
        <h3 class="h6">Контактные данные</h3>
        <div class="mb-3">
          <label for="name" class="form-label">Имя *</label>
          <input id="name" name="name" type="text" class="form-control" required placeholder="Ваше имя">
          <div class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email *</label>
          <input id="email" name="email" type="email" class="form-control" required placeholder="example@email.com">
          <div class="invalid-feedback"></div>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Телефон (необязательно)</label>
          <input id="phone" name="phone" type="tel" class="form-control" placeholder="+7 (XXX) XXX-XX-XX">
          <div class="invalid-feedback"></div>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
          <button id="submit-btn" type="button" class="btn btn-success">Отправить заявку</button>
        </div>
      </div>
    </form>
    <div id="formResult" class="mt-3"></div>
  </div>

  <!-- Модальное окно успеха -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header bg-success text-white justify-content-center">
          <h5 class="modal-title">Спасибо за заявку!</h5>
          <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Закрыть"></button>
        </div>
        <div class="modal-body">
          <p id="successMessage" class="fs-5 fw-semibold mb-4">Заявка успешно отправлена!</p>
          <div class="p-3 border rounded bg-light">
            <p class="mb-2 text-dark">Я свяжусь с вами в течение рабочего дня через указанный email или Telegram.</p>
            <p class="mb-3 text-dark">Также вы можете написать мне напрямую в Telegram-бота для быстрого ответа:</p>
            <a href="https://t.me/Gaan_Developments_bot" class="btn btn-primary mb-2" target="_blank" rel="noopener">Написать в Telegram-боте</a>
            <p class="mb-1 text-dark">Вы будете перенаправлены на <a href="/" class="fw-semibold">главную страницу</a> через <span id="redirectTimer">10</span> секунд.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="card shadow-sm p-4 mb-4">
    <h2 class="mb-3 text-center">Почему стоит заказать сайт у меня</h2>
    <ul class="list-unstyled">
      <li class="mb-2">✅ <strong>Индивидуальный подход:</strong> Каждый проект разрабатывается с учетом особенностей вашего бизнеса</li>
      <li class="mb-2">✅ <strong>SEO-оптимизация:</strong> Сайт создается с учетом требований поисковых систем</li>
      <li class="mb-2">✅ <strong>Адаптивный дизайн:</strong> Сайт отлично выглядит на всех устройствах</li>
      <li class="mb-2">✅ <strong>Техническая поддержка:</strong> Помогаю после запуска проекта</li>
      <li class="mb-2">✅ <strong>Опыт работы:</strong> Работал с разными нишами и типами проектов</li>
      <li class="mb-2">✅ <strong>Работаю как самозанятый:</strong> Гибкие условия и оперативное выполнение задач</li>
    </ul>
  </section>

  <?php require_once __DIR__ . '/faq.php'; ?>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>

<script>
// Описания для типов сайтов
const siteTypeDescriptions = {
  'landing': '📰 Лендинг страница - от 15 000 ₽. Идеальное решение для быстрого старта и привлечения клиентов!',
  'shop': '🛍 Интернет магазин - от 70 000 ₽. Полный функционал для вашего онлайн-бизнеса 24/7!',
  'blog': '📝 Блог - от 25 000 ₽. Рассказывайте свою историю и делитесь экспертными знаниями!',
  'forum': '💬 Форум - от 45 000 ₽. Создайте живое сообщество вокруг вашего бренда!',
  'corporate': '🏠 Корпоративный сайт - от 35 000 ₽. Официальное лицо вашей компании в цифровом мире!',
  'tool': '🛠 Веб инструмент - от 60 000 ₽. Практичные решения для автоматизации ваших задач!',
  'portfolio': '🎨 Портфолио - от 28 000 ₽. Ваша визитная карточка для привлечения лучших клиентов!',
  'learning': '🎓 Обучающая платформа - от 90 000 ₽. Современное образование в удобном цифровом формате!',
  'other': 'Другой тип сайта. Опишите вашу задачу в поле "Кратко опишите задачу"'
};

// Показ описания при выборе типа сайта
document.getElementById('site_type').addEventListener('change', function() {
  const descriptionEl = document.getElementById('site_type_description');
  const selectedValue = this.value;
  
  if (selectedValue && siteTypeDescriptions[selectedValue]) {
    descriptionEl.textContent = siteTypeDescriptions[selectedValue];
    descriptionEl.className = 'text-success';
  } else {
    descriptionEl.textContent = 'Выберите тип сайта, чтобы увидеть описание';
    descriptionEl.className = 'text-muted';
  }
});

// Улучшаем радио-кнопки: делаем всю область кликабельной
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.form-check').forEach(function(check) {
    check.addEventListener('click', function(e) {
      // Если кликнули не на input, а на label или div
      if (!e.target.classList.contains('form-check-input')) {
        const radio = this.querySelector('.form-check-input');
        if (radio) {
          radio.checked = true;
          radio.dispatchEvent(new Event('change'));
        }
      }
    });
  });
});
</script>

<script src="/assets/js/form.js"></script>
</body>
</html>