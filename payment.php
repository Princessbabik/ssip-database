<?php
    if (isset($_POST['Submit'])) {
        include_once("paybase.php");

        $ID_Participant = $_POST['ID_Participant'];
        $Nama = $_POST['Nama'];
        $Email = $_POST['Email'];
        $City = $_POST['City'];
        $Gender = $_POST['Gender'];

        $result = mysqli_query($conn, "INSERT INTO participant (ID_Participant, Nama, Email, City, Gender)
        VALUES ('$ID_Participant', '$Nama', '$Email', '$City', '$Gender')");

    }
    ?>