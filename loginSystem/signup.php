<?php
$name = $email = $phone = $address = $username = $password = '';
if (isset($_POST['btnSave'])) {
    $err = [];
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = validate_input($_POST['name']);
    } else {
        $err['name'] = 'Enter name';
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $err['email'] = 'Enter email';
    }

    if (isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone'])) {
        $phone = validate_input($_POST['phone']);
    } else {
        $err['phone'] = 'Enter phone';
    }
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $address = validate_input($_POST['address']);
    } else {
        $err['address'] = 'Enter address';
    }
    if (isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username'])) {
        $username = validate_input($_POST['username']);
    } else {
        $err['username'] = 'Enter username';
    }
    if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])) {
        $password = validate_input($_POST['password']);
    } else {
        $err['password'] = 'Enter password';
    }
    // if (isset($_POST['cpass']) && !empty($_POST['cpass']) && trim($_POST['cpass'] && isset($_POST['cpass']) != isset($_POST['password']))) {
    //     $password = $_POST['cpass'];
    // } else {
    //     $err['cpass'] = 'Password not matched';
    // }
    if (count($err) == 0) {
        try {

            $connect = mysqli_connect('localhost', 'root', '', 'db_rentspot');

            echo $sql = "insert into users(name,email,phone,address,username,password) values('$name','$email','$phone','$address','$username','$password')";
            $connect->query($sql);
            if ($connect->affected_rows > 0 && $connect->insert_id > 0) {
                echo 'Registered your account';
                header('location:loginn.php');
            }
            $connect->close();
        } catch (Exception $e) {
            die("Database error => " . $e->getMessage());
        }
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Sign up</title>
</head>

<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>Register Your Account</h2>
        <div class="control">
            <label for="name">Fullname </label>
            <input type="text" name="name" value="<?php echo $name ?>">
            <?php echo isset($err['name']) ? $err['name'] : '' ?>
        </div>
        <div class="control">
            <label for="email">Email </label>
            <input type="email" value="<?php echo $email ?>" name="email">
            <?php echo isset($err['email']) ? $err['email'] : '' ?>
        </div>
        <div class="control">
            <label for="phone">Phone </label>
            <input type="phone" value="<?php echo $phone ?>" name="phone">
            <?php echo isset($err['phone']) ? $err['phone'] : '' ?>
        </div>
        <div class="control">
            <label for="address">Address </label>
            <input type="text" value="<?php echo $address ?>" name="address">
            <?php echo isset($err['address']) ? $err['address'] : '' ?>
        </div>
        <div class="control">
            <label for="username">Username </label>
            <input type="text" value="<?php echo $username ?>" name="username">
            <?php echo isset($err['username']) ? $err['username'] : '' ?>
        </div>
        <div class="control">
            <label for="password">Password </label>
            <input type="password" value="<?php echo $password ?>" name="password">
            <?php echo isset($err['password']) ? $err['password'] : '' ?>
        </div>
        <!-- <div class="control">
            <label for="cpass">Confirm password </label>
            <input type="password" value="<?php echo $cpass ?>" name="password" placeholder="Enter password">
            <?php echo isset($err['cpass']) ? $err['cpass'] : '' ?>
        </div> -->
        <div class="control">
            <input type="submit" name="btnSave" class="button" value="Register">
        </div>
        <a href="./loginn.php">Already registered?Login here..</a>
    </form>
</body>

</html>