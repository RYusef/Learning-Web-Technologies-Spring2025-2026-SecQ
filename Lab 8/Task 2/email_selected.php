<!DOCTYPE html>
<html>
<body>

    <?php
        $email = "";

        if(isset($_REQUEST['email'])){
            $email = $_REQUEST['email'];

            if($email == ""){
                echo "Please Enter Email!";
            }else{
                echo "Email: " . $email;
            }
        }
    ?>

    <fieldset style="width: 250px;">
        <legend>EMAIL</legend>

        <form action="" method="post">

            <input type="email" id="email" name="email"
            value="<?php echo $email; ?>" required>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>