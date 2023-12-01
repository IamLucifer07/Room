<?php
include "./loginSystem/db_connec.php";

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $searchQuery = mysqli_real_escape_string($conn, $searchQuery);

    $sql = "SELECT * FROM room_listings WHERE is_approved = 1 AND (landlord_name LIKE '%$searchQuery%' OR address LIKE '%$searchQuery%' OR room_description LIKE '%$searchQuery%')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='room_item'>";
            echo "<img src='./listroom/uploads/" . $row['photo_filename'] . "' alt='Room Photo'>";
            echo "<h3>Landlord: " . $row['landlord_name'] . "</h3>";
            echo "<p>Address: " . $row['address'] . "</p>";
            echo "<p>Phone: " . $row['phone'] . "</p>";
            echo "<p>Description: " . $row['room_description'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No results found";
    }

    mysqli_close($conn);
}
