<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>REGISTRAZIONE</title>
    <link rel="stylesheet" href="index.css?v=1" />

</head>

<body>

    <?php

    session_start();
    if (isset($_SESSION['errore'])) {

        ?>

        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <h3>
                <?php echo $_SESSION['errore'] ?>
            </h3>
        </div>
        <?php

        unset($_SESSION['errore']);
    }
    ?>





<form action="registrazione.php" method="post">
    <h1>REGISTRATI</h1>

    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="username" required>

    <input type="submit" value="invia">
    <p>Sei gia registrato? <a href="accesso.php">Accedi</p>

</form>
</body>

<html>