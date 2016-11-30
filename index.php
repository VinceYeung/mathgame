<?php
session_start();
ob_start();

$firstNum  = rand(1, 20);
$secondNum = rand(1, 20);
$oper = rand(1, 2);

    if ($oper == 1) {
        $operator = "+";
    } else {
        $operator = "-";
    }

    if ($operator == "+") {
        $mathAnswer = $firstNum + $secondNum;
    } else if ($operator == "-") {
        $mathAnswer = $firstNum - $secondNum;
    } 

    if(!isset($_SESSION["totalScore"])) {
        $_SESSION["totalScore"] = 0;
    }
    if(!isset($_SESSION["totalGuess"])) {
        $_SESSION["totalGuess"] = 0;
    }
    
    if(!is_numeric($_POST["userAnswer"])) { 
        $error = "You must enter a number for your answer."; 
    } else if (isset($_POST["userAnswer"]) && isset($_POST["mathAnswer"])) {
        if ($_POST["userAnswer"] == $_POST["mathAnswer"]) {
        $_SESSION["totalScore"]++;
        $_SESSION["totalGuess"]++;
        $right = "Correct, " . $_POST["firstNum"] . $_POST["operator"] . $_POST["secondNum"] . " is " . $_POST["mathAnswer"];
    } else {
         $_SESSION["totalGuess"]++;
         $wrong = "Incorrect, " . $_POST["firstNum"] . $_POST["operator"] . $_POST["secondNum"] . " is " . $_POST["mathAnswer"]; 
        }
    }

?>

<html lang="en">
<head>
    <title>Math Game</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta charset="utf-8">
</head>

<body>

<?php
    if(isset($_POST["logout"])){
        header("Location: login.php");
        session_unset();
        session_destroy(); 
        die();
    }
?>
<form action="" method="post">
   <button type="submit" class="btn btn-default btn-sm" name="logout">Logout</button>
</form>
    
    <div class="container">
        <form action="index.php" method="post" class="form-horizontal">
            <div class="container">
                <div class="col-sm-4 col-sm-offset-4">
                    <h1>Math Game</h1>
                </div>
                <div class="col-sm-4">
                    
                </div>
            </div>
            <div class="row">
                <label class="col-sm-2 col-sm-offset-3">
                    <?php echo $firstNum; ?>
                </label>
                <label class="col-sm-2">
                    <?php echo $operator; ?>
                </label>
                <label class="col-sm-2">
                    <?php echo $secondNum; ?>
                </label>
                <div class="col-sm-3"></div>
            </div>
            <input type="hidden" name="firstNum" value="<?php echo $firstNum; ?>">
            <input type="hidden" name="operator" value="<?php echo $operator; ?>">
            <input type="hidden" name="secondNum" value="<?php echo $secondNum; ?>">
            <input type="hidden" name="mathAnswer" value="<?php echo $mathAnswer; ?>">
            
            
                <div class="col-sm-3 col-sm-offset-4">
                    <input type="text" class="form-control" id="userAnswer" name="userAnswer" placeholder="Enter answer" size="6">
                </div>
                <div class="col-sm-5">
                </div>
            
            <div class="row">
                <div class="col-sm-3 col-sm-offset-4">
                    <br/>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
                </form>
        
            <div class="col-sm-5">
            </div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
        <?php echo $right;?>
        <?php echo $wrong;?>   

            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <?php 
 
                    echo "<br/>" . "Score: " . $_SESSION["totalScore"] . " / " . $_SESSION["totalGuess"];

                    ?>
                </div>

            </div>
        </div>
</body>
</html>