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
                    <form action="player.php" method="post" name="payment_form">
                        <table class="form-table">
                            <tr>
                                <td>ID Payment</td>
                                <td><input type="text" name="ID_Payment" value="<?php echo isset($_GET['ID_Payment']) ? $_GET['ID_Payment'] : ''; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>ID Participant</td>
                                <td><input type="text" name="ID_Participant" value="<?php echo isset($_GET['ID_Participant']) ? $_GET['ID_Participant'] : ''; ?>" readonly></td>
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

    <?php
    if (isset($_POST['Submit'])) {
        include_once("paybase.php");

        $ID_Payment = $_POST['ID_Payment'];
        $ID_Participant = $_POST['ID_Participant'];
        $Payment_Method = $_POST['Payment_Method'];
        $Payment_Date = $_POST['Payment_Date'];

        $result = mysqli_query($conn, "INSERT INTO participant_payments (ID_Payment, ID_Participant, Payment_Method, Payment_Date)
        VALUES ('$ID_Payment', '$ID_Participant', '$Payment_Method', '$Payment_Date')");

    }
    ?>

</body>
</html>