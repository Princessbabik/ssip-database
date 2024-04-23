<?php
include_once("database.php");

// Perform a SQL join between Sponsor and login tables
$query = "SELECT Sponsor.Sponsor_ID, Sponsor.Sponsor_Brand, Sponsor.Contact_Person, login.ID_Committee
          FROM login
          LEFT JOIN Sponsor ON login.ID_Committee = Sponsor.ID_Committee";
$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <title>Sponsor Information</title>
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
    <button onclick="window.location.href='add_sponsor.php'" class="btn btn-primary btn-block">Back</button><br/><br/>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>Sponsor ID</th>
                <th>Sponsor Brand</th>
                <th>Contact Person</th>
                <th>ID Committee</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['Sponsor_ID']."</td>";
                echo "<td>".$row['Sponsor_Brand']."</td>";
                echo "<td>".$row['Contact_Person']."</td>";
                echo "<td>".$row['ID_Committee']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
