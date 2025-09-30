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
  <link rel="canonical" href="https://example.com/">

  <!-- Open Graph -->
  <meta property="og:title" content="Gaan Developments — разработка сайтов и интернет-магазинов">
  <meta property="og:description" content="Создаём сайты, которые приносят результат. Портфолио, услуги, поддержка и оптимизация.">
  <meta property="og:image" content="https://example.com/uploads/ogo-340x250.svg">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://example.com/">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Favicon & CSS -->
  <link rel="shortcut icon" href="/uploads/logo-60x56.svg" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <script src="/assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<main class="container" itemscope itemtype="https://schema.org/Organization">
  <?php require_once __DIR__ . '/header.php'; ?>

  <meta itemprop="name" content="Gaan Developments">
  <meta itemprop="url" content="https://example.com/">
  <meta itemprop="logo" content="https://example.com/uploads/logo-60x56.svg">
  <link itemprop="sameAs" href="https://vk.com/example">
  <link itemprop="sameAs" href="https://t.me/example">
  <link itemprop="sameAs" href="https://github.com/Gaan_Dmitry">

  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
    <meta itemprop="contactType" content="customer support">
    <meta itemprop="email" content="info@example.com">
    <meta itemprop="telephone" content="+7 999 999-99-99">
  </div>

  <!-- О компании -->
  <section class="card shadow-sm p-4 mb-4" id="about" itemprop="description">
    <div class="card-body">
      <h1 class="card-title mb-3 text-center" itemprop="name">Веб-студия Gaan Developments</h1>
      <p class="card-text text-center">Мы создаём сайты, которые не только красивы, но и приносят результат...</p>
      <!-- Остальной контент -->
    </div>
  </section>

  <!-- Портфолио -->
  <section class="card shadow-sm p-4 mb-4" id="portfolio" itemscope itemtype="https://schema.org/CreativeWork">
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
                  ?>
                  <div class="col-12 col-sm-6 col-md-4">
                    <article class="card h-100 shadow-sm portfolio-card" itemprop="workExample">
                      <a href="portfolio.php?id=<?= (int)$row['id'] ?>" class="text-decoration-none text-dark">
                        <div class="card-img-wrapper">
                          <img src="uploads/<?= $image ?>" class="card-img-top" alt="<?= $title ?>" loading="lazy" itemprop="image">
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

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>

</body>
</html>
