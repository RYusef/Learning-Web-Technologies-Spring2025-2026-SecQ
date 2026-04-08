<?php 
    $gender = $_REQUEST['gender'];

    if($gender == ""){
        echo "Please Select Gender!";
    }else {
        echo "Gender: " . $gender;
    }

?>