<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $items = json_encode($_SESSION['cart']);
    mysqli_query($conn, "INSERT INTO orders (customer_name, items) VALUES ('$name', '$items')");
    unset($_SESSION['cart']);
    echo "Order placed! <a href='index.php'>Shop More</a>";
    exit();
}
?>

<h2>Checkout</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    <input type="submit" value="Place Order">
</form>
