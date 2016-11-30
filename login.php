<?php
$error = "";
$correctEmail = $correctPassword = "";


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["email"])) {
        $error = false;
    } else if (isset($_POST["email"]) && $_POST["email"] !== "a@a.a") {
        $error = true;
        
    } else if ($_POST["email"] == "a@a.a") {
        $correctEmail = true;
    }
    
    if (isset($_POST["password"]) && $_POST["password"] !== "aaa") {
        $error = true;
        
    } else if ($_POST["password"] == "aaa") {
        $correctPassword = true;
    }
    
    if ($correctEmail == true && $correctPassword == true) {
        header("Location: index.php");
        die();
    }
}

$errorCheck = $error;
?>


<html lang="en">

<head>
    <title>Math Game</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta charset="utf-8">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h1>Please login to enjoy our math game</h1>
            </div>
            <div class="col-sm-1">
            </div>
            <form action="login.php" method="post" role="form" class="form-horizontal">
                <div class="form-group">
                    <div class="col-sm-4 text-right">Email:</div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" size="6">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 text-right">Password:</div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="password" name="password" placeholder="Password" size="6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
            <?php 
            if ($errorCheck = true) {
                echo '<p style="color: red">' . "Login information is incorrect." . '</p>';
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>