<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get book ID from URL
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM books WHERE id = $id";
$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $book['title']; ?> - Details</title>
    <style>
        body { font-family: Arial; }
        .container { width: 400px; margin: 50px auto; }
        img { width: 200px; height: 300px; object-fit: cover; }
        .back { text-decoration: none; color: #555; margin-top: 10px; display: inline-block; }
    </style>
</head>
<body>

<div class="container">
    <h2><?php echo $book['title']; ?></h2>
    <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
    <img src="images/<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">
    <p><strong>Price:</strong> ₹<?php echo $book['price']; ?></p>
    <p><strong>Description:</strong> <?php echo $book['description']; ?></p>

    <a href="cart.php?add=<?php echo $book['id']; ?>">Add to Cart</a> |
    <a class="back" href="index.php">← Back to Book List</a>
</div>
<footer style="text-align:center; margin-top:30px; color:#555;">
    &copy; 2025 Created & Developed by Sai Krishna Reddy
</footer>


</body>
</html>
