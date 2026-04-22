<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: home.php');
    }

    $id = $_GET['id'];
    $user = array();

    foreach($_SESSION['users'] as $u){
        if($u['id'] == $id){
            $user = $u;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>

    <a href="user_list.php">Back to Users</a> |
    <a href="home.php">Home</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <?php
        if(isset($_GET['error'])){
            echo "<p>" . $_GET['error'] . "</p>";
        }
    ?>

    <form method="post" action="../controller/user_update.php">
        <fieldset>
            <legend>Edit User</legend>
            ID:       <input type="text" name="id" value="<?php echo $user['id']; ?>" readonly> <br>
            Username: <input type="text" name="username" value="<?php echo $user['username']; ?>"> <br>
            Email:    <input type="text" name="email" value="<?php echo $user['email']; ?>"> <br>
            New Password (leave blank to keep): <input type="password" name="password" value=""> <br>
            Role:
            <select name="role">
                <?php if($user['role'] == 'user'){ ?>
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                <?php } else { ?>
                    <option value="user">User</option>
                    <option value="admin" selected>Admin</option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" name="submit" value="Update User">
        </fieldset>
    </form>
</body>
</html>
