<?php

$host = 'localhost';
$dbname = 'reader_paradise';
$username = 'root';
$password = 'Ii8u8ritR@44';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userInput = $_GET['filename'] ?? ''; // or $_POST['filename']

    $stmt = $pdo->prepare("
        SELECT * FROM media
        WHERE file_name = :input
           OR name = :input2
    ");

    $stmt->execute([
        ':input'  => $userInput,
        ':input2' => $userInput,
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $row) {
            print_r($row);
        }
    } else {
        echo "No results found.";
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
