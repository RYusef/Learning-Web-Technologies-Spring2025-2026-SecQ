<?php 
    $dob = $_REQUEST['dob'];

    if($dob == ""){
        echo "Please Enter Date of Birth!";
    }else {
        echo "Date of Birth: " . $dob;
    }

?>