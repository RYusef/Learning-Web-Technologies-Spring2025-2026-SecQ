<!DOCTYPE html>
<html>
<body>

    <?php
        if(isset($_REQUEST['gender'])){
            $gender = $_REQUEST['gender'];

            if($gender == ""){
                echo "Please Select Gender!";
            }else{
                echo "Gender: " . $gender;
            }
        }
    ?>

    <fieldset style="width: 250px;">
        <legend>GENDER</legend>

        <form action="" method="post">

            <input type="radio" name="gender" id="m" value="Male">
            <label for="m">Male</label>

            <input type="radio" name="gender" id="f" value="Female">
            <label for="f">Female</label>

            <input type="radio" name="gender" id="o" value="Other">
            <label for="o">Other</label>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>