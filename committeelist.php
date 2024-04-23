<?php
include_once("database.php");

// Perform a SQL join between Comlist and login tables
$query = "SELECT Comlist.Committee_ID, Comlist.Name, Comlist.Email, Comlist.City, Comlist.Role
          FROM login
          LEFT JOIN Comlist ON login.ID_Committee = Comlist.ID_Committee";
$result = mysqli_query($conn, $query);
?>

<html>
<head>
    <title>Comlist Information</title>
    <style>
        body {
            background-image: url('Aura.jpg'); 
            background-size: cover;
            background-repeat: repeat; 
        }
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
        .btn-primary {
            background-color: #cc8b8bb6;
            border-color: #cc8b8bb6;
            border-radius: 5px; 
            width: 5%;
            padding: 3px;
        }
        .btn-primary:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>
<button onclick="window.location.href='add_committee.php'" class="btn btn-primary btn-block">Back</button><br/><br/>
    <div class="table-container">
        <table border="1">
            <tr>
                <th>Committee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Role</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['Committee_ID']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['City']."</td>";
                echo "<td>".$row['Role']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
