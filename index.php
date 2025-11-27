<?php
require 'config.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- SEO -->
  <title>Gaan Developments — разработка сайтов и интернет-магазинов</title>
  <meta name="description" content="Gaan Developments создаёт современные сайты, лендинги и интернет-магазины, помогая бизнесу привлекать клиентов и увеличивать продажи.">
  <meta name="keywords" content="разработка сайтов, лендинги, интернет-магазины, создание сайта, заказать сайт, веб-студия, UX/UI дизайн">
  <meta name="author" content="Gaan Developments">
  <link rel="canonical" href="https://gaan-developments.ru/">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Gaan Developments — разработка сайтов и интернет-магазинов">
  <meta name="twitter:description" content="Создаём сайты, которые приносят результат. Услуги, поддержка и оптимизация.">
  <meta name="twitter:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">


  <!-- Open Graph -->
  <meta property="og:title" content="Gaan Developments — разработка сайтов и интернет-магазинов">
  <meta property="og:description" content="Создаём сайты, которые приносят результат. Услуги, поддержка и оптимизация.">
  <meta property="og:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://gaan-developments.ru/">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Favicon & CSS -->
  <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
  
  <!-- Portfolio Filter JS -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Фильтрация портфолио
      const filterButtons = document.querySelectorAll('[data-filter]');
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Удалить активный класс у всех кнопок
          filterButtons.forEach(btn => btn.classList.remove('active'));
          // Добавить активный класс к нажатой кнопке
          this.classList.add('active');
          
          const filter = this.getAttribute('data-filter');
          
          portfolioItems.forEach(item => {
            if (filter === 'all' || item.getAttribute('data-category') === filter) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });
    });
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

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Gaan Developments",
  "url": "https://gaan-developments.ru/",
  "logo": "https://gaan-developments.ru/uploads/logo-60x56.svg",
  "sameAs": [
    "https://vk.com/Gaan_Dmitry",
    "https://t.me/Gaan_Dmitry",
    "https://github.com/Gaan-Dmitry"
  ],
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "customer support",
    "email": "gaandima55@yandex.ru",
    "telephone": "+7 904 329-40-61"
  }
}
</script>


  <!-- О компании -->
  <section class="card shadow-sm p-4 mb-4" id="about">
    <div class="card-body text-center">
      <h1 class="card-title mb-3" itemprop="name">Веб-студия Gaan Developments</h1>
      <p class="card-text" itemprop="description">
        Мы создаём сайты, которые не только красивы, но и приносят результат. 
        В нашей работе мы совмещаем современный дизайн, удобство для пользователей и техническую надёжность.
      </p>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4" id="services">
  <h2 class="mb-4 text-center">Наши услуги</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <h3 class="h5">Лендинги</h3>
        <p>Быстрые и продающие одностраничные сайты.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <h3 class="h5">Интернет-магазины</h3>
        <p>Функциональные e-commerce проекты с каталогом и оплатой.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <h3 class="h5">Корпоративные сайты</h3>
        <p>Сайты для компаний, которые укрепляют бренд и доверие.</p>
      </div>
    </div>
  </div>
</section>

<!-- Отзывы клиентов -->
<section class="card shadow-sm p-4 mb-4" id="testimonials">
  <h2 class="mb-4 text-center">Отзывы клиентов</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <div class="mb-3">
          <div class="rating">
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
          </div>
        </div>
        <p class="mb-2">"Отличная работа! Сайт получился именно таким, каким мы его задумали. Рекомендую!"</p>
        <p class="mb-0 fw-bold">— Иван Петров</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <div class="mb-3">
          <div class="rating">
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
          </div>
        </div>
        <p class="mb-2">"Профессиональный подход, соблюдение сроков, качественный результат. Спасибо команде!"</p>
        <p class="mb-0 fw-bold">— Мария Сидорова</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="p-3 border rounded text-center h-100">
        <div class="mb-3">
          <div class="rating">
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
            <span class="text-warning">★</span>
          </div>
        </div>
        <p class="mb-2">"Работаем с ними уже второй проект. Всё на высшем уровне!"</p>
        <p class="mb-0 fw-bold">— Алексей Козлов</p>
      </div>
    </div>
  </div>
</section>

<!-- Галерея работ -->
<section class="card shadow-sm p-4 mb-4" id="portfolio">
  <h2 class="mb-4 text-center">Наши работы</h2>
  <div class="row mb-3">
    <div class="col-12 text-center">
      <button class="btn btn-outline-primary btn-sm mx-1 active" data-filter="all">Все</button>
      <button class="btn btn-outline-primary btn-sm mx-1" data-filter="landing">Лендинги</button>
      <button class="btn btn-outline-primary btn-sm mx-1" data-filter="shop">Интернет-магазины</button>
      <button class="btn btn-outline-primary btn-sm mx-1" data-filter="corporate">Корпоративные</button>
    </div>
  </div>
  <div class="row g-4" id="portfolio-grid">
    <?php
      $works = [];
      $sql = 'SELECT * FROM works ORDER BY id DESC';
      if ($st = $conn->prepare($sql)) {
        $st->execute();
        $res = $st->get_result();
        while ($r = $res->fetch_assoc()) $works[] = $r;
        $st->close();
      }
      if (count($works)===0): ?>
        <div class="col-12 text-center text-muted">Портфолио пока пусто</div>
      <?php else:
        foreach ($works as $w):
          $cat = strtolower(preg_replace('/[^\w]+/','', $w['category']));
    ?>
    <div class="col-md-4 portfolio-item" data-category="<?= htmlspecialchars($cat) ?>">
      <div class="card h-100 portfolio-card">
        <div class="card-img-wrapper"><img src="/uploads/<?= htmlspecialchars($w['image']) ?>" alt="<?= htmlspecialchars($w['title']) ?>" class="card-img-top" loading="lazy"></div>
        <div class="card-body">
          <div class="small text-muted mb-1">Категория: <?= htmlspecialchars($w['category']) ?></div>
          <h5 class="card-title"><?= htmlspecialchars($w['title']) ?></h5>
          <p class="card-text small"><?= nl2br(htmlspecialchars($w['description'])) ?></p>
        </div>
      </div>
    </div>
    <?php endforeach; endif; ?>
  </div>
</section>

<section class="card shadow-sm p-4 mb-4 text-center d-flex align-items-center">
  <h2>Готовы обсудить ваш проект?</h2>
  <p>Оставьте заявку — мы свяжемся с вами в течение дня.</p>
  <a href="order.php" class="btn btn-lg btn-primary w-75 text-center">Заказать сайт</a>
</section>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>
</body>
</html>
