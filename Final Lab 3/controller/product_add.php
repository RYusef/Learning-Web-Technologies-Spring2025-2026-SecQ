<?php
    include('../asset/data.php');

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: ../view/home.php');
    }

    if(isset($_REQUEST['submit'])){
        $name     = $_REQUEST['name'];
        $category = $_REQUEST['category'];
        $price    = $_REQUEST['price'];
        $stock    = $_REQUEST['stock'];

        if($name == "" || $category == "" || $price == "" || $stock == ""){
            header('location: ../view/product_add.php?error=All fields are required');
        } else {
            $maxId = 0;
            foreach($_SESSION['products'] as $product){
                if($product['id'] > $maxId){
                    $maxId = $product['id'];
                }
            }

            $newProduct = array(
                'id'       => $maxId + 1,
                'name'     => $name,
                'category' => $category,
                'price'    => $price,
                'stock'    => $stock
            );

            $_SESSION['products'][] = $newProduct;
            header('location: ../view/product_list.php?msg=Product added successfully');
        }
    } else {
        header('location: ../view/product_add.php');
    }
?>
