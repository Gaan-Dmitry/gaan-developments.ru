<?php
require 'config.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- SEO -->
  <title>Услуги веб-разработки — Gaan Developments</title>
  <meta name="description" content="Профессиональная разработка сайтов, лендингов и интернет-магазинов. Индивидуальные решения под задачи вашего бизнеса.">
  <meta name="keywords" content="разработка сайтов, лендинги, интернет-магазины, создание сайта, заказать сайт, веб-студия, UX/UI дизайн, e-commerce">
  <meta name="author" content="Gaan Developments">
  <link rel="canonical" href="https://gaan-developments.ru/services.php">

  <!-- Open Graph -->
  <meta property="og:title" content="Услуги веб-разработки — Gaan Developments">
  <meta property="og:description" content="Профессиональная разработка сайтов, лендингов и интернет-магазинов. Индивидуальные решения под задачи вашего бизнеса.">
  <meta property="og:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://gaan-developments.ru/services.php">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Услуги веб-разработки — Gaan Developments">
  <meta name="twitter:description" content="Профессиональная разработка сайтов, лендингов и интернет-магазинов. Индивидуальные решения под задачи вашего бизнеса.">
  <meta name="twitter:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">

  <!-- Favicon & CSS -->
  <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
  
  <!-- Schema.org -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Gaan Developments",
    "url": "https://gaan-developments.ru/",
    "description": "Профессиональная веб-разработка для вашего бизнеса",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "https://gaan-developments.ru/search?q={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  </script>
</head>
<body>
<main class="container" itemscope itemtype="https://schema.org/Organization">
  <?php require_once __DIR__ . '/header.php'; ?>

  <!-- Schema.org microdata -->
  <meta itemprop="name" content="Gaan Developments">
  <meta itemprop="url" content="https://gaan-developments.ru/">
  <meta itemprop="logo" content="https://gaan-developments.ru/uploads/logo-60x56.svg">

  <link itemprop="sameAs" href="https://vk.com/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://t.me/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://github.com/Gaan_Dmitry">

  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
    <meta itemprop="contactType" content="customer support">
    <meta itemprop="email" content="gaandima55@yandex.ru">
    <meta itemprop="telephone" content="+7 904 329-40-61">
  </div>

  <!-- Заголовок страницы -->
  <section class="card shadow-sm p-4 mb-4" id="services">
    <div class="card-body text-center">
      <h1 class="mb-3" itemprop="name">Наши услуги</h1>
      <p class="card-text" itemprop="description">
        Я предлагаю полный спектр услуг по созданию и продвижению веб-сайтов, 
        адаптированных под задачи вашего бизнеса и цели развития.
      </p>
    </div>
  </section>

  <!-- Детальное описание услуг -->
  <section class="card shadow-sm p-4 mb-4">
    <h2 class="mb-4">Разработка лендингов</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <img src="uploads/1.png" alt="Разработка лендингов" class="img-fluid rounded" loading="lazy">
      </div>
      <div class="col-md-6">
        <h3>Что входит:</h3>
        <ul>
          <li>Адаптивный дизайн под все устройства</li>
          <li>Индивидуальная визуальная концепция</li>
          <li>Интеграция с CRM-системами</li>
          <li>Формы обратной связи и заявок</li>
          <li>Аналитика и метрики</li>
          <li>SEO-оптимизация</li>
        </ul>
        <p class="mt-3"><strong>Сроки:</strong> от 5 до 10 рабочих дней</p>
        <p><strong>Цена:</strong> от 15 000 ₽</p>
        <a href="order.php" class="btn btn-primary mt-2">Заказать лендинг</a>
      </div>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4">
    <h2 class="mb-4">Интернет-магазины</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <h3>Что входит:</h3>
        <ul>
          <li>Каталог товаров с фильтрами и сортировкой</li>
          <li>Корзина и система оплаты</li>
          <li>Личный кабинет клиента</li>
          <li>Панель управления администратора</li>
          <li>Интеграция с 1С и другими системами</li>
          <li>Мобильная версия</li>
          <li>Система скидок и акций</li>
        </ul>
        <p class="mt-3"><strong>Сроки:</strong> от 2 до 6 недель</p>
        <p><strong>Цена:</strong> от 70 000 ₽</p>
        <a href="order.php" class="btn btn-primary mt-2">Заказать интернет-магазин</a>
      </div>
      <div class="col-md-6">
        <img src="uploads/2.png" alt="Разработка интернет-магазинов" class="img-fluid rounded" loading="lazy">
      </div>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4">
    <h2 class="mb-4">Корпоративные сайты</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <img src="uploads/5.png" alt="Разработка корпоративных сайтов" class="img-fluid rounded" loading="lazy">
      </div>
      <div class="col-md-6">
        <h3>Что входит:</h3>
        <ul>
          <li>Многостраничный сайт с CMS</li>
          <li>Индивидуальный дизайн</li>
          <li>Интеграция с корпоративными системами</li>
          <li>Многоуровневая навигация</li>
          <li>Новостная лента</li>
          <li>Система управления контентом</li>
          <li>SEO-оптимизация</li>
        </ul>
        <p class="mt-3"><strong>Сроки:</strong> от 3 до 8 недель</p>
        <p><strong>Цена:</strong> от 35 000 ₽</p>
        <a href="order.php" class="btn btn-primary mt-2">Заказать корпоративный сайт</a>
      </div>
    </div>
  </section>

  <!-- Система скидок -->
  <section class="card shadow-sm p-4 mb-4">
    <h2 class="mb-4 text-center">Система скидок</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-3 border rounded text-center h-100">
          <h3 class="h5">Объемные заказы</h3>
          <p class="mb-2">Скидка до 15% при заказе комплексных услуг</p>
          <p class="mb-0"><strong>2+ проекта</strong></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 border rounded text-center h-100">
          <h3 class="h5">Постоянные клиенты</h3>
          <p class="mb-2">Накопительная система скидок до 25%</p>
          <p class="mb-0"><strong>3+ проекта</strong></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-3 border rounded text-center h-100">
          <h3 class="h5">Сезонные акции</h3>
          <p class="mb-2">Специальные предложения в праздничные дни</p>
          <p class="mb-0"><strong>До 20% скидки</strong></p>
        </div>
      </div>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4 text-center d-flex align-items-center">
    <h2>Готовы начать проект?</h2>
    <p>Оставьте заявку — я свяжусь с вами в течение дня и обсудим детали.</p>
    <a href="order.php" class="btn btn-lg btn-primary w-75 text-center">Заказать сайт</a>
  </section>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>
</body>
</html>