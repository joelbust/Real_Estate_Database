<?php
include "db_connect.php";

$results = [];
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customQuery = $_POST['query'];

    try {
        
        $result = @$conn->query($customQuery);

        if ($result === false) {
            
            $errorMessage = "Query failed: " . htmlspecialchars($conn->error);
        } elseif ($result->num_rows > 0) {
           
            $results = $result->fetch_all(MYSQLI_ASSOC);
        } else {
           
            $errorMessage = "No results found for the given query.";
        }
    } catch (Exception $e) {

        $errorMessage = "An unexpected error occurred: " . htmlspecialchars($e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Query Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Query Results</h1>
        <?php if (!empty($errorMessage)): ?>
            <p style="color: red;"><?= $errorMessage; ?></p>
        <?php elseif (!empty($results)): ?>
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
        <a href="query.php">Run Another Query</a><br>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
