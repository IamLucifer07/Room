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
    $email = $_POST['email'];
    $phone = validate_input($_POST['phone']);
    $address = validate_input($_POST['address']);

    $updateSQL = "UPDATE users SET name='$name', email='$email', phone='$phone', address='$address' WHERE id = $userID";

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

</head>

<body>
    <h2>User Profile</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="control">
            <label for="name">Fullname </label>
            <input type="text" name="name" value="<?php echo $user['name']; ?>">
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
</body>

</html>