<?php
// Nabhovid contact-form database configuration.
// Replace these four values with the MySQL database details created in Hostinger.

function db() {
    $host = 'localhost';
    $name = 'YOUR_DATABASE_NAME';
    $user = 'YOUR_DATABASE_USER';
    $pass = 'YOUR_DATABASE_PASSWORD';

    $dsn = "mysql:host={$host};dbname={$name};charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}
