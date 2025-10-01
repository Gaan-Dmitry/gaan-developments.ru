<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// config.php - database connection and basic settings
$DB_HOST = 'localhost';
$DB_NAME = 'u3015620_gaan-developments';
$DB_USER = 'u3015620_gaan-dmitry';
$DB_PASS = '9SKxwP9sX835nhj'; // <-- set your MySQL root password here

// Base URL (set if your site is in a subfolder, e.g. '/project_root')
$BASE_URL = '/'; 

// Connect using mysqli
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}
$conn->set_charset('utf8mb4');

// Start session for admin authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
