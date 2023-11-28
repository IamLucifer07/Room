<?php
error_reporting(E_ERROR);

session_start();
include '../loginSystem/db_connec.php';

$userId = $_SESSION['id'];

if (isset($_GET['listing_id'])) {
    $listingId = $_GET['listing_id'];

    $sql = "DELETE FROM room_listings WHERE id = $listingId AND user_id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Listing deleted successfully.";
    } else {
        echo "Error deleting listing: " . mysqli_error($conn);
    }
}
