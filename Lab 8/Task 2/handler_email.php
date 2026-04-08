<?php
    $email = $_REQUEST['email'];

    if($email == ""){
        echo "Please Enter Email!";
    }else {
        echo "Email: " . $email;
    }

?>