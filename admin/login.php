<?php
require '../config.php';
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = 'SELECT id,username,password FROM admins WHERE username = ? LIMIT 1';
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_id'] = $row['id'];
                header('Location: index.php');
                exit;
            } else {
                $err = 'Неверный логин или пароль.';
            }
        } else {
            $err = 'Неверный логин или пароль.';
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="ru">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Вход в админку</title><link rel="stylesheet" href="../style.css"></head>
<body>
  <div class="container" style="max-width:420px;margin:60px auto">
    <h2 style="text-align: center">Войти в админку</h2>
    <?php if ($err): ?><div class="feedback"><?= htmlspecialchars($err) ?></div><?php endif; ?>
    <form action="login.php" method="post" class="card">
      <label>Логин<input class="input" type="text" name="username" required></label>
      <label>Пароль<input class="input" type="password" name="password" required></label>
      <button type="submit">Войти</button>
    </form>
  </div>
</body>
</html>
