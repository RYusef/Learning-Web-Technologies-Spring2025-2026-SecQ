<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h1>Registration</h1>

    <form method="post" action="../controller/registerCheck.php">
        Username:
        <input type="text" name="username"> <br>

        Email:
        <input type="text" name="email"> <br>

        Password:
        <input type="password" name="password"> <br>

        Role:
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select> <br>

        <input type="submit" name="submit" value="Register">
    </form>

    <br>
    <a href="login.php">Login</a>
</body>
</html>