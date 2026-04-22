<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    <a href="product_list.php">Back to Products</a> |
    <a href="home.php">Home</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <?php
        if(isset($_GET['error'])){
            echo "<p>" . $_GET['error'] . "</p>";
        }
    ?>

    <form method="post" action="../controller/product_add.php">
        <fieldset>
            <legend>Product Details</legend>
            Name:     <input type="text" name="name" value=""> <br>
            Category: <input type="text" name="category" value=""> <br>
            Price:    <input type="text" name="price" value=""> <br>
            Stock:    <input type="text" name="stock" value=""> <br>
            <input type="submit" name="submit" value="Add Product">
        </fieldset>
    </form>
</body>
</html>
