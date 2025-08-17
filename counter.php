<?php
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Get current counter
    $stmt = $pdo->query("SELECT value FROM counter WHERE id = 1");
    $counter = (int) $stmt->fetchColumn();

    if ($action === 'increment') {
        $counter++;
    } elseif ($action === 'decrement' && $counter > 0) {
        $counter--;
    } elseif ($action === 'reset') {
        $counter = 0;
    }

    // Update DB
    $update = $pdo->prepare("UPDATE counter SET value = ? WHERE id = 1");
    $update->execute([$counter]);

    echo $counter;
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get current counter
    $stmt = $pdo->query("SELECT value FROM counter WHERE id = 1");
    echo $stmt->fetchColumn();
    exit;
}
?>
