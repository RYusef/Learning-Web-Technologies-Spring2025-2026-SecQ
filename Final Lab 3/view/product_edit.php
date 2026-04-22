<?php
    include('../asset/data.php');

    if(!isset($_COOKIE['status'])){
        header('location: login.php');
    }

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: home.php');
    }

    $id = $_GET['id'];
    $product = array();

    foreach($_SESSION['products'] as $p){
        if($p['id'] == $id){
            $product = $p;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <a href="product_list.php">Back to Products</a> |
    <a href="home.php">Home</a> |
    <a href="../controller/logout.php">Logout</a>

    <br><br>

    <?php
        if(isset($_GET['error'])){
            echo "<p>" . $_GET['error'] . "</p>";
        }
    ?>

    <form method="post" action="../controller/product_update.php">
        <fieldset>
            <legend>Edit Product</legend>
            ID:       <input type="text" name="id" value="<?php echo $product['id']; ?>" readonly> <br>
            Name:     <input type="text" name="name" value="<?php echo $product['name']; ?>"> <br>
            Category: <input type="text" name="category" value="<?php echo $product['category']; ?>"> <br>
            Price:    <input type="text" name="price" value="<?php echo $product['price']; ?>"> <br>
            Stock:    <input type="text" name="stock" value="<?php echo $product['stock']; ?>"> <br>
            <input type="submit" name="submit" value="Update Product">
        </fieldset>
    </form>
</body>
</html>
