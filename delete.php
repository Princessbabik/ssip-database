<?php
include_once("database.php");

$ID_Participant = $_GET['ID_Participant'];

$result = mysqli_query($conn, "DELETE FROM participant WHERE ID_Participant=$ID_Participant");

if($result) {
    header("Location: player.php");
} else {
    echo "Error deleting participant: " . mysqli_error($conn);
}
?>