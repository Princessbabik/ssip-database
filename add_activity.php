<?php
include_once("database.php");

if (isset($_POST['Add_Activity'])) {
    $ID_Committee = $_POST['ID_Committee'];  // ID of the related committee
    $Activity_Name = $_POST['Activity_Name'];
    $Activity_Date = $_POST['Activity_Date'];
    $Location = $_POST['Location'];

    $sql = "INSERT INTO activities (ID_Committee, Activity_Name, Activity_Date, Location) 
            VALUES ('$ID_Committee', '$Activity_Name', '$Activity_Date', '$Location')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Activity added successfully.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Activity</title>
    <link href="paystyle.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="payment-container">
                    <h3 class="form-title">ADD NEW ACTIVITY!!</h3>
                    <form action="add_activity.php" method="post" name="form_activity"> 
                        <table>
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee" placeholder="Enter Committee ID"></td>
                            </tr>
                            <tr>
                                <td>Activity Name</td>
                                <td><input type="text" name="Activity_Name" placeholder="Enter Activity Name"></td>
                            </tr>
                            <tr>
                                <td>Activity Date</td>
                                <td><input type="date" name="Activity_Date"></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td><input type="text" name="Location" placeholder="Enter Location"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Add_Activity" value="Add Activity" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</body>
</html>