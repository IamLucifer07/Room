<?php
include '../loginSystem/db_connec.php';


$sqlListings = "SELECT * FROM room_listings WHERE is_approved = 0";
$resultListings = mysqli_query($conn, $sqlListings);

$apprListings = "SELECT * FROM room_listings WHERE is_approved = 1";
$approvedResultListings = mysqli_query($conn, $apprListings);

$sqlUsers = "SELECT * FROM users WHERE usertype = 'user'";
$resultUsers = mysqli_query($conn, $sqlUsers);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/ae8e481308.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Admin Panel</title>
</head>

<body>
    <header>
        <div style="float:right;">
            <a href="../loginSystem/logout.php">logout</a>
        </div>

        <!-- <div class="logo">RentSpot</div> -->
        <div class="nav">
            <ul class="links">
                <li><a href="../index.php">Home</a></li>
                <!-- <li><a href="listroom.php">List Room</a></li> -->
                <!-- <li><a href="#">About</a></li>
                <li>
                    <a href="./contact us/contact.html">Contact</a>
                </li> -->
            </ul>
        </div>
    </header>
    <h2>Pending Room Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Landlord Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Room Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultListings)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['landlord_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['room_description'] . "</td>";
            echo "<td><a href='preview_listings.php?id=" . $row['id'] . "' target='_blank'>Preview</a></td>";
            echo "<td><a href='approve.php?id=" . $row['id'] . "'>Approve</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <hr>
    <h2>Approved Rooms Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Landlord Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Room Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($approvedResultListings)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['landlord_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['room_description'] . "</td>";
            echo "<td><a href='preview_listings.php?id=" . $row['id'] . "' target='_blank'>Preview</a></td>";
            // echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "&type=listing'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <hr>

    <h2>All Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($user = mysqli_fetch_assoc($resultUsers)) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['name'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['phone'] . "</td>";
            echo "<td>" . $user['address'] . "</td>";
            // echo "<td><a href='delete_user.php?id=" . $user['id'] . "'>Delete</a></td>";
            // echo "<td><a href='delete.php?id=" . $user['id'] . "&usertype=user'>Delete</a></td>";
            // <td><a href='delete.php?id=<?php echo $user['id']; &type=user'>Delete</a></td>
            // <td><a href="delete.php?id=<?php echo $user['id']; &type=user">Delete</a></td>;
            // <td><a href="delete.php?id=<?php echo $user['id']; &type=user">Delete</a></td>;
            // echo `<td> <a href="delete.php?id= $user['id']; &type=user">Delete</a></td>`;
            echo '<td><a href="delete.php?id=' . $user['id'] . '&type=user">Delete</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
mysqli_close($conn);
?>