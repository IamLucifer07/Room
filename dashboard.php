<?php
session_start();
include "./loginSystem/db_connec.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/ae8e481308.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./dashboard.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <title>HomePage</title>
    </head>

    <body>
        <header>
            <div class="user_log">
                <!-- <h2> Hello, <?php echo $_SESSION['username']; ?></h2> -->
            </div>
            <!-- <div class="main_log">
            <div class="sub_log">
                <a href="./loginSystem/loginn.php" class="anchor_login">
                    LOGIN
                </a>
                <span>/</span>
                <a href="./loginSystem/signup.php" class="anchor_login">
                    SIGNUP
                </a>
            </div> 
        </div>-->
            <div class="logo">RentSpot</div>
            <div class="nav">
                <ul class="links">
                    <li><a href="dashboard.php">Home</a></li>
                    <li><a href="./listroom/listroom.php">List Room</a></li>
                    <li><a href="#">About us</a></li>
                    <li>
                        <a href="./contact us/contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </header>
        <main>
            <div class="image_section">
                <form class="Search_bar">
                    <input type="search" placeholder="Search for room" />
                    <button>
                        <svg width="40" height="40" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M48.3301 42.5215C49.1914 43.4785 49.1914 44.9141 48.2344 45.7754L45.5547 48.4551C44.6934 49.4121 43.2578 49.4121 42.3008 48.4551L32.8262 38.9805C32.3477 38.502 32.1562 37.9277 32.1562 37.3535V35.7266C28.7109 38.4062 24.5 39.9375 19.9062 39.9375C8.90039 39.9375 0 31.0371 0 20.0312C0 9.12109 8.90039 0.125 19.9062 0.125C30.8164 0.125 39.8125 9.12109 39.8125 20.0312C39.8125 24.7207 38.1855 28.9316 35.6016 32.2812H37.1328C37.707 32.2812 38.2812 32.5684 38.7598 32.9512L48.3301 42.5215ZM19.9062 32.2812C26.6055 32.2812 32.1562 26.8262 32.1562 20.0312C32.1562 13.332 26.6055 7.78125 19.9062 7.78125C13.1113 7.78125 7.65625 13.332 7.65625 20.0312C7.65625 26.8262 13.1113 32.2812 19.9062 32.2812Z" fill="black" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="gallery_1">
                <?php
                include './loginSystem/db_connec.php';

                // Retrieve approved room listings from the database
                $sql = "SELECT * FROM room_listings"; //WHERE is_approved = 1
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $photo_filename = $row['photo_filename'];
                    $landlord_name = $row['landlord_name'];
                    $address = $row['address'];
                    $room_description = $row['room_description'];

                    // Display the room information in the gallery_1 div
                    echo "<div class='room_item'>";
                    echo "<img height='100px' width='100px' src='./listroom/uploads/" . $photo_filename . "' alt='Room Photo'>";
                    echo "<h3>Landlord: " . $landlord_name . "</h3>";
                    echo "<p>Address: " . $address . "</p>";
                    echo "<p>Description: " . $room_description . "</p>";
                    echo "</div>";
                }

                mysqli_close($conn);
                ?>
            </div>
            <div class="gallery_2"></div>
            <div class="gallery_3"></div>
            <div class="gallery_1"></div>
            <div class="gallery_2"></div>
            <div class="gallery_3"></div>
            <div class="gallery_2"></div>
            <div class="gallery_3"></div>
        </main>
        <footer>
            <div class="links">
                <h3>USEFUL LINKS</h3>
                <li><a href="index.html">Home</a></li>
                <li><a href="#">List Room</a></li>
                <li><a href="#">About Us</a></li>
            </div>
            <div class="news-subscribe">
                <h3>NEWSLETTER</h3>
                <form class="form-1">
                    <input type="email" placeholder="Your Email address" required />
                    <br />
                    <button type="submit">SUBSCRIBE</button>
                </form>
            </div>
            <div class="location">
                <h3>CONTACT US</h3>
                <li><a href="./contact us/contact.html">Contact Us</a></li>
                <p>Satdobato, Near Swimming Pool</p>
                <div class="social-icon">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-github"></i>
                </div>
            </div>
        </footer>
    </body>

    </html>

<?php
} else {
    header("Location: ./loginSystem/loginn.php");
    exit();
}
?>