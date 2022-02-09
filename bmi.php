<?php include 'header.php';?>

<?php

$errh = $errw = $errg = "";
$height = $weight = "";
$bmipass = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty($_POST['height'])) {
        $errh = "<span style ='color:#ed4337;
        font-size:17px; display:block'>Height is required</span>";
    } else {
        $height = validation($_POST['height']);
    }

    if (empty($_POST['weight'])) {
        $errw = "<span style ='color:#ed4337;
        font-size:17px; display:block'>Height is required</span>";
    } else {
        $weight = validation($_POST['weight']);
    }

    if(empty($_POST['height'] && $_POST['weight'])) {
        echo "";
    } else {
        $bmi = ($weight / ($height * $height));
        $bmipass = $bmi;
    }
}

function validation($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<h2>Check Your BMI</h2>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="section1">
        <span>Enter Your Height : </span>
        <input type="text" name="height" autocomplete="off" placeholder="Height in meteres">
        <?php echo $errh; ?>
    </div>

    <div class="section2">
        <span>Enter Your weight : </span>
        <input type="text" name="weight" autocomplete="off" placeholder="weight in kilograms">
        <?php echo $errw; ?>
    </div>

    <div class="submit">
        <input type="submit" name="submit" value="Check">
        <input type="reset" value="Reset">
    </div>
</form>

<?php
    error_reporting(0);
        echo "<span class='pass'>Your BMI is : ". number_format($bmipass , 2) ."</span>";
    if (isset($_POST['submit'])){
        if ($bmipass >= 13.6 && $bmipass <= 18.5) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px ;margin-right:50px'> Low body weight. You need to gain weight by eating moderately.</span>";?>
            <img src="./Images/h1.png" class="one"><?php
        } elseif ($bmipass > 18.5 && $bmipass < 24.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The standard of good health.</span>";?>
            <img src="./Images/h2.png" class="two"><?php
        } elseif ($bmipass > 25 && $bmipass < 29.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess body weight. Exercise needs to reduce excess weight.</span>";?>
            <img src="./Images/h3.png" class="three"><?php
        } elseif ($bmipass > 30 && $bmipass < 34.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The first stage of obesity. It is necessary to choose food and exercise.</span>";?>
            <img src="./Images/h4.png" class="four"><?php
        } elseif ($bmipass > 35 && $bmipass < 39.9) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> The second stage of obesity. Moderate diet and exercise are required.</span>";?>
            <img src="./Images/h5.png" class="five"><?php
        } elseif ($bmipass >= 40) {
            echo "<span style='color:#00203FFF; display:block; margin-top:5px;margin-right:50px'> Excess fat.<b style='color:#ed4337'> Fear of death</b>. Need a doctor advice.</span>";?>
            <img src="./Images/h6.png" class="six"><?php
        }
    } else {
        echo "";
    }
?>
<?php include 'footer.php';?>