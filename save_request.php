<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
require __DIR__ . '/config.php';

if (!isset($conn) || !($conn instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Ошибка сервера']);
    exit;
}

// Получаем данные
$input = [];
$input['site_type'] = trim($_POST['site_type'] ?? '');
$input['design']    = trim($_POST['design'] ?? '');
$input['content']   = trim($_POST['content'] ?? '');
$input['support']   = trim($_POST['support'] ?? '');
$input['budget']    = trim($_POST['budget'] ?? '');
$input['details']   = trim($_POST['details'] ?? '');
$input['name']      = trim($_POST['name'] ?? '');
$input['email']     = trim($_POST['email'] ?? '');
$input['phone']     = trim($_POST['phone'] ?? '');

// Валидация
$errors = [];
if ($input['site_type']==='') $errors['site_type']='Выберите тип сайта';
if ($input['budget']==='') $errors['budget']='Выберите бюджет';
if ($input['name']==='') $errors['name']='Введите имя';
if ($input['email']==='') $errors['email']='Введите e-mail';
if ($input['email'] && !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) $errors['email']='Неверный e-mail';
if ($input['phone'] && !preg_match('/^\+?[0-9\-\s\(\)]{6,20}$/', $input['phone'])) $errors['phone']='Неверный формат телефона';

if ($errors) {
    http_response_code(400);
    echo json_encode(['success'=>false,'errors'=>$errors]);
    exit;
}

// Подготовка и вставка
$stmt = $conn->prepare("INSERT INTO requests (site_type, design, content, support, budget, details, name, email, phone, created_at)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Ошибка сервера']);
    exit;
}

$stmt->bind_param(
    'sssssssss',
    $input['site_type'], $input['design'], $input['content'], $input['support'], $input['budget'],
    $input['details'], $input['name'], $input['email'], $input['phone']
);

if ($stmt->execute()) {
    echo json_encode(['success'=>true,'message'=>'Заявка успешно отправлена']);
} else {
    http_response_code(500);
    echo json_encode(['success'=>false,'message'=>'Ошибка при сохранении заявки']);
}

$stmt->close();
