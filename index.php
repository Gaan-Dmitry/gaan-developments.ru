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
  <meta name="twitter:description" content="Создаём сайты, которые приносят результат. Портфолио, услуги, поддержка и оптимизация.">
  <meta name="twitter:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">


  <!-- Open Graph -->
  <meta property="og:title" content="Gaan Developments — разработка сайтов и интернет-магазинов">
  <meta property="og:description" content="Создаём сайты, которые приносят результат. Портфолио, услуги, поддержка и оптимизация.">
  <meta property="og:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://gaan-developments.ru/">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Favicon & CSS -->
  <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
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


  <!-- Портфолио -->
  <section class="card shadow-sm p-4 mb-4" id="portfolio">
    <h2 class="mb-4 text-center">Наши работы</h2>
    <div class="row g-4">
      <?php
      $sql = "SELECT * FROM works ORDER BY id DESC LIMIT 6";
      if ($stmt = $conn->prepare($sql)) {
          $stmt->execute();
          $res = $stmt->get_result();
          if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                  $title = htmlspecialchars($row['title']);
                  $desc = htmlspecialchars(mb_strimwidth($row['description'], 0, 140, '...'));
                  $image = htmlspecialchars($row['image']);
                  $id = (int)$row['id'];
                  ?>
                  <div class="col-12 col-sm-6 col-md-4">
                    <article class="card h-100 shadow-sm portfolio-card" itemscope itemtype="https://schema.org/CreativeWork">
                      <a href="portfolio.php?id=<?= $id ?>" class="text-decoration-none text-dark" itemprop="url">
                        <div class="card-img-wrapper">
                          <img src="uploads/<?= $image ?>" 
                               class="card-img-top" 
                               alt="<?= $title ?>" 
                               loading="lazy" 
                               itemprop="image">
                        </div>
                        <div class="card-body d-flex flex-column">
                          <h3 class="card-title h5" itemprop="headline"><?= $title ?></h3>
                          <p class="card-text small mt-auto" itemprop="text"><?= $desc ?></p>
                        </div>
                      </a>
                    </article>
                  </div>
                  <?php
              }
          }
          $stmt->close();
      }
      ?>
    </div>
  </section>
<section class="card shadow-sm p-4 mb-4 text-center">
  <h2>Готовы обсудить ваш проект?</h2>
  <p>Оставьте заявку — мы свяжемся с вами в течение дня.</p>
  <a href="order.php" class="btn btn-lg btn-primary">Заказать сайт</a>
</section>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>
</body>
</html>
