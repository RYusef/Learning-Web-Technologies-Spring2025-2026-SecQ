<!DOCTYPE html>
<html>
<body>

    <?php
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

            <input type="checkbox" name="degree[]" value="SSC">
            <label for="ssc">SSC</label><br>

            <input type="checkbox" name="degree[]" value="HSC">
            <label for="hsc">HSC</label><br>

            <input type="checkbox" name="degree[]" value="BSc">
            <label for="bsc">BSc</label><br>

            <hr>
            <input type="submit" value="Submit">
        </form>
    </fieldset>

</body>
</html>