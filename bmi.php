<?php include 'header.php';?>


<div class="wrapper">
        <h2>Check Your BMI</h2>
        <form action="" method="post">
            <div class="section1">
                <span>Enter your height : </span>
                <input type="text" name="height" autocomplete="off" placeholder="Height in meteres">
            </div>
            <div class="section2">
                <span>Enter your weight : </span>
                <input type="text" name="height" autocomplete="off" placeholder="Weight in kilograms">
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Check">
                <input type="reset" value="Reset">
            </div>
        </form>

<?php include 'footer.php';?>