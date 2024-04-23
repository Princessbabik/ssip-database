<?php
include_once("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $ID_Committee = isset($_POST['ID_Committee']) ? $_POST['ID_Committee'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['Password']) ? $_POST['Password'] : ''; 

    if ($ID_Committee && $username && $email && $password) { 
        $sql = "SELECT * FROM login WHERE ID_Committee = ? AND username = ? AND email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'iss', $ID_Committee, $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) { 
                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['Password'])) { 
                    echo "<script>window.location.href = 'choose.php';</script>"; 
                } else {
                    echo "<script>alert('Incorrect password.');</script>"; 
                }
            } else {
                echo "<script>alert('Invalid ID_Committee, username, or email.');</script>"; 
            }
        } else {
            echo "Error: Unable to prepare SQL statement.";
        }
    } else { 
        echo "<script>alert('Please fill in all fields.');</script>"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<button onclick="window.location.href='home.php'" class="btn btn-primary btn-block">Back</button>
    <br/><br/>
    <form action="signin.php" method="post" name="form1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-container">
                        <h3 class="form-title">Sign In</h3>
                        <table class="form-table">
                    <tr>
                        <td>ID Committee</td>
                        <td><input type="text" name="ID_Committee" placeholder="Enter ID Committee"></td>
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
                        <td><input type="submit" name="Login" value="Sign In" class="btn btn-primary"></td>
                    </tr>
                </table>
                <p>Don't have an account? <a href="logincom.php">Sign up here</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>