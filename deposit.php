<!DOCTYPE html>
<html>
<head>
    <title>Deposit Money</title>
</head>
<body>

<h2>Deposit Money</h2>

<form method="post">
    Account ID: <input type="number" name="account_id" required><br><br>
    Amount: <input type="number" name="amount" required><br><br>
    <input type="submit" name="submit" value="Deposit">
</form>

</body>
</html>

<?php
include "db_connect.php";

if (isset($_POST['submit'])) {
    $account_id = $_POST['account_id'];
    $amount = $_POST['amount'];

    // Update balance
    $sql1 = "UPDATE account SET balance = balance + $amount WHERE account_id = $account_id";

    // Insert transaction
    $sql2 = "INSERT INTO transaction (account_id, type, amount, date) 
             VALUES ($account_id, 'Deposit', $amount, CURDATE())";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "Deposit successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>