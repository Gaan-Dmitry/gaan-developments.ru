<?php
require '../config.php';
if (empty($_SESSION['admin_logged'])) { header('Location: login.php'); exit; }
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');
    if ($title === '') $err = 'Название обязательно.';
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) $err = 'Нужен файл превью.';
    if ($err === '') {
        $fname = time() . '_' . preg_replace('/[^a-z0-9._-]/i','_',basename($_FILES['image']['name']));
        $target = __DIR__ . '/../uploads/' . $fname;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) $err = 'Не удалось сохранить файл.';
        else {
            $sql = 'INSERT INTO works (title,description,category,image) VALUES (?,?,?,?)';
            if ($st = $conn->prepare($sql)) {
                $st->bind_param('ssss',$title,$description,$category,$fname);
                if ($st->execute()) {
                    header('Location: index.php');
                    exit;
                } else $err = 'Ошибка БД: ' . $st->error;
                $st->close();
            }
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Добавить работу</title><link rel="stylesheet" href="../style.css"></head>
<body>
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0">
      <h2>Добавить работу</h2>
      <div class="admin-nav"><a href="index.php">Назад</a></div>
    </div>
    <?php if ($err): ?><div class="feedback"><?= htmlspecialchars($err) ?></div><?php endif; ?>
    <form action="add.php" method="post" enctype="multipart/form-data" class="card">
      <label>Название<input class="input" type="text" name="title" required></label>
      <label>Описание<textarea class="input" name="description" rows="6"></textarea></label>
      <label>Категория<input class="input" type="text" name="category"></label>
      <label>Превью<input type="file" name="image" accept="image/*" required></label>
      <button type="submit">Добавить</button>
    </form>
  </div>
</body>
</html>
