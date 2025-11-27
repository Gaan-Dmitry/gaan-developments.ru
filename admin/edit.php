<?php
require '../config.php';
if (empty($_SESSION['admin_logged'])) { header('Location: login.php'); exit; }
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) { header('Location: index.php'); exit; }
$err = '';
$work = null;
if ($st = $conn->prepare('SELECT * FROM works WHERE id = ?')) {
    $st->bind_param('i',$id);
    $st->execute();
    $res = $st->get_result();
    $work = $res->fetch_assoc();
    $st->close();
}
if (!$work) { echo 'Не найдена.'; exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $webarchive = trim($_POST['webarchive'] ?? '');
    $img = $work['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fname = time() . '_' . preg_replace('/[^a-z0-9._-]/i','_',basename($_FILES['image']['name']));
        $target = __DIR__ . '/../uploads/' . $fname;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $target)) $err = 'Не удалось загрузить изображение.';
        else {
            // remove old
            $old = __DIR__ . '/../uploads/' . $work['image'];
            if (file_exists($old)) @unlink($old);
            $img = $fname;
        }
    }
    if ($err === '') {
        if ($st = $conn->prepare('UPDATE works SET title=?,description=?,category=?,image=?,webarchive=? WHERE id=?')) {
            $st->bind_param('sssssi',$title,$description,$category,$img,$webarchive,$id);
            if ($st->execute()) {
                header('Location: index.php');
                exit;
            } else $err = 'Ошибка БД: ' . $st->error;
            $st->close();
        }
    }
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Редактировать</title><link rel="stylesheet" href="../style.css"></head>
<body>
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0">
      <h2>Редактировать работу</h2>
      <div class="admin-nav"><a href="index.php">Назад</a></div>
    </div>
    <?php if ($err): ?><div class="feedback"><?= htmlspecialchars($err) ?></div><?php endif; ?>
    <form action="edit.php?id=<?= $work['id'] ?>" method="post" enctype="multipart/form-data" class="card">
      <label>Название<input class="input" type="text" name="title" value="<?= htmlspecialchars($work['title']) ?>" required></label>
      <label>Описание<textarea class="input" name="description" rows="6"><?= htmlspecialchars($work['description']) ?></textarea></label>
      <label>Категория<input class="input" type="text" name="category" value="<?= htmlspecialchars($work['category']) ?>"></label>
      <label>WebArchive
        <input class="input" type="text" name="webarchive" value="<?= htmlspecialchars($work['webarchive'] ?? '') ?>">
      </label>
      <p>Текущее превью:</p>
      <img src="../uploads/<?= htmlspecialchars($work['image']) ?>" alt="" style="max-width:220px;display:block;margin-bottom:8px">
      <label>Загрузить новое изображение<input type="file" name="image" accept="image/*"></label>
      <button type="submit">Сохранить</button>
    </form>
  </div>
</body>
</html>
