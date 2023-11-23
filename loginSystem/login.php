<?php
session_start();
include "db_connec.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uname']) && isset($_POST['password'])) {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if (empty($uname) || empty($pass)) {
            header("Location: loginn.php?error=Username and password are required");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                if ($row['usertype'] === "user") {
                    header("Location: ../dashboard.php");
                    exit();
                } elseif ($row['usertype'] === "admin") {
                    header("Location: ../listroom/admin.php");

                    exit();
                }
            } else {
                header("Location: loginn.php?error=Incorrect Username or password");
                exit();
            }
        }
    } else {
        header("Location: loginn.php");
        exit();
    }
}
