<?php
error_reporting(E_ERROR);
echo $ErrMsg;
session_start();
$error = 0;
if (isset($_POST['submit_listing'])) {
    include '../loginSystem/db_connec.php';

    $landlord_name = $_POST['landlord_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $room_description = $_POST['room_description'];
    $userId = $_SESSION['id'];

    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/gg/room/listroom/uploads/";
    $target_file = $target_dir . basename($_FILES["room_photo"]["name"]);

    $uploadOk = 1;
    // // Validate landlord name
    // if (empty($landlord_name)) {
    //     echo "Error: Landlord name is required.";
    //     $uploadOk = 0;
    // } elseif (!preg_match(`/^[a-zA-Z-' ]*$/`, $landlord_name)) {
    //     echo "Error: Only letters, apostrophes, hyphens, and spaces allowed in landlord name.";
    //     $uploadOk = 0;
    // }


    // validation for landlord_name
    // if (!preg_match("/^[a-zA-Z ]+$/", $landlord_name)) {
    //     echo "Error: Only letters and spaces are allowed in the landlord's name.";
    // }
    if (!preg_match("/^[a-zA-z]*$/", $landlord_name)) {
        $ErrMsg = "Only alphabets and whitespace are allowed.";
        $error++;
    }
    // $err = [];
    // if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
    //     $name = $_POST['name'];
    // } else {
    //     $err['name'] = 'Enter name';
    // }

    //validation for phone
    if (!preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
        $err['phone'] = 'Enter valid number';
        $error++;
    }

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["room_photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Error: File is not an image.";
        $uploadOk = 0;
        $error++;
    }

    if (file_exists($target_file)) {
        echo "Error: File already exists.";
        $uploadOk = 0;
        $error++;
    }

    if ($_FILES["room_photo"]["size"] > 50000000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
        $error++;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Error: Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
        $error++;
    }

    if ($uploadOk == 0) {
        echo "Error: Room listing not submitted.";
    } else {
        if ($error == 0) {
            if (move_uploaded_file($_FILES["room_photo"]["tmp_name"], $target_file)) {
                // echo $target_file;
                $photo_filename = basename($_FILES["room_photo"]["name"]);
                // echo $photo_filename;
                // echo $ErrMsg;



                $sql = "INSERT INTO room_listings (landlord_name, address, phone, room_description, photo_filename, user_id) 
                VALUES ('$landlord_name', '$address', '$phone','$room_description', '$photo_filename', '$userId')";

                if (mysqli_query($conn, $sql)) {
                    echo "Room listing submitted successfully.";
                    header('Location: listings.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            echo "Error: There was an error uploading your Room listing.<br>";
            echo $ErrMsg;
        }
    }

    mysqli_close($conn);
}
