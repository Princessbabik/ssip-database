<?php
include_once("database.php");

if (isset($_POST['Add_Committee'])) {
    $ID_Committee = $_POST['ID_Committee'];  // ID of the related committee
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $Role = $_POST['Role'];

    $sql = "INSERT INTO Comlist (ID_Committee, Name, Email, City, Role) 
            VALUES ('$ID_Committee', '$Name', '$Email', '$City', '$Role')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Committee added successfully.');window.location.href = 'committeelist.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Committee</title>
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
                    <h3 class="form-title">ADD NEW COMMITTEE!!</h3>
                    <form action="add_committee.php" method="post" name="form_committee"> 
                        <table>
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee" placeholder="Enter Committee ID"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="Name" placeholder="Enter Name"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="Email" placeholder="Enter Email"></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="City" placeholder="Enter City"></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><input type="text" name="Role" placeholder="Enter Role"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Add_Committee" value="Add Committee" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
