<?php
session_start();
if (isset($_POST['username'])) {
    if ($_POST['username']=='admin' && $_POST['password']=='admin123') {
        $_SESSION['admin']=true;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>

<form method="POST">
    <h2>Admin Login</h2>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
