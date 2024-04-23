<?php
include_once("database.php");

$query = "SELECT ID_Committee, Full_Name, Contact_Number, Role FROM comlist";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Committee List</title>
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

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <button onclick="window.location.href='choose.php'" class="btn btn-primary btn-block">Back</button><br/><br/>

    <div class="table-container">
        <table>
            <tr>
                <th>ID Committee</th>
                <th>Full Name</th>
                <th>Contact Number</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
            // Output the results
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID_Committee'] . "</td>";
                echo "<td>" . $row['Full_Name'] . "</td>";
                echo "<td>" . $row['Contact_Number'] . "</td>";
                echo "<td>" . $row['Role'] . "</td>";
                echo "<td>
                    <a href='edit_comlist.php?ID_Committee=" . $row['ID_Committee'] . "'>Edit</a> |
                    <a href='delete_comlist.php?ID_Committee=" . $row['ID_Committee'] . "' onclick='return confirm(\"Are you sure you want to delete this committee profile?\")'>Delete</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>