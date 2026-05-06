<!DOCTYPE html>
<html>
<body>

    <?php
        $dob = "";

        if(isset($_REQUEST['dob'])){
            $dob = $_REQUEST['dob'];

            if($dob == ""){
                echo "Please Enter Date of Birth!";
            }else{
                echo "Date of Birth: " . $dob;
            }
        }
    ?>

    <fieldset style="width: 250px;">
        <legend>DATE OF BIRTH</legend>

        <form action="" method="post">

            <input type="date" id="dob" name="dob"
            value="<?php echo $dob; ?>" required>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>