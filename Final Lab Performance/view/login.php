<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Admin Login</h2>

<form method="post" action="../controller/authController.php">
    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" name="login" value="Login">
</form>

</body>
</html>