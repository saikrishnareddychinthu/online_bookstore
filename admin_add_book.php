<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); }

$conn = mysqli_connect("localhost", "root", "", "online_bookstore");

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/".$img);

    mysqli_query($conn, "INSERT INTO books (title, author, price, image, description) VALUES ('$title','$author','$price','$img','$desc')");
    echo "Book Added Successfully!";
}
?>

<h2>Add Book</h2>
<form method="POST" enctype="multipart/form-data">
    Title: <input name="title"><br>
    Author: <input name="author"><br>
    Price: <input name="price"><br>
    Image: <input type="file" name="image"><br>
    Description:<br><textarea name="description"></textarea><br>
    <input type="submit" value="Add Book">
</form>
<footer style="text-align:center; margin-top:30px; color:#555;">
    &copy; 2025 Created & Developed by Sai Krishna Reddy
</footer>

