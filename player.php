<?php
include_once("database.php");

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

        table {
            width: 100%;
            border-collapse: collapse;
        }
        </style>
    </head>

    <body>
    <button onclick="window.location.href='choose.php'" class="btn btn-primary btn-block">Back</button><br/><br/>
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
                    <th>Action</th>
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
                    echo "<td>
                    <a href='edit.php?ID_Participant=".$row['ID_Participant']."'>Edit</a> |
                    <a href='delete.php?ID_Participant=".$row['ID_Participant']."' onclick='return confirm(\"Are you sure you want to delete this participant?\")'>Delete</a>
                    </td>";
                    echo "</tr>";

                }
                ?>
            </table>
        </div>
    </body>
</html>
