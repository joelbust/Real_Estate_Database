<?php
function getAllListings($conn) {
    $sql = "
        SELECT Listings.mlsNumber, Listings.address, Property.price, Listings.agentId, Listings.dateListed
        FROM Listings
        INNER JOIN Property ON Listings.address = Property.address
    ";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
