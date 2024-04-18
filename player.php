<?php
// Create database connection using config file
include_once("database.php");

// Fetch all users data from database and student table
$result = mysqli_query($conn, "SELECT * FROM participant");
?>

<html>
    <head>
        <title>Homepage</title>
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <!-- This is a link for Add Page -->
        <a href="index.php">Add New Participant</a><br/><br/>
        <table border=1>
            <tr>
            <th>ID_Participant</th>
            <th>Nama</th>
            <th>Email</th>
            <th>City</th>
            <th>Gender</th>
            <th>Action</th>
            </tr>
            
        <?php
        while($Participant = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$Participant['ID_Participant']."</td>";
            echo "<td>".$Participant['Nama']."</td>";
            echo "<td>".$Participant['Email']."</td>";
            echo "<td>".$Participant['City']."</td>";
            echo "<td>".$Participant['Gender']."</td>";
            echo "<td><a href='edit.php?ID_Participant=$Participant[ID_Participant]'>Edit</a> | <a href='delete.php?ID_Participant=$Participant[ID_Participant]'>Delete</a></td></tr>";
        }
        ?>
        </table>
    </body>
</html>