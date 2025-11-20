<?php
require_once "db.php";

// Ensure form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid request.");
}

// Validate inputs
if (!isset($_POST['isStudent']) || !isset($_POST['idcard'])) {
    die("Missing required fields.");
}

// Convert to boolean
$isStudent = ($_POST['isStudent'] == "1");
$idcard = ($_POST['idcard'] == "1");

// Determine result message
$message = match ([$isStudent, $idcard]) {
    [true, true]   => "You are eligible to take a class.",
    [true, false]  => "You can visit the office but cannot take a class.",
    [false, false] => "You are not allowed anywhere near the office.",
    default        => "Invalid input values."
};

// Insert into database
$stmt = $conn->prepare("INSERT INTO verification_logs (isStudent, idcard, result_message) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $isStudent, $idcard, $message);
$stmt->execute();
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verification Result</title>
    <style>
        body { font-family: Arial; text-align: center; padding-top: 50px; }
        .box {
            width: 400px; background: #fff; padding: 20px; margin: auto;
            border-radius: 10px; box-shadow: 0 0 10px #aaa;
        }
        a {
            display: block; text-decoration: none; color: white; background: #007bff;
            margin-top: 20px; padding: 10px; border-radius: 5px; width: 200px;
            margin-left: auto; margin-right: auto;
        }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="box">
    <h2>Verification Result</h2>
    <p><?php echo $message; ?></p>

    <a href="index.php">Go Back</a>
    <a href="admin.php">View Logs</a>
</div>

</body>
</html>
