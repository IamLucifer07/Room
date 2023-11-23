<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
<<<<<<< HEAD
    <form action="../index.html" method="post">
=======
    <form action="login.php" method="post">
>>>>>>> abab5c1 (dashboard updated)
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Username</label>
        <input type="text" name="uname"><br>

        <label>Password</label>
        <input type="password" name="password"><br>

        <button type="submit">Login</button>

        <a href="./signup.php" id="signup-new">New here? SignUp..</a>
    </form>
</body>

</html>