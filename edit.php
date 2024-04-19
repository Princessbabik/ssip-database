<?php
include_once("database.php");

if(isset($_POST['update']))
{
    $ID_Participant = $_POST['ID_Participant'];
    $Nama = $_POST['Nama'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $Gender = $_POST['Gender'];

    $result = mysqli_query($conn, "UPDATE Participant
    SET Name='$Nama', Email='$Email', City='$City', Gender='$Gender' WHERE ID_Participant=$ID_Participant");

    if($result) {
        header("Location: player.php");
    } else {
        echo "Error updating participant: " . mysqli_error($conn);
    }
} 

$ID_Participant = $_GET['ID_Participant'];

$result = mysqli_query($conn, "SELECT * FROM Participant WHERE ID_Participant=$ID_Participant");

while($participant = mysqli_fetch_array($result))
{
    $Nama = $participant['Name'];
    $Email =$participant['Email'];
    $City = $participant['City'];
    $Gender = $participant['Gender'];
}
?>

<html>
<head>
    <title>Edit Participant Data</title>
</head>
<body>
    <a href="player.php">Home</a>
    <br/><br/>
    <form name="update_participant" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="Nama" value="<?php echo $Nama; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="Email" value="<?php echo $Email; ?>"></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="City" value="<?php echo $City;?>"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="Gender" value="<?php echo $Gender;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="ID_Participant" value="<?php echo $_GET['ID_Participant']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
