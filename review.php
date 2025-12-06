<?php
require_once __DIR__ . '/config.php';

// --- Функция отправки запроса Google Apps Script ---
function sendReviewToScript($data) {
    $scriptUrl = 'https://script.google.com/macros/s/AKfycbwNmu6whvAFbCk0qo8DulA3Bgm_siBOMjvghDfzjH9F02YLOIoGBw6yTzM0PRfkl28S/exec';
    $ch = curl_init($scriptUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [$response, $error, $httpCode];
}

$message = '';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $text = trim($_POST['text'] ?? '');
    $email = trim($_POST['email'] ?? '');
    if ($name === '' || $text === '') {
        $err = 'Пожалуйста, заполните имя и текст отзыва.';
    } else {
        list($response, $curlError, $httpCode) = sendReviewToScript([
            'name' => $name,
            'text' => $text,
            'email' => $email,
        ]);
        if ($curlError) {
            $err = 'Ошибка соединения: ' . $curlError;
        } elseif ($httpCode === 200 && strpos($response, 'success":true') !== false) {
            $message = 'Спасибо! Ваш отзыв отправлен на модерацию.';
        } else {
            $err = 'Ошибка отправки отзыва. Попробуйте позже.';
            error_log("Google Apps Script error: " . $response);
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Оставить отзыв — Дмитрий Гаан (Gaan Developments)</title>
  <meta name="description" content="Оставить отзыв о работе с веб-разработчиком Дмитрием Гааном. Ваше мнение важно для улучшения качества услуг.">
  <meta name="author" content="Дмитрий Гаан">
  
  <!-- Favicon & CSS -->
  <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  
  <!-- Schema.org -->
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
    ]
  }
  </script>
</head>
<body>
  <main class="container" style="max-width:540px; margin-top:38px">
    <section class="card shadow-sm p-4 mb-4">
      <h1 class="text-center mb-3">Оставить отзыв</h1>
      <p class="text-center text-muted mb-4">
        Ваш отзыв поможет мне стать лучше. Все отзывы публикуются после проверки.
      </p>
      
      <?php if ($message): ?>
        <div class="alert alert-success text-center">
          <h4 class="alert-heading">Спасибо!</h4>
          <p><?= $message ?></p>
          <hr>
          <p class="mb-0">Вы будете перенаправлены на главную страницу через несколько секунд...</p>
        </div>
        <script>
          setTimeout(function() {
            window.location.href = 'index.php';
          }, 3000);
        </script>
        <div class="text-center mt-3">
          <a href="index.php" class="btn btn-primary">На главную</a>
        </div>
      <?php else: ?>
        <?php if ($err): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($err) ?></div>
        <?php endif; ?>
        
        <form method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Имя *</label>
            <input type="text" class="form-control" name="name" id="name" maxlength="36" required 
                   placeholder="Как к вам обращаться?">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email (не обязательно)</label>
            <input type="email" class="form-control" name="email" id="email" maxlength="60"
                   placeholder="Для связи, если понадобится уточнить детали">
          </div>
          <div class="mb-3">
            <label for="text" class="form-label">Текст отзыва *</label>
            <textarea class="form-control" name="text" id="text" rows="6" maxlength="1500" required
                      placeholder="Расскажите о вашем опыте работы, что понравилось, что можно улучшить..."></textarea>
            <div class="form-text">Максимум 1500 символов</div>
          </div>
          
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Отправить отзыв</button>
          </div>
        </form>
        
        <div class="mt-4 pt-3 border-top">
          <h5 class="h6">Другие способы связи</h5>
          <p class="small text-muted mb-2">
            Если у вас есть вопросы или предложения, вы также можете написать мне напрямую:
          </p>
          <div class="d-flex flex-wrap gap-2">
            <a href="https://t.me/Gaan_Developments_bot" class="btn btn-outline-primary btn-sm" target="_blank" rel="noopener">
              Telegram-бот
            </a>
            <a href="mailto:gaandima55@yandex.ru" class="btn btn-outline-secondary btn-sm">
              Email
            </a>
          </div>
        </div>
      <?php endif; ?>
    </section>
  </main>
  
  <!-- Подключение скриптов -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>