<?php
error_reporting(E_ERROR);

session_start();
include '../loginsystem/db_connec.php';

$userId = $_SESSION['id'];
$sql = "SELECT * FROM room_listings WHERE user_id = '$userId'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #0366d6;
        }

        a:hover {
            text-decoration: underline;
        }

        .msg {
            display: none;
            padding: 10px;
            margin-top: 10px;
            text-align: center;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
    </style>
    <script>
        function displayMessage(message) {
            const msgElement = document.querySelector('.msg');
            msgElement.innerText = message;
            msgElement.style.display = 'block';
            setTimeout(function() {
                msgElement.style.display = 'none';
                msgElement.innerText = '';
            }, 15000);
        }
    </script>
</head>

<body>
    <div style="float:right;">
        <a href="../loginSystem/logout.php">logout</a>
    </div>
    <li><a href="../dashboard.php">Home</a></li>
    <span class="msg" style="display: none;"></span>
    <h2>Your Rooms</h2>
    <table border="1">
        <tr>
            <th>Landlord Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Room Description</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['landlord_name'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['room_description'] . "</td>";
            echo "<td><a href='preview_listings.php?id=" . $row['id'] . "' target='_blank'>Preview</a></td>";
            echo "<td><a href='delete.php?listing_id=" . $row['id'] . "' onclick='deleteListing(event)'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <script>
        function deleteListing(event) {
            event.preventDefault();
            const confirmation = confirm('Are you sure you want to delete this listing?');
            if (confirmation) {
                const url = event.currentTarget.getAttribute('href');
                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        displayMessage(data);
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</body>

</html>