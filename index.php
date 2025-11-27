<?php
require 'config.php';

// Кеширование отзывов на 1 час
$reviews_cache = __DIR__ . '/cache/reviews.json';
$reviews = [];

if (file_exists($reviews_cache) && time() - filemtime($reviews_cache) < 3600) {
    $reviews = json_decode(file_get_contents($reviews_cache), true);
} else {
    // Создаем папку cache если не существует
    if (!is_dir(__DIR__ . '/cache')) {
        mkdir(__DIR__ . '/cache', 0755, true);
    }
    
    // Функция для получения отзывов из Google Sheets
    function fetch_reviews_from_google() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://script.google.com/macros/s/AKfycbwNmu6whvAFbCk0qo8DulA3Bgm_siBOMjvghDfzjH9F02YLOIoGBw6yTzM0PRfkl28S/exec');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response ? json_decode($response, true) : [];
    }
    
    $reviews = fetch_reviews_from_google();
    if ($reviews) {
        file_put_contents($reviews_cache, json_encode($reviews));
    }
}
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
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5.0",
    "reviewCount": "8"
  }
}
</script>
</head>
<body>
<main class="container" itemscope itemtype="https://schema.org/Organization">
  <?php require_once __DIR__ . '/header.php'; ?>

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
      
      // Маппинг категорий на английские ключи
      $categoryMapping = [
        'Лендинг' => 'landing',
        'Интернет-магазин' => 'shop',
        'Корпоративный сайт' => 'corporate',
        'Обучающая платформа' => 'corporate'
      ];
      
      if (count($works)===0): ?>
        <div class="col-12 text-center text-muted">Портфолио пока пусто</div>
      <?php else:
        foreach ($works as $w):
          // Получаем английский ключ категории
          $cat_key = $categoryMapping[$w['category']] ?? '';
    ?>
    <div class="col-md-4 portfolio-item" data-category="<?= htmlspecialchars($cat_key) ?>">
      <div class="card h-100 portfolio-card">
        <div class="card-img-wrapper">
          <img 
            data-src="/uploads/<?= htmlspecialchars($w['image']) ?>" 
            src="/assets/placeholder.jpg" 
            alt="<?= htmlspecialchars($w['title']) ?>" 
            class="card-img-top lazy"
            loading="lazy">
        </div>
        <div class="card-body">
          <div class="small text-muted mb-1">Категория: <?= htmlspecialchars($w['category']) ?></div>
          <h5 class="card-title static-text"><?= htmlspecialchars($w['title']) ?></h5>
          <p class="card-text small static-text-desc"><?= nl2br(htmlspecialchars($w['description'])) ?></p>
          <?php if (!empty($w['webarchive'])): ?>
          <div class="mt-2"><a href="<?= htmlspecialchars($w['webarchive']) ?>" target="_blank" class="btn btn-link p-0" rel="noopener">WebArchive</a></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; endif; ?>
  </div>
</section>

<!-- Отзывы клиентов -->
<section class="card shadow-sm p-4 mb-4" id="reviews-block">
  <h2 class="mb-4 text-center">Отзывы клиентов</h2>
  <div class="row g-3" id="reviews-container">
    <?php if (empty($reviews)): ?>
      <div class="col-md-6 col-lg-4"><div class="review-card review-skeleton card h-100"></div></div>
      <div class="col-md-6 col-lg-4"><div class="review-card review-skeleton card h-100"></div></div>
      <div class="col-md-6 col-lg-4 d-none d-md-block"><div class="review-card review-skeleton card h-100"></div></div>
    <?php else: ?>
      <?php foreach ($reviews as $r): ?>
        <div class="col-md-6 col-lg-4">
          <div class="review-card card h-100 shadow-sm">
            <div class="card-body">
              <div class="fw-bold mb-1 text-center"><?= htmlspecialchars($r['name']) ?></div>
              <div class="text-muted small mb-2 text-center"><?= htmlspecialchars($r['date/time'] ?? '') ?></div>
              <div class="review-text"><?= nl2br(htmlspecialchars($r['text'] ?? '')) ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <div class="text-center mt-3">
    <a href="review.php" class="btn btn-lg btn-outline-primary">Оставить отзыв</a>
  </div>
</section>

<section class="card shadow-sm p-4 mb-4 text-center d-flex align-items-center">
  <h2>Готовы обсудить ваш проект?</h2>
  <p>Оставьте заявку — мы свяжемся с вами в течение дня.</p>
  <a href="order.php" class="btn btn-lg btn-primary w-75 text-center">Заказать сайт</a>
</section>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>

<!-- Все скрипты вынесены в конец -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script>
// Ленивая загрузка изображений
document.addEventListener('DOMContentLoaded', function() {
  // Инициализация ленивой загрузки
  const lazyLoadImages = function() {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          imageObserver.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img.lazy').forEach(img => {
      imageObserver.observe(img);
    });
  };

  // Фильтрация портфолио
  const filterButtons = document.querySelectorAll('[data-filter]');
  const portfolioItems = document.querySelectorAll('.portfolio-item');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', function() {
      filterButtons.forEach(btn => btn.classList.remove('active'));
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

  // Галерея: pop-up для увеличения изображений
  document.querySelectorAll('.card-img-wrapper img').forEach(function(img) {
    img.style.cursor = 'zoom-in';
    img.addEventListener('click', function() {
      var src = this.src;
      var overlay = document.createElement('div');
      overlay.style.position = 'fixed';
      overlay.style.top = 0;
      overlay.style.left = 0;
      overlay.style.width = '100vw';
      overlay.style.height = '100vh';
      overlay.style.background = 'rgba(20,20,20,0.86)';
      overlay.style.zIndex = 11000;
      overlay.style.display = 'flex';
      overlay.style.alignItems = 'center';
      overlay.style.justifyContent = 'center';
      overlay.innerHTML = '<img src="'+src+'" style="max-width:90vw;max-height:90vh;border-radius:12px;box-shadow:0 8px 40px rgba(0,0,0,0.31);cursor:zoom-out;">';
      overlay.addEventListener('click',function(){document.body.removeChild(overlay)});
      document.body.appendChild(overlay);
    });
  });

  // Запуск ленивой загрузки
  lazyLoadImages();
});
</script>
</body>
</html>
