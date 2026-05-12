<?php

$host = 'localhost';
$dbname = 'reader_paradise';
$username = 'root';
$password = 'Ii8u8ritR@44';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // From CLI: php script.php "asdf.png" 19377
    $newName     = $argv[1] ?? '';
    $id          = (int)($argv[2] ?? 0);

    $stmt = $pdo->prepare("
        UPDATE media
        SET
            name      = :name,
            file_name = :file_name
        WHERE id = :id
    ");

    $stmt->execute([
        ':name'      => $newName,
        ':file_name' => $newName,
        ':id'        => $id,
    ]);

    echo "Rows affected: " . $stmt->rowCount() . PHP_EOL;

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . PHP_EOL;
}
