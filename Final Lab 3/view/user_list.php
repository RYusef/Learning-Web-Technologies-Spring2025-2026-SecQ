<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: home.php');
    }

    $users = $_SESSION['users'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>

    <a href="home.php">Home</a> |
    <a href="product_list.php">Products</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <?php
        if(isset($_GET['msg'])){
            echo "<p>" . $_GET['msg'] . "</p>";
        }
    ?>

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php foreach($users as $user){ ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td>
                <a href="user_edit.php?id=<?php echo $user['id']; ?>">EDIT</a> |
                <?php if($user['id'] != $_SESSION['auth_user']['id']){ ?>
                    <a href="../controller/user_delete.php?id=<?php echo $user['id']; ?>">DELETE</a>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
