<!DOCTYPE html>
<html>
<body>

    <?php
        $blood_group = "";

        if(isset($_REQUEST['blood_group'])){

            $blood_group = $_REQUEST['blood_group'];

            if($blood_group == ""){
                echo "Please Select Blood Group!";
            }else{
                echo "Blood Group: " . $blood_group;
            }
        }
    ?>

    <fieldset style="width: 250px;">
        <legend>BLOOD GROUP</legend>

        <form action="" method="post">

            <select id="bg" name="blood_group" required>

                <option value="">Select Blood Group</option>

                <option value="A+" <?php if($blood_group=="A+") echo "selected"; ?>>A+</option>

                <option value="A-" <?php if($blood_group=="A-") echo "selected"; ?>>A-</option>

                <option value="B+" <?php if($blood_group=="B+") echo "selected"; ?>>B+</option>

                <option value="B-" <?php if($blood_group=="B-") echo "selected"; ?>>B-</option>

                <option value="O+" <?php if($blood_group=="O+") echo "selected"; ?>>O+</option>

                <option value="O-" <?php if($blood_group=="O-") echo "selected"; ?>>O-</option>

                <option value="AB+" <?php if($blood_group=="AB+") echo "selected"; ?>>AB+</option>

                <option value="AB-" <?php if($blood_group=="AB-") echo "selected"; ?>>AB-</option>

            </select>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>