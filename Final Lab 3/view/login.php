<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php
        if(isset($_GET['error'])){
            echo "<p>" . $_GET['error'] . "</p>";
        }
        if(isset($_GET['msg'])){
            echo "<p>" . $_GET['msg'] . "</p>";
        }
    ?>

    <form method="post" action="../controller/loginCheck.php">
        <fieldset>
            <legend>Sign In</legend>
            Username: <input type="text" name="username" value=""> <br>
            Password: <input type="password" name="password" value=""> <br>
            Role:
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Login">
        </fieldset>
    </form>
    <br>
    <a href="register.php">No account? Register here</a>
</body>
</html>
