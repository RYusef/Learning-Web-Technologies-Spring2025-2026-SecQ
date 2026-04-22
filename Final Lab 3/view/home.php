<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['auth_user']['username']; ?>!</h1>
    <p>Role: <?php echo $_SESSION['auth_user']['role']; ?></p>

    <a href="product_list.php">Products</a> |

    <?php if($_SESSION['auth_user']['role'] == 'admin'){ ?>
        <a href="user_list.php">Manage Users</a> |
        <a href="product_add.php">Add Product</a> |
    <?php } ?>

    <a href="../controller/logout.php">Logout</a>

    <hr>
    <h2>Dashboard</h2>
    <p>Total Products: <?php echo count($_SESSION['products']); ?></p>

    <?php if($_SESSION['auth_user']['role'] == 'admin'){ ?>
        <p>Total Users: <?php echo count($_SESSION['users']); ?></p>
    <?php } ?>
</body>
</html>
