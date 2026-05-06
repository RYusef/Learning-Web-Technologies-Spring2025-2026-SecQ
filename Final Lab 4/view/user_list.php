<?php
require_once('../model/userModel.php');

if(!isset($_COOKIE['status'])){
    header('location: login.php');
}

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>

    <a href="home.php">Back</a> |

    <?php if($_COOKIE['role'] == 'admin'){ ?>
        <a href="add.php">Add User</a> |
    <?php } ?>

    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php foreach($users as $user){ ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="detail.php?id=<?= $user['id'] ?>">DETAILS</a>

                <?php if($_COOKIE['role'] == 'admin' && $user['role'] != 'admin'){ ?>
                    | <a href="edit.php?id=<?= $user['id'] ?>">EDIT</a>
                    | <a href="../controller/delete.php?id=<?= $user['id'] ?>">DELETE</a>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>