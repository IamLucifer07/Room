<?php
include '../loginsystem/db_connec.php';

$listing_id = $_GET['id'];
$sql = "SELECT * FROM room_listings WHERE  $listing_id= id  ";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Listings</title>
</head>

<body>
    <h2>Your Rooms</h2>
    <table border="1">
        <tr>
            <!-- <th>ID</th> -->
            <th>Landlord Name</th>
            <th>Address</th>
            <th>Room Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            // echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['landlord_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['room_description'] . "</td>";
            echo "<td><a href='preview_listing.php?id=" . $row['id'] . "' target='_blank'>Preview</a></td>";
            echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
mysqli_close($conn);
?>