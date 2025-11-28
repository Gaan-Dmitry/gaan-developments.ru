<?php
require_once 'config/database.php';

header('Content-Type: application/json');

function generateUniqueId() {
    return uniqid('req_', true);
}

function sendTelegramNotification($requestId, $name, $email, $phone, $siteType, $budget, $details) {
    $botToken = '8501378717:AAGhzm-krzKpqBwxG_vB37dQvLkEeD_3cW8';
    $chatId = '6297103998';
    
    $siteTypeNames = [
        'landing' => '📰 Лендинг',
        'shop' => '🛍 Интернет-магазин', 
        'blog' => '📝 Блог',
        'forum' => '💬 Форум',
        'corporate' => '🏠 Корпоративный сайт',
        'tool' => '🛠 Веб-инструмент',
        'portfolio' => '🎨 Портфолио',
        'learning' => '🎓 Обучающая платформа',
        'other' => 'Другое'
    ];
    
    $budgetNames = [
        'under_30' => 'До 30 000 ₽',
        '30_60' => '30 000 — 60 000 ₽',
        '60_100' => '60 000 — 100 000 ₽', 
        '100_plus' => '100 000 ₽ и выше'
    ];
    
    $siteTypeName = $siteTypeNames[$siteType] ?? $siteType;
    $budgetName = $budgetNames[$budget] ?? $budget;
    
    // Экранирование специальных символов для MarkdownV2
    function escapeMarkdown($text) {
        if (!$text) return '';
        $escapeChars = ['_', '*', '[', ']', '(', ')', '~', '`', '>', '#', '+', '-', '=', '|', '{', '}', '.', '!'];
        $result = '';
        foreach (str_split($text) as $char) {
            $result .= in_array($char, $escapeChars) ? "\\$char" : $char;
        }
        return $result;
    }
    
    $message = "🌐 *Новая заявка с сайта*\n\n"
             . "ID заявки: `" . $requestId . "`\n"
             . "Тип: Заказ сайта\n"
             . "Имя: " . escapeMarkdown($name) . "\n"
             . "Email: " . escapeMarkdown($email) . "\n"
             . "Телефон: " . escapeMarkdown($phone) . "\n"
             . "Тип сайта: " . escapeMarkdown($siteTypeName) . "\n"
             . "Бюджет: " . escapeMarkdown($budgetName) . "\n";
    
    if (!empty($details)) {
        $message .= "Описание: " . escapeMarkdown($details) . "\n";
    }
    
    $message .= "\n📊 [Посмотреть в админке](https://gaan-developments.ru/admin)";
    
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'MarkdownV2'
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_get_contents($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);
    
    return $result !== false;
}

// Функция для преобразования массива в строку запроса
function http_get_contents($data) {
    $result = '';
    foreach ($data as $key => $value) {
        $result .= ($result ? '&' : '') . $key . '=' . urlencode($value);
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_type = $_POST['site_type'] ?? '';
    $design = $_POST['design'] ?? 'need';
    $content = $_POST['content'] ?? 'provide';
    $support = $_POST['support'] ?? 'no';
    $budget = $_POST['budget'] ?? '';
    $details = $_POST['details'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    $errors = [];
    
    // Валидация
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
    
    try {
        $pdo = getPDO();
        
        // Генерируем уникальный ID
        $unique_id = generateUniqueId();
        
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
            'website',  // источник заявки
            'order',    // тип заявки для заказов с сайта
            $unique_id
        ]);
        
        if ($result) {
            // Отправляем уведомление в Telegram
            $telegramSent = sendTelegramNotification($unique_id, $name, $email, $phone, $site_type, $budget, $details);
            
            echo json_encode([
                'success' => true, 
                'message' => 'Заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.',
                'request_id' => $unique_id,
                'telegram_sent' => $telegramSent
            ]);
        } else {
            throw new Exception('Ошибка сохранения в базу данных');
        }
        
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка сервера: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
}
?>