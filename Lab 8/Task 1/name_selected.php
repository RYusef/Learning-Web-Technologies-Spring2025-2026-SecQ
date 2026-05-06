<!DOCTYPE html>
<html>
<body> 

    <?php
        $name = "";

        if(isset($_REQUEST['name'])){
            $name = $_REQUEST['name'];

            if($name == ""){
                echo "Please Enter Name!";
            }else{
                echo "Name: " . $name;
            }
        }
    ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <fieldset style="width: 250px;">
        <legend>NAME</legend>

            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

</body>
</html>