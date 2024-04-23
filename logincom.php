<?php
include_once("database.php");

if (isset($_POST['Submit'])) {
    // Retrieve participant information from the form
    $ID_Committee = $_POST['ID_Committee'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // Hash the password

    // Insert participant information into Participants table
    $sql = "INSERT INTO login (ID_Committee, username, email, Password) 
    VALUES ('$ID_Committee', '$username', '$email', '$Password')";
    
    if (mysqli_query($conn, $sql)) {
        // Participant successfully inserted
        $last_inserted_id = mysqli_insert_id($conn); // Get the ID of the last inserted participant
        echo "<script>alert('Participant added successfully.');</script>";
    } else {
        // Error occurred
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
    <button onclick="window.location.href='home.html'" class="btn btn-primary btn-block">Back</button>
    <br/><br/>
    <form action="index.php" method="post" name="form1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h3 class="form-title">Form for New Participant</h3>
                        <table class="form-table">
                            <tr>
                                <td>ID Committee</td>
                                <td><input type="text" name="ID_Committee" value="<?php echo $login['ID_Committee ']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="ID_Committee"></td>
                            </tr>
                            <tr>
                                <td>username</td>
                                <td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                            <tr> <!-- Add password field -->
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
