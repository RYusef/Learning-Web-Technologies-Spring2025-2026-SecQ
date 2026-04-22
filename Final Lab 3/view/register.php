<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <?php
        if(isset($_GET['error'])){
            echo "<p>" . $_GET['error'] . "</p>";
        }
    ?>

    <form method="post" action="../controller/register.php">
        <fieldset>
            <legend>Create Account</legend>
            Username: <input type="text" name="username" value=""> <br>
            Email:    <input type="text" name="email" value=""> <br>
            Password: <input type="password" name="password" value=""> <br>
            Confirm Password: <input type="password" name="confirm_password" value=""> <br>
            Role:
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Register">
        </fieldset>
    </form>
    <br>
    <a href="login.php">Already have an account? Login here</a>
</body>
</html>
