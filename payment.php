<?php
include_once("database.php");

// Check if ID_Participant is provided in the URL
if (isset($_GET['ID_Participant'])) {
    $ID_Participant = $_GET['ID_Participant'];

    // Fetch participant details from Participants table based on ID_Participant
    $participant_query = "SELECT * FROM Participant WHERE ID_Participant = $ID_Participant";
    $participant_result = mysqli_query($conn, $participant_query);
    
    // Check if participant exists
    if (mysqli_num_rows($participant_result) > 0) {
        $participant = mysqli_fetch_assoc($participant_result);
    } else {
        // Participant not found, handle accordingly (redirect or display error message)
        echo "Participant not found!";
        exit;
    }
} else {
    // ID_Participant not provided in the URL, handle accordingly (redirect or display error message)
    echo "Participant ID not provided!";
    exit;
}

if (isset($_POST['Submit'])) {
    // Retrieve payment information from the form
    $Payment_Method = $_POST['Payment_Method'];
    $Payment_Date = $_POST['Payment_Date'];

    // Insert payment information into Participant_Payments table
    $sql = "INSERT INTO Participant_Payments (ID_Participant, Payment_Method, Payment_Date) 
            VALUES ('$ID_Participant', '$Payment_Method', '$Payment_Date')";
    
    if (mysqli_query($conn, $sql)) {
        // Payment successfully inserted
        echo "<script>alert('Payment submitted successfully.'); window.location.href = 'player.php';</script>";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Participant Payment Form</title>
    <link href="paystyle.css" rel="stylesheet">
</head>
<body>
    <button onclick="window.location.href='index.php'" class="btn btn-primary btn-block">Back</button>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="payment-container">
                    <h3 class="form-title">Participant Payment Form</h3>
                    <form action="payment.php?ID_Participant=<?php echo $ID_Participant; ?>" method="post" name="payment_form">
                        <table class="form-table">
                            <tr>
                                <td>ID Participant</td>
                                <td><input type="text" name="ID_Participant" value="<?php echo $participant['ID_Participant']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="Name" value="<?php echo $participant['Name']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="Email" value="<?php echo $participant['Email']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td><input type="text" name="City" value="<?php echo $participant['City']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><input type="text" name="Gender" value="<?php echo $participant['Gender']; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td><input type="text" name="Payment_Method"></td>
                            </tr>
                            <tr>
                                <td>Payment Date</td>
                                <td><input type="text" name="Payment_Date" placeholder="YYYY-MM-DD"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="Submit" value="Submit Payment" class="btn btn-primary btn-block"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
