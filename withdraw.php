<!DOCTYPE html>
<html>
<head>
    <title>Withdraw Money</title>
</head>
<body>

<h2>Withdraw Money</h2>

<form method="post">
    Account ID: <input type="number" name="account_id" required><br><br>
    Amount: <input type="number" name="amount" required><br><br>
    <input type="submit" name="submit" value="Withdraw">
</form>

</body>
</html>

<?php
include "db_connect.php";

if (isset($_POST['submit'])) {
    $account_id = $_POST['account_id'];
    $amount = $_POST['amount'];

    // Check current balance
    $result = $conn->query("SELECT balance FROM account WHERE account_id = $account_id");
    $row = $result->fetch_assoc();
    $balance = $row['balance'];

    if ($balance >= $amount) {

        // Deduct balance
        $sql1 = "UPDATE account SET balance = balance - $amount WHERE account_id = $account_id";

        // Insert transaction
        $sql2 = "INSERT INTO transaction (account_id, type, amount, date) 
                 VALUES ($account_id, 'Withdraw', $amount, CURDATE())";

        if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
            echo "Withdrawal successful!";
        } else {
            echo "Error: " . $conn->error;
        }

    } else {
        echo "Insufficient balance!";
    }
}
?>