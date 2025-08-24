<?php
require_once "dbconn.php";

$action = $_POST['action'] ?? '';
$response = ["value" => 0];

// Get current value
$sql = "SELECT value FROM counter WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$value = $row['value'] ?? 0;

// Perform action
if ($action === "increment") {
    $value++;
} elseif ($action === "decrement" && $value > 0) {
    $value--;
} elseif ($action === "reset") {
    $value = 0;
}

// Update database
$conn->query("UPDATE counter SET value = $value WHERE id = 1");

// Response as JSON
$response['value'] = $value;
echo json_encode($response);
?>
