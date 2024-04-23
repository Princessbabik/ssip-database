<?php
include_once("database.php");

if (isset($_POST['Submit'])) {
    $ID_Committee = $_POST['ID_Committee'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);


    $sql = "INSERT INTO login (ID_Committee, username, email, Password) 
    VALUES ('$ID_Committee', '$username', '$email', '$Password')";
    
    if (mysqli_query($conn, $sql)) {
        $last_inserted_id = mysqli_insert_id($conn);
        echo "<script>alert('Participant added successfully.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Participants</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <button onclick="window.location.href='home.php'" class="btn btn-primary btn-block">Back</button>
    <br/><br/>
    <form action="logincom.php" method="post" name="form1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h3 class="form-title">Form for New Participant</h3>
                        <table class="form-table">
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" name="Password"></td>
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
