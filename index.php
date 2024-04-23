<?php
include_once("database.php");

if (isset($_POST['Submit'])) {
    $Nama = $_POST['Nama'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $Gender = $_POST['Gender'];

    $sql = "INSERT INTO Participant (Name, Email, City, Gender) 
    VALUES ('$Nama', '$Email', '$City', '$Gender')";
    
    if (mysqli_query($conn, $sql)) {
        $last_inserted_id = mysqli_insert_id($conn);
        echo "<script>alert('Participant added successfully.'); window.location.href = 'payment.php?ID_Participant=$last_inserted_id';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add participants</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <button onclick="window.location.href='home.php'" class="btn btn-primary btn-block">Back</button>
    <br/><br/>
    <form action="index.php" method="post" name="form1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h3 class="form-title">Form for New Participant</h3>
                        <table class="form-table">
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="Nama"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="Email"></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="City"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><input type="text" name="Gender"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
