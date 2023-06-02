<?php
include 'dataconnection.php';
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
}
?>

<html>
<head>
    <title>Receipt Generator</title>
</head>
<body>
Select receipt:
<form method='get' action='receipt-db.php'>
    <select name='checkoutID'>
        <?php
        $query ="SELECT orders.*, orders.order_status, orders.product_price, orders.user_quantity
        FROM orders
        INNER JOIN checkout ON orders.order_id = checkout.order_id 
        WHERE orders.order_id =checkout.order_id and orders.username = '$username' ";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['order_id'] . "'>" . $row['order_id'] . "</option>";
            }
        } else {
            echo "<option value=''>No receipts found</option>";
        }
        ?>
    </select>
    <input type='submit' value='Generate'>
</form>
</body>
</html>
