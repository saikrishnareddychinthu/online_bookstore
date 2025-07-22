<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle Delete Request
if (isset($_GET['delete'])) {
    $bookId = $_GET['delete'];
    $deleteSql = "DELETE FROM books WHERE id = $bookId";
    mysqli_query($conn, $deleteSql);
    echo "<p style='color:green;'>Book ID $bookId deleted successfully!</p>";
}

// Fetch Books
$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Books - Admin</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: #fff; border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #333; color: #fff; }
        a { text-decoration: none; color: red; }
    </style>
</head>
<body>

<h2>Manage Books</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <?php while($book = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $book['id']; ?></td>
        <td><?php echo $book['title']; ?></td>
        <td><?php echo $book['author']; ?></td>
        <td>₹<?php echo $book['price']; ?></td>
        <td><img src="images/<?php echo $book['image']; ?>" width="50"></td>
        <td><a href="admin_manage.php?delete=<?php echo $book['id']; ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a></td>
    </tr>
    <?php } ?>

</table>

<br>
<a href="admin_dashboard.php">Back to Dashboard</a>

<hr>
<p style="text-align:center; color:gray;">Created & Developed by Sai Krishna Reddy</p>

</body>
</html>

<?php
mysqli_close($conn);
?>
