<?php
session_start();
include "./loginSystem/db_connec.php";

if (isset($_GET['id'])) {
    $listing_id = $_GET['id'];

    // Update the is_approved status to 1 (approved) for the specified listing
    $sql = "UPDATE room_listings SET is_approved = 1 WHERE id = $listing_id";

    if (mysqli_query($conn, $sql)) {
        header('Location: admin.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
