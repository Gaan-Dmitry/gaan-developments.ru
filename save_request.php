<?php
// save_request.php
header('Content-Type: application/json');

// Отключаем вывод ошибок на экран (для продакшена)
ini_set('display_errors', 0);
ini_set('log_errors', 1);

function getPDO() {
    $host = 'localhost';
    $db   = 'u3299512_gaan-developments';
    $user = 'u3299512_gaan-dmitry';
    $pass = 'yZU-gQW-cET-qVK';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    
    return new PDO($dsn, $user, $pass, $options);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $site_type = $_POST['site_type'] ?? '';
        $design = $_POST['design'] ?? 'need';
        $content = $_POST['content'] ?? 'provide';
        $support = $_POST['support'] ?? 'no';
        $budget = $_POST['budget'] ?? '';
        $details = $_POST['details'] ?? '';
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        
        // Базовая валидация
        $errors = [];
        if (empty($site_type)) $errors['site_type'] = 'Выберите тип сайта';
        if (empty($budget)) $errors['budget'] = 'Выберите бюджет';
        if (empty($name)) $errors['name'] = 'Введите имя';
        if (empty($email)) $errors['email'] = 'Введите email';
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Неверный формат email';
        }
        
        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'errors' => $errors]);
            exit;
        }
        
        $pdo = getPDO();
        
        // Генерируем уникальный ID
        $unique_id = uniqid('req_', true);
        
        $stmt = $pdo->prepare("
            INSERT INTO requests (
                site_type, design, content, support, budget, details,
                name, email, phone, request_source, request_type,
                unique_id, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
        ");
        
        $result = $stmt->execute([
            $site_type,
            $design,
            $content,
            $support,
            $budget,
            $details,
            $name,
            $email,
            $phone,
            'website',
            'order',
            $unique_id
        ]);
        
        if ($result) {
            // Успешное сохранение
            echo json_encode([
                'success' => true, 
                'message' => 'Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.',
                'request_id' => $unique_id
            ]);
        } else {
            throw new Exception('Ошибка сохранения в базу данных');
        }
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Ошибка сервера. Пожалуйста, попробуйте позже.'
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
}
?>