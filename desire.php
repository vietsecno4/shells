<?php

$host = 'localhost';
$dbname = 'reader_paradise';
$username = 'root';
$password = 'Ii8u8ritR@44';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hashedPassword = '$2y$10$/tFNbVT5Oy2CFXtq25pWL.yC6tkUmhuq.Dh/GOqFw8u1NF452Zhre';
    $userId = 15;

    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :id");
    $stmt->execute([
        ':password' => $hashedPassword,
        ':id'       => $userId,
    ]);

    echo "Password updated successfully. Rows affected: " . $stmt->rowCount() . PHP_EOL;

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . PHP_EOL;
}
