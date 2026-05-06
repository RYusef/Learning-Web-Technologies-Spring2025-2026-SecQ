<!DOCTYPE html>
<html>
<body>

    <?php
        $degrees = array();

        if(isset($_REQUEST['degree'])){

            $degrees = $_REQUEST['degree'];

            foreach($degrees as $degree){
                echo $degree . "<br>";
            }

        }else{
            echo "Please Select Degree!";
        }
    ?>

    <fieldset style="width: 250px;">
        <legend>DEGREE</legend>

        <form action="" method="post">

            <input type="checkbox" name="degree[]" value="SSC"
            <?php if(in_array("SSC", $degrees)) echo "checked"; ?>>

            <label for="ssc">SSC</label><br>

            <input type="checkbox" name="degree[]" value="HSC"
            <?php if(in_array("HSC", $degrees)) echo "checked"; ?>>

            <label for="hsc">HSC</label><br>

            <input type="checkbox" name="degree[]" value="BSc"
            <?php if(in_array("BSc", $degrees)) echo "checked"; ?>>

            <label for="bsc">BSc</label><br>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>