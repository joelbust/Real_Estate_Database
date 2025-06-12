<?php
include "db_connect.php";

$results = [];
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $query = "";

    if ($type === "house") {
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];
        $bedrooms = $_POST['bedrooms'];
        $bathrooms = $_POST['bathrooms'];

        $query = "
            SELECT Property.address, Property.price,Property.ownerName, House.bedrooms, House.bathrooms, House.size, Listings.dateListed 
            FROM Property 
            JOIN House ON Property.address = House.address
            JOIN Listings ON Property.address = Listings.address
            WHERE Property.price BETWEEN $minPrice AND $maxPrice
            AND House.bedrooms = $bedrooms
            AND House.bathrooms = $bathrooms";
    } elseif ($type === "business") {
        $minPrice = $_POST['minPrice'];
        $maxPrice = $_POST['maxPrice'];
        $minSize = $_POST['minSize'];
        $maxSize = $_POST['maxSize'];

        $query = "
            SELECT Property.address, Property.price, Property.ownerName, BusinessProperty.type, BusinessProperty.size, Listings.dateListed
            FROM Property 
            JOIN BusinessProperty ON Property.address = BusinessProperty.address 
            JOIN Listings ON Property.address = Listings.address
            WHERE Property.price BETWEEN $minPrice AND $maxPrice
            AND BusinessProperty.size BETWEEN $minSize AND $maxSize";
    }

    if (!empty($query)) {
        $result = $conn->query($query);
        if ($result) {
            $results = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $errorMessage = "An error occurred during the query.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Properties</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            const type = document.getElementById("type").value;
            const minPrice = document.getElementById("minPrice").value;
            const maxPrice = document.getElementById("maxPrice").value;

            if (!type || !minPrice || !maxPrice) {
                alert("Please fill out all required fields.");
                return false;
            }

            if (type === "house") {
                const bedrooms = document.getElementById("bedrooms").value;
                const bathrooms = document.getElementById("bathrooms").value;

                if (!bedrooms || !bathrooms) {
                    alert("Please fill out all fields for house search.");
                    return false;
                }
            } else if (type === "business") {
                const minSize = document.getElementById("minSize").value;
                const maxSize = document.getElementById("maxSize").value;

                if (!minSize || !maxSize) {
                    alert("Please fill out all fields for business search.");
                    return false;
                }
            }

            return true;
        }

        function toggleFields() {
            const type = document.getElementById("type").value;
            document.getElementById("houseFields").style.display = type === "house" ? "block" : "none";
            document.getElementById("businessFields").style.display = type === "business" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Search Properties</h1>
        <form method="POST" onsubmit="return validateForm()">
            <label for="type">Property Type:</label>
            <select name="type" id="type" onchange="toggleFields()" required>
                <option value="">Select</option>
                <option value="house">House</option>
                <option value="business">Business</option>
            </select>
            <br><br>
            <label for="minPrice">Min Price:</label>
            <input type="number" name="minPrice" id="minPrice" required>
            <label for="maxPrice">Max Price:</label>
            <input type="number" name="maxPrice" id="maxPrice" required>
            <br><br>
            <div id="houseFields" style="display: none;">
                <label for="bedrooms">Bedrooms:</label>
                <input type="number" name="bedrooms" id="bedrooms">
                <label for="bathrooms">Bathrooms:</label>
                <input type="number" name="bathrooms" id="bathrooms">
            </div>
            <div id="businessFields" style="display: none;">
                <label for="minSize">Min Size:</label>
                <input type="number" name="minSize" id="minSize">
                <label for="maxSize">Max Size:</label>
                <input type="number" name="maxSize" id="maxSize">
            </div>
            <br><button type="submit">Search</button>
        </form>

        <?php if (!empty($errorMessage)): ?>
            <p style="color: red;"><?= htmlspecialchars($errorMessage); ?></p>
        <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && empty($results)): ?>
            <p>No results found for your search criteria.</p>
        <?php elseif (!empty($results)): ?>
            <h2>Search Results</h2>
            <table border="1">
                <tr>
                    <?php foreach (array_keys($results[0]) as $col): ?>
                        <th><?= htmlspecialchars($col); ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= htmlspecialchars($value); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
