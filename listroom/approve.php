<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "db_rentspot");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $listing_id = $_GET['id'];

    if ($result = mysqli_query($con, "UPDATE room_listings SET is_approved = 1 WHERE id = $listing_id")) {
        echo "Room listing approved.";
        header('Location: admin.php');
        mysqli_free_result($result);
    }
}
mysqli_close($con);

// echo "success";
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $listing_id = $_GET['id'];

//     echo '' . $listing_id . '';
//     //  Update the is_approved status to 1 (approved) for the specified listing
//     $sql = "UPDATE room_listings SET is_approved = 1 WHERE id = $listing_id";

//     // echo $sql;
//     echo "success";
//     $result = mysqli_query($conn, $sql);
//     echo "success";
// }

// mysqli_close($conn); 
