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
        <style>
            .table-container {
                background-color: rgba(255, 255, 255, 0.514);
                border-radius: 25px;
                padding: 30px;
                margin-top: 50px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                max-width: 700px;
                margin: auto;
            }
        </style>
    </head>

    <body>
        <!-- This is a link for Add Page -->
        <a href="index.php">Add New Participant</a><br/><br/>
        <div class= table-container>
        <table border=1>
            <tr>
            <th>ID_Participant</th>
            <th>Nama</th>
            <th>Email</th>
            <th>City</th>
            <th>Gender</th>
            <th>Action</th>
            </tr>
        </div>
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