<!DOCTYPE html>
<html>
<body>

    <?php
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
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>

            </select>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>