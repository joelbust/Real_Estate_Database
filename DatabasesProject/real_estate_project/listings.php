<?php
include "db_connect.php";

// Fetch house listings
$housesQuery = "
    SELECT Property.address, Property.price,Property.ownerName, House.bedrooms, House.bathrooms, House.size, Listings.dateListed 
    FROM Property 
    JOIN House ON Property.address = House.address
    JOIN Listings ON Property.address = Listings.address";
$houses = $conn->query($housesQuery)->fetch_all(MYSQLI_ASSOC);

// Fetch business property listings
$businessesQuery = "
    SELECT Property.address, Property.price, Property.ownerName, BusinessProperty.type, BusinessProperty.size, Listings.dateListed
    FROM Property 
    JOIN BusinessProperty ON Property.address = BusinessProperty.address
    JOIN Listings ON Property.address = Listings.address";
$businesses = $conn->query($businessesQuery)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Listings</h1>
        <h2>Houses</h2>
        <table border="1">
            <tr>
                <th>Address</th>
                <th>Price</th>
                <th>Owner Name</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Size (sq ft)</th>
                <th>Date listed</th>
            </tr>
            <?php foreach ($houses as $house): ?>
                <tr>
                    <td><?= htmlspecialchars($house['address']); ?></td>
                    <td>$<?= number_format($house['price']); ?></td>
                    <td><?= htmlspecialchars($house['ownerName']); ?></td>
                    <td><?= htmlspecialchars($house['bedrooms']); ?></td>
                    <td><?= htmlspecialchars($house['bathrooms']); ?></td>
                    <td><?= htmlspecialchars($house['size']); ?></td>
                    <td><?= htmlspecialchars($house['dateListed']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Business Properties</h2>
        <table border="1">
            <tr>
                <th>Address</th>
                <th>Price</th>
                <th>Owner Name</th>
                <th>Type</th>
                <th>Size (sq ft)</th>
                <th>Date listed</th>
            </tr>
            <?php foreach ($businesses as $business): ?>
                <tr>
                    <td><?= htmlspecialchars($business['address']); ?></td>
                    <td>$<?= number_format($business['price']); ?></td>
                    <td><?= htmlspecialchars($business['ownerName']); ?></td>
                    <td><?= htmlspecialchars($business['type']); ?></td>
                    <td><?= htmlspecialchars($business['size']); ?></td>
                    <td><?= htmlspecialchars($business['dateListed']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
