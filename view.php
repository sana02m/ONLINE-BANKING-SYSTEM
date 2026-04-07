<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Data</title>
</head>
<body>

<h2>Customers</h2>
<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM customer");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['customer_id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No data found</td></tr>";
}
?>
</table>

<br><br>

<h2>Accounts</h2>
<table border="1">
<tr>
    <th>Account ID</th>
    <th>Customer ID</th>
    <th>Type</th>
    <th>Balance</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM account");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['account_id']."</td>
                <td>".$row['customer_id']."</td>
                <td>".$row['account_type']."</td>
                <td>".$row['balance']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No data found</td></tr>";
}
?>
</table>

<br><br>

<h2>Transactions</h2>
<table border="1">
<tr>
    <th>ID</th>
    <th>Account ID</th>
    <th>Type</th>
    <th>Amount</th>
    <th>Date</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM transaction");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['transaction_id']."</td>
                <td>".$row['account_id']."</td>
                <td>".$row['type']."</td>
                <td>".$row['amount']."</td>
                <td>".$row['date']."</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}
?>
</table>

</body>
</html>