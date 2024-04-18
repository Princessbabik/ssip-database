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
                        <table width="25%" border="0">
                            <h3 class="h3-title"> Form for New Participant</h3>
                            <tr>
                                <td>ID</td>
                                <td><input type="text" name="ID_Participant"value="<?php echo isset($_GET['ID_Participant']) ? $_GET['ID_Participant'] : ''; ?>" readonly></td>
                            </tr>
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

    <div id="popupContainer" class="popup-container">
        <div class="popup-box">
            <h2>Alert!</h2>
            <p>You're Added, Please click next to do the payment</p>
            <button onclick="closePopup()">Next</button>
        </div>
    </div>

    <script>
        function showPopup() {
            var popupContainer = document.getElementById("popupContainer");
            popupContainer.style.display = "block";
        }

        function closePopup() {
            var popupContainer = document.getElementById("popupContainer");
            popupContainer.style.display = "none";
            window.location.href = 'payment.php';
        }

        <?php if (isset($_POST['Submit'])): ?>
            showPopup();
        <?php endif; ?>
    </script>

    <?php
    if (isset($_POST['Submit'])) {
        include_once("database.php");

        $ID_Participant = $_POST['ID_Participant'];
        $Nama = $_POST['Nama'];
        $Email = $_POST['Email'];
        $City = $_POST['City'];
        $Gender = $_POST['Gender'];

        $result = mysqli_query($conn, "INSERT INTO participant (ID_Participant, Nama, Email, City, Gender)
        VALUES ('$ID_Participant', '$Nama', '$Email', '$City', '$Gender')");

    }
    ?>
</body>
</html>