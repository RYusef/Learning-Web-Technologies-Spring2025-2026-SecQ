<?php
    include('../asset/data.php');

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: ../view/home.php');
    }

    $id = $_GET['id'];
    $newProducts = array();

    foreach($_SESSION['products'] as $product){
        if($product['id'] != $id){
            $newProducts[] = $product;
        }
    }

    $_SESSION['products'] = $newProducts;
    header('location: ../view/product_list.php?msg=Product deleted successfully');
?>
