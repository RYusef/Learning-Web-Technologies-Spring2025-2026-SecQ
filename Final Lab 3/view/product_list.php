<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }

    $products = $_SESSION['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>

    <a href="home.php">Home</a> |

    <?php if($_SESSION['auth_user']['role'] == 'admin'){ ?>
        <a href="product_add.php">Add Product</a> |
        <a href="user_list.php">Manage Users</a> |
    <?php } ?>

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
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <?php if($_SESSION['auth_user']['role'] == 'admin'){ ?>
                <th>Action</th>
            <?php } ?>
        </tr>

        <?php foreach($products as $product){ ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['category']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['stock']; ?></td>
            <?php if($_SESSION['auth_user']['role'] == 'admin'){ ?>
            <td>
                <a href="product_edit.php?id=<?php echo $product['id']; ?>">EDIT</a> |
                <a href="../controller/product_delete.php?id=<?php echo $product['id']; ?>">DELETE</a>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
