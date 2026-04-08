<?php 
    $blood_group = $_REQUEST['blood_group'];

    if($blood_group == ""){
        echo "Please Select Blood Group!";
    }else {
        echo "Blood Group: " . $blood_group;
    }

?>