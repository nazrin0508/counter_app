<?php
require 'dbconn.php';

// Create table and default row if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS counter (
    id INT PRIMARY KEY,
    value INT DEFAULT 0
)");

$stmt = $pdo->query("SELECT COUNT(*) FROM counter");
if ($stmt->fetchColumn() == 0) {
    $pdo->exec("INSERT INTO counter (id, value) VALUES (1, 0)");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Counter App</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 50px; }
        .counter-box { font-size: 24px; margin: 20px; }
        button { font-size: 18px; padding: 8px 16px; margin: 5px; }
    </style>
</head>
<body>
    <h1>PHP & MySQL Counter</h1>
    <div>
        <button id="increment">+</button>
        <span id="counter" class="counter-box">0</span>
        <button id="decrement">-</button>
    </div>
    <div>
        <button id="reset">Reset</button>
    </div>

    <script>
        function loadCounter() {
            fetch('counter.php')
                .then(res => res.text())
                .then(data => document.getElementById('counter').textContent = data);
        }

        function updateCounter(action) {
            let formData = new FormData();
            formData.append('action', action);

            fetch('counter.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(data => document.getElementById('counter').textContent = data);
        }

        document.getElementById('increment').addEventListener('click', () => updateCounter('increment'));
        document.getElementById('decrement').addEventListener('click', () => updateCounter('decrement'));
        document.getElementById('reset').addEventListener('click', () => updateCounter('reset'));

        // Load initial counter
        loadCounter();
    </script>
</body>
</html>
