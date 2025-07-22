<?php
session_start();

if (isset($_POST['username'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin123") {
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid Admin Login!";
    }
}
?>

<h2>Admin Login</h2>
<form method="POST">
    Username: <input name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
<footer style="text-align:center; margin-top:30px; color:#555;">
    &copy; 2025 Created & Developed by Sai Krishna Reddy
</footer>

