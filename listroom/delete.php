<?php
error_reporting(E_ERROR);

include '../loginSystem/db_connec.php';


$sql = "DELETE FROM room_listings WHERE id = 1  ";
$result = mysqli_query($conn, $sql);
