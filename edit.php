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

<!DOCTYPE html>
<html>
<head>
    <title>Edit Participant Data</title>
    <style>
        body {
            background-image: url('Aura.jpg'); 
            background-size: cover;
            background-repeat: repeat; 
        }

        .form-title {
            color: #c96666;
            text-align: center;
        }

        .btn-primary {
            background-color: #cc8b8bb6;
            border-color:#cc8b8bb6;
            width: 4%;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .payment-container {
            background-color: rgba(255, 255, 255, 0.514);
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        .payment-container button,input[type="submit"] {
        background-color: #cc8b8bb6;
        width: 25%;
        }

        .form-table {
            width: 100%;
        }

        .form-table td {
            padding: 4px;
        }

        .btn-primary:hover {
            background-color: #b37373;
        }
    </style>
</head>
<body>
    <button onclick="window.location.href='player.php'" class="btn btn-primary btn-block">Back</button>
    <br/><br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="payment-container">
                    <h3 class="form-title">Edit Participant Data</h3>
                    <form name="update_participant" method="post" action="edit.php">
                        <table class="form-table">
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
                                <td><input type="submit" name="update" value="Update" class="btn btn-primary btn-block"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
