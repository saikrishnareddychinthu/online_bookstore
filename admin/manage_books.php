<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); }

$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (isset($_GET['delete'])) {
    mysqli_query($conn, "DELETE FROM books WHERE id=".$_GET['delete']);
    echo "Book Deleted!";
}

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<h2>Manage Books</h2>
<table border="1">
<tr><th>ID</th><th>Title</th><th>Action</th></tr>

<?php while($b=mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $b['id']; ?></td>
    <td><?php echo $b['title']; ?></td>
    <td><a href="?delete=<?php echo $b['id']; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php">Back</a>
