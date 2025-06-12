<?php
include "db_connect.php";

$query = "SELECT * FROM Buyer";
$result = $conn->query($query);
$buyers = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Buyers</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Property Type</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Business Type</th>
                <th>Min Price</th>
                <th>Max Price</th>
            </tr>
            <?php foreach ($buyers as $buyer): ?>
                <tr>
                    <td><?= htmlspecialchars($buyer['id']); ?></td>
                    <td><?= htmlspecialchars($buyer['name']); ?></td>
                    <td><?= htmlspecialchars($buyer['phone']); ?></td>
                    <td><?= htmlspecialchars($buyer['propertyType']); ?></td>
                    <td><?= htmlspecialchars($buyer['bedrooms']); ?></td>
                    <td><?= htmlspecialchars($buyer['bathrooms']); ?></td>
                    <td><?= htmlspecialchars($buyer['businessPropertyType']); ?></td>
                    <td>$<?= number_format($buyer['minimumPreferredPrice']); ?></td>
                    <td>$<?= number_format($buyer['maximumPreferredPrice']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
