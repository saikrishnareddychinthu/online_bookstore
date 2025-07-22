<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Bookstore</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .book { background: #fff; padding: 10px; margin: 10px; border-radius: 5px; box-shadow: 1px 1px 5px rgba(0,0,0,0.1);}
        .book img { width: 100px; }
        .book h3 { margin: 0; }
        .cart-btn { background: #28a745; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>

<h1>Welcome to Online Bookstore</h1>
<a href="http://localhost/online_bookstore/admin_login.php">Admin Login</a>


<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Fetch books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($book = mysqli_fetch_assoc($result)) {
       echo '<div class="book">';
    echo '<img src="images/' . $book['image'] . '" alt="' . $book['title'] . '" width="150" height="200">';
    echo '<h3>' . $book['title'] . '</h3>';
    echo '<p>Author: ' . $book['author'] . '</p>';
    echo '<p>Price: ₹' . $book['price'] . '</p>';
    echo '<a href="cart.php?add=' . $book['id'] . '" class="cart-btn">Add to Cart</a>';
    echo '</div>';
    }

} else {
    echo "<p>No books available.</p>";
}

mysqli_close($conn);
?>
<footer style="text-align:center; margin-top:30px; color:#555;">
    &copy; 2025 Created & Developed by Sai Krishna Reddy
</footer>



</body>
</html>
