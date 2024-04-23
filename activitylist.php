<?php
include_once("database.php");

// Perform a SQL join between activitiess and activities_Payments tables
$query = "SELECT activities.ID_Committee, activities.Activity_Name, activities.Activity_Date, activities.Location
          FROM login
          LEFT JOIN activities ON login.ID_Committee = activities.ID_Committee";
$result = mysqli_query($conn, $query);
?>

<html>
    <head>
        <title>activities Information</title>
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
    <button onclick="window.location.href='choose.php'" class="btn btn-primary btn-block">back</button><br/><br/>
        <div class="table-container">
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Activity_Name</th>
                    <th>Activity_Date</th>
                    <th>Location</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['ID_Committee']."</td>";
                    echo "<td>".$row['Activity_Name']."</td>";
                    echo "<td>".$row['Activity_Date']."</td>";
                    echo "<td>".$row['Location']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
