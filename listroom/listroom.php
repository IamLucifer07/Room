<!DOCTYPE html>
<html>

<head>
    <title>Room Listing Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #1690A7;

        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        textarea,
        input[type="file"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <a href="../dashboard.php">Home</a>
    <h2>Room Listing Form</h2>
    <form action="process_listing.php" method="post" enctype="multipart/form-data">
        <label for="landlord_name">Landlord Name:</label>
        <input type="text" name="landlord_name" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" required>
        <br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" required>
        <br>

        <label for="room_description">Room Description:</label>
        <textarea name="room_description" rows="5" required></textarea>
        <br>

        <label for="room_photo">Room Photo:</label>
        <input type="file" name="room_photo" accept="image/*" required>
        <br>

        <input type="submit" name="submit_listing" value="Submit Listing">
    </form>
</body>

</html>