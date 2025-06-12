<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Run Query</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Run Custom Query</h1>
        <form method="POST" action="query_result.php">
            <label for="query">Enter SQL Query:</label><br>
            <textarea name="query" id="query" rows="5" cols="50" required></textarea><br>
            <button type="submit">Run Query</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
