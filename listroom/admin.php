<?php
include '../loginSystem/db_connec.php';

// Retrieve pending room listings for approval
$sql = "SELECT * FROM room_listings WHERE is_approved = 0";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>

<body>
    <h2>Admin Panel - Pending Room Listings</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Landlord Name</th>
            <th>Address</th>
            <th>Room Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['landlord_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['room_description'] . "</td>";
            echo "<td><a href='preview_listing.php?id=" . $row['id'] . "' target='_blank'>Preview</a></td>"; // Open preview in a new tab
            echo "<td><a href='approve.php?id=" . $row['id'] . "'>Approve</a></td>";
            // echo "<td><a href='approve.php'>Approve</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
mysqli_close($conn);
?>