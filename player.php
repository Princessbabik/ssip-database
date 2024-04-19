<?php
include_once("database.php");

// Perform a SQL join between Participants and Participant_Payments tables
$query = "SELECT Participant.ID_Participant, Participant.Name, Participant.Email, Participant.City, Participant.Gender, 
                 Participant_Payments.Payment_Method, Participant_Payments.Payment_Date
          FROM Participant
          LEFT JOIN Participant_Payments ON Participant.ID_Participant = Participant_Payments.ID_Participant";
$result = mysqli_query($conn, $query);
?>

<html>
    <head>
        <title>Participant Information</title>
        <link href="style.css" rel="stylesheet">
        <style>
            .table-container {
                background-color: rgba(255, 255, 255, 0.514);
                border-radius: 25px;
                padding: 30px;
                margin-top: 50px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
                max-width: 900px;
                margin: auto;
            }
        </style>
    </head>

    <body>
        <a href="index.php">Add New Participant</a><br/><br/>
        <div class="table-container">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Payment Method</th>
                    <th>Payment Date</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['ID_Participant']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['City']."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    echo "<td>".$row['Payment_Method']."</td>";
                    echo "<td>".$row['Payment_Date']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
