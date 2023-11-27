<?php
include '../loginSystem/db_connec.php';

if (isset($_GET['id'])) {
    $listing_id = $_GET['id'];

    // Retrieve room listing details by ID
    $sql = "SELECT * FROM room_listings WHERE id = $listing_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);


    echo "<h2>Room Listing Preview</h2>";
    echo "<p>Landlord Name: " . $row['landlord_name'] . "</p>";
    echo "<p>Address: " . $row['address'] . "</p>";
    echo "<p>Room Description: " . $row['room_description'] . "</p>";
    echo "<img src='uploads/" . $row['photo_filename'] . "' alt='Room Photo'>";
}
