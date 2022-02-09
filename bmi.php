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
        <input type="text" name="height" autocomplete="off" placeholder="Height in meteres"><?php echo $errh; ?>
    </div>

    <div class="section2">
        <span>Enter Your weight : </span>
        <input type="text" name="weight" autocomplete="off" placeholder="weight in kilograms"><?php echo $errw; ?>
    </div>    

            <div class="submit">
                <input type="submit" name="submit" value="Check">
                <input type="reset" value="Reset">
            </div>
        </form>

<?php include 'footer.php';?>