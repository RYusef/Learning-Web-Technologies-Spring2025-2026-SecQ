<?php 
    $name = $_REQUEST['name'];

    if($name == ""){
        echo "Please Enter Name!";
    }else {
        echo "Name: " . $name;
    }

?>