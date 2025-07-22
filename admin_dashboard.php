<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<h2>Admin Dashboard</h2>
<a href="admin_add_book.php">Add Book</a> | 
<a href="http://localhost/online_bookstore/admin_manage.php
">Manage Books</a> | 
<a href="admin_logout.php">Logout</a>
<footer style="text-align:center; margin-top:30px; color:#555;">
    &copy; 2025 Created & Developed by Sai Krishna Reddy
</footer>
