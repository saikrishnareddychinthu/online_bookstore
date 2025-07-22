<?php
session_start();

// Connect to DB
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

// Add to Cart
if (isset($_GET['add'])) {
    $book_id = $_GET['add'];

    $sql = "SELECT * FROM books WHERE id=$book_id";
    $result = mysqli_query($conn, $sql);
    $book = mysqli_fetch_assoc($result);

    if (!$book) {
        die("Book not found.");
    }

    // Add to Session Cart
    if (isset($_SESSION['cart'][$book_id])) {
        $_SESSION['cart'][$book_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$book_id] = [
            "title" => $book['title'],
            "price" => $book['price'],
            "quantity" => 1
        ];
    }

    header("Location: cart.php");
    exit();
}

// Remove from Cart
if (isset($_GET['remove'])) {
    $book_id = $_GET['remove'];
    unset($_SESSION['cart'][$book_id]);
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .cart-item { background: #fff; padding: 10px; margin: 10px; border-radius: 5px; }
        .remove-btn { background: #dc3545; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>

<h1>Your Cart</h1>

<?php
$total = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $item) {
        echo '<div class="cart-item">';
        echo '<h3>' . $item['title'] . '</h3>';
        echo '<p>Quantity: ' . $item['quantity'] . '</p>';
        echo '<p>Price: ₹' . $item['price'] . '</p>';
        echo '<p>Subtotal: ₹' . ($item['price'] * $item['quantity']) . '</p>';
        echo '<a href="cart.php?remove=' . $id . '" class="remove-btn">Remove</a>';
        echo '</div>';
        $total += $item['price'] * $item['quantity'];
    }
    echo '<h3>Total: ₹' . $total . '</h3>';
    echo '<a href="checkout.php">Proceed to Checkout</a>';
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

<br><br>
<a href="index.php">Back to Shop</a>

</body>
</html>
