<?php
    include('../asset/data.php');

    if($_SESSION['auth_user']['role'] != 'admin'){
        header('location: ../view/home.php');
    }

    if(isset($_REQUEST['submit'])){
        $id       = $_REQUEST['id'];
        $name     = $_REQUEST['name'];
        $category = $_REQUEST['category'];
        $price    = $_REQUEST['price'];
        $stock    = $_REQUEST['stock'];

        if($name == "" || $category == "" || $price == "" || $stock == ""){
            header('location: ../view/product_edit.php?id=' . $id . '&error=All fields are required');
        } else {
            foreach($_SESSION['products'] as $key => $product){
                if($product['id'] == $id){
                    $_SESSION['products'][$key]['name']     = $name;
                    $_SESSION['products'][$key]['category'] = $category;
                    $_SESSION['products'][$key]['price']    = $price;
                    $_SESSION['products'][$key]['stock']    = $stock;
                }
            }

            header('location: ../view/product_list.php?msg=Product updated successfully');
        }
    } else {
        header('location: ../view/product_list.php');
    }
?>
