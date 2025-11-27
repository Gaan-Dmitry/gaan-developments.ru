<?php
require_once __DIR__ . '/config.php';
$message = '';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $text = trim($_POST['text'] ?? '');
  $email = trim($_POST['email'] ?? '');

  if ($name === '' || $text === '') {
      $err = 'Пожалуйста, заполните имя и текст отзыва.';
  } else {
      // URL Google Apps Script
      $scriptUrl = 'https://script.google.com/macros/s/AKfycbwNmu6whvAFbCk0qo8DulA3Bgm_siBOMjvghDfzjH9F02YLOIoGBw6yTzM0PRfkl28S/exec';

      // Подготовка данных для отправки
      $postData = http_build_query([
          'name' => $name,
          'text' => $text,
          'email' => $email,
      ]);

      // Отправка POST-запроса
      $ch = curl_init($scriptUrl);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Content-Type: application/x-www-form-urlencoded',
      ]);

      $response = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      if ($httpCode === 200 && strpos($response, '"success":true') !== false) {
          $message = 'Спасибо! Ваш отзыв отправлен на модерацию.';
      } else {
          $err = 'Ошибка отправки отзыва. Попробуйте позже.';
          error_log("Google Apps Script error: " . $response); // логируем ошибку
      }
  }
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Оставить отзыв — Gaan Developments</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
  <main class="container" style="max-width:540px; margin-top:38px">
    <section class="card shadow-sm p-4 mb-4">
      <h1 class="text-center mb-4">Оставить отзыв</h1>
      <?php if ($message): ?>
        <div class="feedback text-success mb-3"><?= $message ?></div>
        <div class="text-center mt-3"><a href="index.php" class="btn btn-primary">На главную</a></div>
      <?php else: ?>
      <?php if ($err): ?><div class="feedback text-danger mb-3"><?= htmlspecialchars($err) ?></div><?php endif; ?>
      <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Имя *</label>
            <input type="text" class="form-control" name="name" id="name" maxlength="36" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email (не обязательно)</label>
            <input type="email" class="form-control" name="email" id="email" maxlength="60">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Текст отзыва *</label>
            <textarea class="form-control" name="text" id="text" rows="5" maxlength="1500" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Отправить отзыв</button>
      </form>
      <?php endif; ?>
    </section>
  </main>
</body>
</html>
