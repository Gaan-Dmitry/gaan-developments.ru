<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$DB_HOST = 'localhost';
$DB_NAME = 'u3299512_gaan-developments';
$DB_USER = 'u3299512_gaan-dmitry';
$DB_PASS = 'yZU-gQW-cET-qVK';
$BASE_URL = '/'; 
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>