<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Details - Online Bookstore</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 80%; border-collapse: collapse; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #f2f2f2; }
        img { width: 80px; height: 120px; object-fit: cover; }
        a { text-decoration: none; color: #333; }
    </style>
</head>
<body>

<h2 style="text-align:center;">All Book Details</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Cover</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price (₹)</th>
        <th>Description</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>"></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['description']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
