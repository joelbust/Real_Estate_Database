<?php
include "db_connect.php";

$query = "
    SELECT Agent.agentId, Agent.name AS agentName, Agent.phone, Firm.name AS firmName, Agent.dateStarted
    FROM Agent
    INNER JOIN Firm ON Agent.firmId = Firm.id
";

$result = $conn->query($query);
$agents = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agents</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Real Estate Agents</h1>
        <table border="1">
            <tr>
                <th>Agent ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Firm</th>
                <th>Date Started</th>
            </tr>
            <?php foreach ($agents as $agent): ?>
                <tr>
                    <td><?= htmlspecialchars($agent['agentId']); ?></td>
                    <td><?= htmlspecialchars($agent['agentName']); ?></td>
                    <td><?= htmlspecialchars($agent['phone']); ?></td>
                    <td><?= htmlspecialchars($agent['firmName']); ?></td>
                    <td><?= htmlspecialchars($agent['dateStarted']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
