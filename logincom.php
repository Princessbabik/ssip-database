<?php
include_once("database.php");

if (isset($_POST['Submit'])) {
    $ID_Committee = $_POST['ID_Committee'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['Password'];

    $check_duplicate = "SELECT * FROM login WHERE ID_Committee = '$ID_Committee'";
    $result = mysqli_query($conn, $check_duplicate);

    if (mysqli_num_rows($result) > 0) { 
        echo "<script>alert('Error! ID Committee already exists.');</script>";
    } else {
        $sql = "INSERT INTO login (ID_Committee, username, email, password) 
                VALUES ('$ID_Committee', '$username', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Successfully added new committee.');
                    window.location.href = 'choose.php'; // Redirect after success
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <button onclick="window.location.href='signin.php'" class="btn btn-primary">Back</button>
    <br><br>

    <form action="logincom.php" method="post" name="form1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h3 class="form-title">Sign Up</h3>
                        <table class="form-table">
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee" placeholder="Enter ID"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username" placeholder="Enter Username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" placeholder="Enter Email"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="Password" placeholder="Enter Password"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Submit" value="Submit" class="btn btn-primary"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
