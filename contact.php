<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- SEO -->
  <title>Заказать сайт — Gaan Developments</title>
  <meta name="description" content="Закажите разработку сайта, лендинга или интернет-магазина у Gaan Developments. Подберём дизайн, контент и поддержку для вашего проекта.">
  <meta name="keywords" content="заказать сайт, веб-разработка, лендинг, интернет-магазин, корпоративный сайт, портфолио, SaaS">
  <meta name="author" content="Gaan Developments">
  <link rel="canonical" href="https://example.com/order.php">

  <!-- Open Graph -->
  <meta property="og:title" content="Заказать сайт — Gaan Developments">
  <meta property="og:description" content="Создаём сайты под ключ: лендинги, интернет-магазины, корпоративные сайты. Закажите свой проект онлайн.">
  <meta property="og:image" content="https://example.com/uploads/logo-60x56.svg">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://example.com/order.php">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Favicon & CSS -->
  <link rel="shortcut icon" href="/uploads/logo-60x56.svg" type="image/x-icon">
  <link rel="stylesheet" href="/style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<main class="container" itemscope itemtype="https://schema.org/Organization">
  <?php require_once __DIR__ . '/header.php'; ?>

  <meta itemprop="name" content="Gaan Developments">
  <meta itemprop="url" content="https://example.com/">
  <meta itemprop="logo" content="https://example.com/uploads/logo-60x56.svg">
  <link itemprop="sameAs" href="https://vk.com/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://t.me/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://github.com/Gaan_Dmitry">

  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
    <meta itemprop="contactType" content="customer support">
    <meta itemprop="email" content="info@example.com">
    <meta itemprop="telephone" content="+7 999 999-99-99">
  </div>

  <!-- Заголовок -->
  <section class="card shadow-sm p-4 mb-4" itemprop="description">
    <h1 class="text-center mb-4" itemprop="name">Заказать разработку сайта</h1>
    <p class="lead text-center">Создаём сайты, которые работают на ваш бизнес. Выберите тип сайта, бюджет и оставьте контактные данные — мы свяжемся с вами.</p>
  </section>

    <div class="card shadow-sm p-4 mb-4">
      <form id="orderForm" novalidate>
        <!-- Прогресс -->
        <div class="mb-3">
          <div class="progress" aria-hidden="true">
            <div id="formProgress" class="progress-bar" role="progressbar" style="width:20%"></div>
          </div>
          <div class="small text-muted mt-2" id="formStepLabel">Шаг 1 из 5</div>
        </div>

        <!-- Шаги формы -->
        <div class="form-step active" data-step="1">
          <label for="site_type" class="form-label">Тип сайта *</label>
          <select id="site_type" name="site_type" class="form-select" required>
            <option value="">— Выберите —</option>
            <option value="landing">Лендинг</option>
            <option value="shop">Интернет-магазин</option>
            <option value="corporate">Корпоративный сайт</option>
            <option value="blog">Блог</option>
            <option value="portfolio">Портфолио</option>
            <option value="saas">SaaS / Веб-сервис</option>
            <option value="edu">Обучающая платформа</option>
            <option value="other">Другое</option>
          </select>
          <div class="invalid-feedback"></div>
          <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-primary next-btn">Далее</button>
          </div>
        </div>

        <div class="form-step" data-step="2">
          <label class="form-label">Наличие дизайна</label>
          <div class="mb-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" id="design_ready" value="ready" required>
              <label class="form-check-label" for="design_ready">Готовый дизайн</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="design" id="design_need" value="need">
              <label class="form-check-label" for="design_need">Нужен дизайн</label>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-3">
            <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
            <button type="button" class="btn btn-primary next-btn">Далее</button>
          </div>
        </div>

        <div class="form-step" data-step="3">
          <label class="form-label">Контент</label>
          <div class="mb-2">
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
          <div class="d-flex justify-content-between mt-3">
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
          <label class="form-label mt-2">Кратко опишите задачу</label>
          <textarea name="details" class="form-control" rows="4"></textarea>
          <div class="d-flex justify-content-between mt-3">
            <button type="button" class="btn btn-outline-secondary prev-btn">Назад</button>
            <button type="button" class="btn btn-primary next-btn">Далее</button>
          </div>
        </div>

        <div class="form-step" data-step="5">
          <h3 class="h6">Контактные данные</h3>
          <div class="mb-2">
            <label for="name">Имя *</label>
            <input id="name" name="name" type="text" class="form-control" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-2">
            <label for="email">Email *</label>
            <input id="email" name="email" type="email" class="form-control" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="mb-2">
            <label for="phone">Телефон</label>
            <input id="phone" name="phone" type="tel" class="form-control">
            <div class="invalid-feedback"></div>
          </div>

          <div class="d-flex justify-content-between mt-3">
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
            <h5 class="modal-title">Успех</h5>
            <button type="button" class="btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <p id="successMessage" class="fs-5 fw-semibold mb-4"></p>
            <div class="p-3 border rounded bg-light">
              <p class="mb-1 text-dark">Вы будете перенаправлены на <a href="/" class="fw-semibold">главную страницу</a>.</p>
              <p class="mb-0 fs-4 fw-bold text-danger">Через <span id="redirectTimer">10</span> секунд</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>
</main>

<script src="/assets/js/form.js"></script>
</body>
</html>
