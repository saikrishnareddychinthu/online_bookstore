<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); }
?>

<h2>Admin Dashboard</h2>
<a href="add_book.php">Add Book</a> | 
<a href="manage_books.php">Manage Books</a> |
<a href="logout.php">Logout</a>
