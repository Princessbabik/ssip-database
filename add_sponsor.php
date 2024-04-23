<?php
include_once("database.php");

if (isset($_POST['Add_Sponsor'])) {
    $ID_Committee = $_POST['ID_Committee'];  // ID of the related committee
    $Sponsor_Brand = $_POST['Sponsor_Brand'];
    $Contact_Person = $_POST['Contact_Person'];

    $sql = "INSERT INTO Sponsor (ID_Committee, Sponsor_Brand, Contact_Person) 
            VALUES ('$ID_Committee', '$Sponsor_Brand', '$Contact_Person')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Sponsor added successfully.');window.location.href = 'sponsorlist.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Sponsor</title>
    <style>
        body {
    background-image: url('Aura.jpg'); 
    background-size: cover;
    background-repeat: repeat; 
    }
    .form-title {
        color: #c96666;
    }
    .btn-primary {
        background-color: #cc8b8bb6;
        border-color: #cc8b8bb6;
        border-radius: 5px; 
        width: 5%;
        padding: 3px;
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
        border-color:#cc8b8bb6;
        border-radius: 10px;
        width: 60%;
        padding: 5px;
    }

    .form-title {
        text-align: center;
    }

    .form-table {
        width: 100%;
    }

    .form-table td {
        padding: 4px;
    }

    </style>
</head>
<body>
<button onclick="window.location.href='choose.php'" class="btn btn-primary btn-block">Back</button><br/><br/>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="payment-container">
                    <h3 class="form-title">ADD NEW SPONSOR!!</h3>
                    <form action="add_sponsor.php" method="post" name="form_sponsor"> 
                        <table>
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee" placeholder="Enter Committee ID"></td>
                            </tr>
                            <tr>
                                <td>Sponsor Brand</td>
                                <td><input type="text" name="Sponsor_Brand" placeholder="Enter Sponsor Brand"></td>
                            </tr>
                            <tr>
                                <td>Contact Person</td>
                                <td><input type="text" name="Contact_Person" placeholder="Enter Contact Person"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Add_Sponsor" value="Add Sponsor" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
