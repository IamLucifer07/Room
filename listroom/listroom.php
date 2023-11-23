<!DOCTYPE html>
<html>

<head>
    <title>Room Listing Form</title>
</head>

<body>
    <h2>Room Listing Form</h2>
    <form action="process_listing.php" method="post" enctype="multipart/form-data">
        <label for="landlord_name">Landlord Name:</label>
        <input type="text" name="landlord_name" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" required>
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