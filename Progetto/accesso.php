<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>LOGIN</title>
    <link rel="stylesheet" href="index.css" />

</head>

<body>

<?php

session_start();
if (isset($_SESSION['pass'])) {
    
    ?>

    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <h3>
            <?php echo $_SESSION['pass']?>
        </h3>
    </div>
    <?php

    unset($_SESSION['pass']);
}
?>

<?php


if (isset($_SESSION['ko'])) {

    ?>

    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <h3>
            <?php echo $_SESSION['ko']?>
        </h3>
    </div>
    <?php

    unset($_SESSION['ko']);
}
?>

<?php


if (isset($_SESSION['reg'])) {

    ?>

    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <h3>
            <?php echo $_SESSION['reg']?>
        </h3>
    </div>
    <?php

    unset($_SESSION['reg']);
}
?>



    


<form action="login.php" method="post">
    <h1>ACCEDI</h1>

    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="username" required>

    <input type="submit" value="invia">
    <p>Ancora non sei registrato? <a href="index.php">Registrati</p>

</form>





</body>
<html>