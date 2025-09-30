<?php
require 'config.php';
$works = [];

$sql = "SELECT * FROM works ORDER BY id DESC";
if ($stmt = $conn->prepare($sql)) {
    $stmt->execute();
    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $works[] = $row;
    }
    $stmt->close();
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <!-- SEO -->
  <title>Портфолио — работы Gaan Developments</title>
  <meta name="description" content="Портфолио Gaan Developments: примеры сайтов, лендингов и интернет-магазинов. Реальные кейсы для бизнеса и личных брендов.">
  <meta name="keywords" content="портфолио, веб-разработка, сайты, лендинги, интернет-магазины, проекты, UX/UI дизайн">
  <meta name="author" content="Gaan Developments">
  <link rel="canonical" href="https://example.com/portfolio.php">

  <!-- Open Graph -->
  <meta property="og:title" content="Портфолио Gaan Developments">
  <meta property="og:description" content="Примеры сайтов, разработанных студией Gaan Developments: лендинги, интернет-магазины и корпоративные проекты.">
  <meta property="og:image" content="https://example.com/uploads/logo-60x56.svg">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://example.com/portfolio.php">
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

  <!-- Заголовок -->
  <section class="card shadow-sm p-4 mb-4" itemprop="description">
    <h1 class="mb-3" itemprop="name">Наше портфолио</h1>
    <p class="lead">Сайты, которые мы создали для бизнеса, брендов и личных проектов...</p>
  </section>

  <!-- Содержание портфолио -->
  <nav class="card shadow-sm p-4 mb-4" aria-label="Содержание">
    <h2 class="h4 mb-3">Содержание портфолио</h2>
    <ul class="list-unstyled mb-0">
      <?php foreach ($works as $row): ?>
        <li><a href="#work-<?= (int)$row['id'] ?>" title="<?= htmlspecialchars($row['title']) ?>"><?= htmlspecialchars($row['title']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <!-- Работы -->
  <?php foreach ($works as $row): ?>
    <section class="card shadow-sm p-4 mb-4" id="work-<?= (int)$row['id'] ?>" itemscope itemtype="https://schema.org/CreativeWork">
      <h2 class="h3 mb-3 text-center text-primary" itemprop="headline"><?= htmlspecialchars($row['title']) ?></h2>
      <?php if (!empty($row['image'])): ?>
        <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>" loading="lazy" itemprop="image">
      <?php endif; ?>
      <?php if (!empty($row['category'])): ?>
        <p class="mt-2 text-primary"><strong>Категория:</strong> <span itemprop="genre"><?= htmlspecialchars($row['category']) ?></span></p>
      <?php endif; ?>
      <p itemprop="text"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
    </section>
  <?php endforeach; ?>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>

</body>
</html>
