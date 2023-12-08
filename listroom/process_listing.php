<?php
error_reporting(E_ERROR);

session_start();
if (isset($_POST['submit_listing'])) {
    include '../loginSystem/db_connec.php';

    $landlord_name = $_POST['landlord_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $room_description = $_POST['room_description'];
    // $room_description = uniqid('Room_');
    $userId = $_SESSION['id'];

    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/gg/room/listroom/uploads/";
    $target_file = $target_dir . basename($_FILES["room_photo"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["room_photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Error: File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Error: File already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["room_photo"]["size"] > 50000000) {
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
            // $photo_extension = pathinfo($_FILES["room_photo"]["name"], PATHINFO_EXTENSION);
            // $photo_filename = uniqid('room_photo_') . '.' . $photo_extension;
            echo $photo_filename;
            $sql = "INSERT INTO room_listings (landlord_name, address, phone, room_description, photo_filename, user_id) 
                    VALUES ('$landlord_name', '$address', '$phone','$room_description', '$photo_filename', '$userId')";

            if (mysqli_query($conn, $sql)) {
                echo "Room listing submitted successfully.";
                header('Location: listings.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: There was an error uploading your photo.";
        }
    }

    mysqli_close($conn);
}
