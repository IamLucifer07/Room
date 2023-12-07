<?php
session_start();
include '../loginSystem/db_connec.php';

if (!isset($_SESSION['id'])) {
    header('Location: loginn.php');
    exit();
}

$userID = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = $userID";
$result = mysqli_query($conn, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "Error fetching user details: " . mysqli_error($conn);
}

if (isset($_POST['updateProfile'])) {
    $name = validate_input($_POST['name']);
    $username = validate_input($_POST['username']);
    $email = $_POST['email'];
    $phone = validate_input($_POST['phone']);
    $address = validate_input($_POST['address']);

    $updateSQL = "UPDATE users SET name='$name', username='$username', email='$email', phone='$phone', address='$address' WHERE id = $userID";

    if (mysqli_query($conn, $updateSQL)) {
        echo "Profile updated successfully!";
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $userID");
        if ($result) {
            $user = mysqli_fetch_assoc($result);
        } else {
            echo "Error fetching updated user details: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
if (isset($_POST['changePassword'])) {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    // $confirmNewPassword = $_POST['confirm-new-password'];

    // Validate passwords and perform change if they match
    // if (password_verify($currentPassword, $user['password']) && $newPassword === $confirmNewPassword) {
    //     $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $updatePasswordSQL = "UPDATE users SET password='$newPassword' WHERE id = $userID";

    if (mysqli_query($conn, $updatePasswordSQL)) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
} //  else {
//     echo "Current password is incorrect or new passwords don't match!";
// }
// }




function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            /* background: #1690A7; */

        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        .control {
            margin-bottom: 15px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: calc(100% - 110px);
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <div style="float:right;">
        <a href="./loginSystem/logout.php">logout</a>
    </div>

    <!-- <div class="logo">RentSpot</div> -->
    <div class="nav">

        <a href="./dashboard.php">Home</a>
        <!-- <li><a href="listroom.php">List Room</a></li> -->
        <!-- <li><a href="#">About</a></li>
                <li>
                    <a href="./contact us/contact.html">Contact</a>
                </li> -->

    </div>
    <h2>User Profile</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="control">
            <label for="name">Fullname </label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="control">
            <label for="username">Username </label>
            <input type="text" name="username" value="<?php echo $user['username']; ?>">
        </div>
        <div class="control">
            <label for="email">Email </label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>">
        </div>
        <div class="control">
            <label for="phone">Phone </label>
            <input type="text" name="phone" value="<?php echo $user['phone']; ?>">
        </div>
        <div class="control">
            <label for="address">Address </label>
            <input type="text" name="address" value="<?php echo $user['address']; ?>">
        </div>
        <div class="control">
            <input type="submit" name="updateProfile" class="button" value="Update Profile">
        </div>
    </form>
    <h2>Change Password</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="control">
            <label for="current-password">Current Password</label>
            <input type="password" name="current-password" required>
        </div>
        <div class="control">
            <label for="new-password">New Password</label>
            <input type="password" name="new-password" required>
        </div>
        <!-- <div class="control">
            <label for="confirm-new-password">Confirm New Password</label>
            <input type="password" name="confirm-new-password" required>
        </div> -->
        <div class="control">
            <input type="submit" name="changePassword" class="button" value="Change Password">
        </div>
    </form>
</body>

</html>