<!DOCTYPE html>
<html>
<head>
    <title>Add participants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="login-container">
                    <h2>Add Participants</h2>
                    <form action="index.php" method="post" name="form1">
                        <div class="form-group">
                            <label for="ID_Participant">ID Participant</label>
                            <input type="text" class="form-control" name="ID_Participant" id="ID_Participant">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Name</label>
                            <input type="text" class="form-control" name="Nama" id="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="Email" id="Email">
                        </div>
                        <div class="form-group">
                            <label for="City">City</label>
                            <input type="text" class="form-control" name="City" id="City">
                        </div>
                        <div class="form-group">
                            <label for="Gender">Gender</label>
                            <input type="text" class="form-control" name="Gender" id="Gender">
                        </div>
                        <button type="submit" name="Submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
                <br>
                <a href="home.html" class="btn btn-secondary btn-block"></a>
            </div>
        </div>
    </div>

    <div id="popupContainer" class="popup-container">
        <div class="popup-box">
            <h2>Pop-up Alert</h2>
            <p>You're Added, Please click next to do the payment</p>
            <button onclick="closePopup()">NEXT</button>
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
            window.location.href = 'player.php';
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