<?php
// Включаем буферизацию вывода в самом начале
ob_start();

// save_request.php
header('Content-Type: application/json');

// Отключаем вывод ошибок на экран
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

function sendTelegramNotification($requestId, $name, $email, $phone, $siteType, $budget, $details, $design, $content, $support) {
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
    
    $designNames = [
        'ready' => '✅ Готовый дизайн',
        'need' => '🎨 Нужен дизайн'
    ];
    
    $contentNames = [
        'provide' => '✅ Я предоставляю',
        'create' => '📝 Нужна помощь'
    ];
    
    $supportNames = [
        'no' => '❌ Нет',
        'maintenance' => '🔧 Техподдержка',
        'seo' => '📈 Маркетинг / SEO',
        'both' => '🚀 Поддержка + Маркетинг'
    ];
    
    $siteTypeName = $siteTypeNames[$siteType] ?? $siteType;
    $budgetName = $budgetNames[$budget] ?? $budget;
    $designName = $designNames[$design] ?? $design;
    $contentName = $contentNames[$content] ?? $content;
    $supportName = $supportNames[$support] ?? $support;
    
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
             . "🆔 *ID:* `" . $requestId . "`\n"
             . "👤 *Имя:* " . escapeMarkdown($name) . "\n"
             . "📧 *Email:* " . escapeMarkdown($email) . "\n";
    
    if (!empty($phone)) {
        $message .= "📞 *Телефон:* " . escapeMarkdown($phone) . "\n";
    }
    
    $message .= "🌍 *Тип сайта:* " . escapeMarkdown($siteTypeName) . "\n"
              . "💰 *Бюджет:* " . escapeMarkdown($budgetName) . "\n"
              . "🎨 *Дизайн:* " . escapeMarkdown($designName) . "\n"
              . "📄 *Контент:* " . escapeMarkdown($contentName) . "\n"
              . "🔧 *Поддержка:* " . escapeMarkdown($supportName) . "\n";
    
    if (!empty($details)) {
        $message .= "📝 *Описание:* " . escapeMarkdown($details) . "\n";
    }
    
    $message .= "\n[📊 Посмотреть в админке](https://gaan-developments.ru/admin)";
    
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
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);
    
    return $result !== false;
}

// Очищаем буфер на случай, если в нем что-то есть
ob_clean();

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
            // Очищаем буфер перед отправкой JSON
            ob_clean();
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
            // Отправляем уведомление в Telegram
            $telegramSent = sendTelegramNotification(
                $unique_id, 
                $name, 
                $email, 
                $phone, 
                $site_type, 
                $budget, 
                $details,
                $design,
                $content,
                $support
            );
            
            // Очищаем буфер перед отправкой JSON
            ob_clean();
            echo json_encode([
                'success' => true, 
                'message' => 'Заявка успешно отправлена!',
                'request_id' => $unique_id,
                'telegram_sent' => $telegramSent
            ]);
            exit;
        } else {
            throw new Exception('Ошибка сохранения в базу данных');
        }
        
    } catch (Exception $e) {
        // Очищаем буфер перед отправкой JSON
        ob_clean();
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Ошибка сервера. Пожалуйста, попробуйте позже.'
        ]);
        exit;
    }
} else {
    // Очищаем буфер перед отправкой JSON
    ob_clean();
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Метод не разрешен']);
    exit;
}

// Очищаем буфер в конце на всякий случай
ob_end_clean();
?>