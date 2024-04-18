<?php
// include database connection file
include_once("database.php");

// Get id from URL to delete that student
$ID_Participant = $_GET['ID_Participant'];

// Delete student row from table based on given ID
$result = mysqli_query($conn, "DELETE FROM participant WHERE ID_Participant=$ID_Participant");

// After delete redirect to Home, so that latest students list will be displayed.
header("Location: player.php");
?>