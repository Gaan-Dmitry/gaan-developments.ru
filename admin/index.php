<?php
require '../config.php';
if (empty($_SESSION['admin_logged'])) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['delete_id'])) {
    $id = (int)$_GET['delete_id'];
    // delete file name first
    $sql = 'SELECT image FROM works WHERE id = ? LIMIT 1';
    if ($st = $conn->prepare($sql)) {
        $st->bind_param('i',$id);
        $st->execute();
        $res = $st->get_result();
        if ($r = $res->fetch_assoc()) {
            $path = __DIR__ . '/../uploads/' . $r['image'];
            if (file_exists($path)) @unlink($path);
        }
        $st->close();
    }
    $del = $conn->prepare('DELETE FROM works WHERE id = ?');
    $del->bind_param('i',$id);
    $del->execute();
    header('Location: index.php');
    exit;
}

$rows = [];
$sql = 'SELECT * FROM works ORDER BY id DESC';
if ($st = $conn->prepare($sql)) {
    $st->execute();
    $res = $st->get_result();
    while ($r = $res->fetch_assoc()) $rows[] = $r;
    $st->close();
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Админка</title><link rel="stylesheet" href="../style.css"></head>
<body>
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0">
      <h2>Админ-панель</h2>
      <div class="admin-nav"><a href="../index.php">На сайт</a><a href="add.php">Добавить</a><a href="logout.php">Выйти</a></div>
    </div>

    <table class="table">
      <thead><tr><th>ID</th><th>Название</th><th>Категория</th><th>Изображение</th><th>Действия</th></tr></thead>
      <tbody>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['id'] ?></td>
  <td><?= htmlspecialchars($r['title']) ?></td>
  <td><?= htmlspecialchars($r['category']) ?></td>
  <td><img src="../uploads/<?= htmlspecialchars($r['image']) ?>" alt="" style="max-height:60px"></td>
  <td><a href="edit.php?id=<?= $r['id'] ?>">Редактировать</a> | <a href="index.php?delete_id=<?= $r['id'] ?>" onclick="return confirm('Удалить?')">Удалить</a></td>
</tr>
<?php endforeach; ?>
      </tbody>
    </table>

    <h3 style="margin-top:20px">Последние заявки</h3>
<?php
$contacts = [];
if ($s = $conn->prepare('SELECT * FROM contacts ORDER BY id DESC LIMIT 20')) {
    $s->execute();
    $res = $s->get_result();
    while ($c = $res->fetch_assoc()) $contacts[] = $c;
    $s->close();
}
if ($contacts):
?>
<table class="table" style="margin-top:10px">
  <thead><tr><th>ID</th><th>Имя</th><th>Email</th><th>Сообщение</th><th>Дата</th></tr></thead>
  <tbody>
  <?php foreach($contacts as $c): ?>
    <tr>
      <td><?= $c['id'] ?></td>
      <td><?= htmlspecialchars($c['name']) ?></td>
      <td><?= htmlspecialchars($c['email']) ?></td>
      <td><?= nl2br(htmlspecialchars(mb_strimwidth($c['message'],0,140,'...'))) ?></td>
      <td class="small"><?= $c['created_at'] ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <p class="small">Заявок нет.</p>
<?php endif; ?>

  </div>
</body>
</html>
