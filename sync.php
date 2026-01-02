<?php
header('Content-Type: application/json');

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$key = $_POST['key'] ?? '';
$type = $_POST['type'] ?? 'auth';

if (!empty($name)) {
    $data = sprintf("[%s] Тип: %s | Имя: %s | Email/Ключ: %s\n", 
        date('Y-m-d H:i:s'), $type, $name, ($email ?: $key));
    
    // Сохраняем в файл users.txt
    file_put_contents('users.txt', $data, FILE_APPEND);

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Пустое имя']);
}
?>