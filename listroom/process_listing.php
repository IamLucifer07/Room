<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit_listing'])) {
    include '../loginSystem/db_connec.php';

    $landlord_name = $_POST['landlord_name'];
    $address = $_POST['address'];
    $room_description = $_POST['room_description'];

    $target_dir = "uploads/"; // photos will be stored here
    $target_file = $target_dir . basename($_FILES["room_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check image file 
    $check = getimagesize($_FILES["room_photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Error: File already exists.";
        $uploadOk = 0;
    }

    // Check file size 
    if ($_FILES["room_photo"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Error: Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Error: Room listing not submitted.";
    } else {

        if (move_uploaded_file($_FILES["room_photo"]["tmp_name"], $target_file)) {
            echo $target_file;
            $photo_filename = basename($_FILES["room_photo"]["name"]);
            echo $photo_filename;
            $sql = "INSERT INTO room_listings (landlord_name, address, room_description, photo_filename) 
                    VALUES ('$landlord_name', '$address', '$room_description', '$photo_filename')";

            if (mysqli_query($conn, $sql)) {
                echo "Room listing submitted successfully.";
                header('Location: ../index.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: There was an error uploading your photo.";
        }
    }

    mysqli_close($conn);
}
