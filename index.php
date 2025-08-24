<?php
require_once "dbconn.php";

// Fetch counter value from database
$sql = "SELECT value FROM counter WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$counter = $row['value'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP & MySQL Counter</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="counter-container">
        <h1>PHP & MySQL Counter</h1>
        <h2>Counter App</h2>
        <div class="d-flex justify-content-center align-items-center">
            <button id="increment" class="btn btn-success btn-custom">+</button>
            <span id="counter" class="counter-display mx-3"><?php echo $counter; ?></span>
            <button id="decrement" class="btn btn-danger btn-custom">-</button>
        </div>
        <button id="reset" class="btn btn-warning btn-reset">Reset</button>
    </div>

    <script>
        // Handle button clicks with AJAX
        document.getElementById('increment').addEventListener('click', () => updateCounter('increment'));
        document.getElementById('decrement').addEventListener('click', () => updateCounter('decrement'));
        document.getElementById('reset').addEventListener('click', () => updateCounter('reset'));

        function updateCounter(action) {
            fetch("counter.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "action=" + action
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById("counter").textContent = data.value;
            });
        }
    </script>
</body>
</html>
