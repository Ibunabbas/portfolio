<?php
require_once "db.php";

// Fetch logs
$result = $conn->query("SELECT * FROM verification_logs ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Verification Logs</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        h2 { text-align: center; color: #007bff; }
        table {
            width: 100%; border-collapse: collapse; margin-top: 20px;
            background: white; border-radius: 10px; overflow: hidden;
        }
        table th, table td {
            padding: 12px; border-bottom: 1px solid #ddd; text-align: center;
        }
        table th { background: #007bff; color: white; }
        table tr:hover { background: #f1f1f1; }
        a {
            text-decoration: none; color: #fff; background: #007bff;
            padding: 10px 15px; border-radius: 5px; margin-bottom: 20px;
            display: inline-block;
        }
    </style>
</head>
<body>

<a href="index.php">Back to Form</a>
<h2>Verification Logs</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Is Student</th>
        <th>Has ID Card</th>
        <th>Result</th>
        <th>Date</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['isStudent'] ? 'Yes' : 'No'; ?></td>
        <td><?php echo $row['idcard'] ? 'Yes' : 'No'; ?></td>
        <td><?php echo $row['result_message']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
