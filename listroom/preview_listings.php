<?php
error_reporting(E_ERROR);

include '../loginSystem/db_connec.php';

if (isset($_GET['id'])) {
    $listing_id = $_GET['id'];

    $sql = "SELECT * FROM room_listings WHERE id = $listing_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    echo "<h2>Room Listing Preview</h2>";
    echo "<p>Landlord Name: " . $row['landlord_name'] . "</p>";
    echo "<p>Address: " . $row['address'] . "</p>";
    echo "<p>Phone: " . $row['phone'] . "</p>";
    echo "<p>Room Description: " . $row['room_description'] . "</p>";
    echo "<img src='../listroom/uploads/" . $row['photo_filename'] . "' alt='Room Photo'>";
}
