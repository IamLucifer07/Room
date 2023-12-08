<?php
error_reporting(E_ERROR);
session_start();
// include '../loginSystem/db_connec.php';
$conn = mysqli_connect("localhost", "root", "", "db_rentspot");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['type'])) {
    $deleteId = $_GET['id'];
    $deleteType = $_GET['type'];

    if ($deleteType === 'user') {
        $sql = "DELETE FROM users WHERE id =$deleteId";
        $sql1 = "delete from room_listings where user_id = $deleteId";
    } elseif ($deleteType === 'listing') {
        $sql = "DELETE FROM room_listings WHERE id =$deleteId";
        if (mysqli_query($conn, $sql)) {
            header("Location: ./admin.php"); // Redirect to the current page after deletion
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid type!";
        exit();
    }
    // echo $sql;
    if (mysqli_query($conn, $sql1)) {
        if (mysqli_query($conn, $sql)) {
            header("Location: ./admin.php"); // Redirect to the current page after deletion
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

mysqli_close($conn);
