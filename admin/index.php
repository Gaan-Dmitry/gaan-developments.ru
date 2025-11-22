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

// Управление заявками
$requests = [];
$filter = $_GET['filter'] ?? '';
$sort = $_GET['sort'] ?? 'id';
$order = $_GET['order'] ?? 'DESC';

// Построение SQL запроса для заявок с фильтрацией и сортировкой
$sql = "SELECT * FROM requests WHERE 1=1";
$params = [];
$types = "";

// Добавляем фильтрацию
if ($filter) {
    $sql .= " AND (name LIKE ? OR email LIKE ? OR phone LIKE ?)";
    $search_param = "%$filter%";
    $params = [$search_param, $search_param, $search_param];
    $types = "sss";
}

// Добавляем сортировку
$allowed_sort = ['id', 'name', 'email', 'created_at'];
$allowed_order = ['ASC', 'DESC'];
$sort = in_array($sort, $allowed_sort) ? $sort : 'id';
$order = in_array($order, $allowed_order) ? $order : 'DESC';
$sql .= " ORDER BY $sort $order";

if ($stmt = $conn->prepare($sql)) {
    if ($params) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($c = $result->fetch_assoc()) $requests[] = $c;
    $stmt->close();
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Админка</title><link rel="stylesheet" href="../style.css"><link rel="stylesheet" href="../assets/css/bootstrap.min.css"></head>
<body>
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0">
      <h2>Админ-панель</h2>
      <div class="admin-nav"><a href="../index.php">На сайт</a><a href="add.php">Добавить</a><a href="logout.php">Выйти</a></div>
    </div>

    <h3>Портфолио</h3>
    <table class="table">
      <thead><tr><th>ID</th><th>Название</th><th>Категория</th><th>Изображение</th><th>Действия</th></tr></thead>
      <tbody>
<?php foreach($rows as $r): ?>
<tr>
  <td><?= $r['id'] ?></td>
  <td><?= htmlspecialchars($r['title']) ?></td>
  <td><?= htmlspecialchars($r['category']) ?></td>
  <td><img src="../uploads/<?= htmlspecialchars($r['image']) ?>?v=<?= time() ?>" alt="" style="max-height:60px"></td>
  <td><a href="edit.php?id=<?= $r['id'] ?>">Редактировать</a> | <a href="index.php?delete_id=<?= $r['id'] ?>" onclick="return confirm('Удалить?')">Удалить</a></td>
</tr>
<?php endforeach; ?>
      </tbody>
    </table>

    <h3 style="margin-top:20px">Заявки</h3>
    <!-- Фильтр и сортировка заявок -->
    <div class="mb-3">
      <form method="GET" class="row g-2">
        <div class="col-md-4">
          <input type="text" name="filter" class="form-control" placeholder="Поиск по имени/почте/телефону" value="<?= htmlspecialchars($filter) ?>">
        </div>
        <div class="col-md-2">
          <select name="sort" class="form-select">
            <option value="id" <?= $sort === 'id' ? 'selected' : '' ?>>ID</option>
            <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>Имя</option>
            <option value="email" <?= $sort === 'email' ? 'selected' : '' ?>>Email</option>
            <option value="created_at" <?= $sort === 'created_at' ? 'selected' : '' ?>>Дата</option>
          </select>
        </div>
        <div class="col-md-2">
          <select name="order" class="form-select">
            <option value="DESC" <?= $order === 'DESC' ? 'selected' : '' ?>>По убыванию</option>
            <option value="ASC" <?= $order === 'ASC' ? 'selected' : '' ?>>По возрастанию</option>
          </select>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-primary">Применить</button>
        </div>
        <div class="col-md-2">
          <a href="index.php" class="btn btn-secondary">Сбросить</a>
        </div>
      </form>
    </div>
    
    <!-- Таблица заявок -->
    <table class="table" style="margin-top:10px">
      <thead>
        <tr>
          <th><a href="?filter=<?= urlencode($filter) ?>&sort=id&order=<?= $sort === 'id' && $order === 'ASC' ? 'DESC' : 'ASC' ?>">ID <?= $sort === 'id' ? ($order === 'ASC' ? '↑' : '↓') : '' ?></a></th>
          <th><a href="?filter=<?= urlencode($filter) ?>&sort=name&order=<?= $sort === 'name' && $order === 'ASC' ? 'DESC' : 'ASC' ?>">Имя <?= $sort === 'name' ? ($order === 'ASC' ? '↑' : '↓') : '' ?></a></th>
          <th><a href="?filter=<?= urlencode($filter) ?>&sort=email&order=<?= $sort === 'email' && $order === 'ASC' ? 'DESC' : 'ASC' ?>">Email <?= $sort === 'email' ? ($order === 'ASC' ? '↑' : '↓') : '' ?></a></th>
          <th>Детали</th>
          <th><a href="?filter=<?= urlencode($filter) ?>&sort=created_at&order=<?= $sort === 'created_at' && $order === 'ASC' ? 'DESC' : 'ASC' ?>">Дата <?= $sort === 'created_at' ? ($order === 'ASC' ? '↑' : '↓') : '' ?></a></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($requests as $req): ?>
        <tr>
          <td><?= $req['id'] ?></td>
          <td><?= htmlspecialchars($req['name']) ?></td>
          <td><?= htmlspecialchars($req['email']) ?></td>
          <td>
            <details>
              <summary>Подробнее</summary>
              <div class="p-2 bg-light">
                <p><strong>Тип сайта:</strong> <?= htmlspecialchars($req['site_type'] ?? 'Не указан') ?></p>
                <p><strong>Дизайн:</strong> <?= htmlspecialchars($req['design'] ?? 'Не указан') ?></p>
                <p><strong>Контент:</strong> <?= htmlspecialchars($req['content'] ?? 'Не указан') ?></p>
                <p><strong>Поддержка:</strong> <?= htmlspecialchars($req['support'] ?? 'Не указана') ?></p>
                <p><strong>Бюджет:</strong> <?= htmlspecialchars($req['budget'] ?? 'Не указан') ?></p>
                <p><strong>Телефон:</strong> <?= htmlspecialchars($req['phone'] ?? 'Не указан') ?></p>
                <p><strong>Детали:</strong> <?= nl2br(htmlspecialchars($req['details'] ?? 'Нет')) ?></p>
              </div>
            </details>
          </td>
          <td class="small"><?= $req['created_at'] ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>

    <?php if (empty($requests)): ?>
      <p class="small">Заявок нет.</p>
    <?php endif; ?>

  </div>
  
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
