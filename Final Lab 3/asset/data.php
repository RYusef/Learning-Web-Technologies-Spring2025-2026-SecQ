<?php
    session_start();

    if(!isset($_SESSION['users'])){
        $_SESSION['users'] = array(
            array('id'=>1, 'username'=>'admin',  'password'=>'admin123', 'email'=>'admin@shop.com',  'role'=>'admin'),
            array('id'=>2, 'username'=>'user1',  'password'=>'user123',  'email'=>'user1@shop.com',  'role'=>'user'),
            array('id'=>3, 'username'=>'user2',  'password'=>'user123',  'email'=>'user2@shop.com',  'role'=>'user')
        );
    }

    if(!isset($_SESSION['products'])){
        $_SESSION['products'] = array(
            array('id'=>1, 'name'=>'Laptop',   'category'=>'Electronics', 'price'=>75000, 'stock'=>10),
            array('id'=>2, 'name'=>'Mouse',    'category'=>'Electronics', 'price'=>850,   'stock'=>50),
            array('id'=>3, 'name'=>'Keyboard', 'category'=>'Electronics', 'price'=>1200,  'stock'=>30),
            array('id'=>4, 'name'=>'Monitor',  'category'=>'Electronics', 'price'=>22000, 'stock'=>15),
            array('id'=>5, 'name'=>'USB Hub',  'category'=>'Accessories', 'price'=>650,   'stock'=>40)
        );
    }
?>
