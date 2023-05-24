<?php

require_once('config.php');

$username = $con->real_escape_string($_POST['username']);
$password = $con->real_escape_string($_POST['password']);
session_start();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql_select = "SELECT * FROM Utenti WHERE username = '$username'";
    if ($result = $con->query($sql_select)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (password_verify($password, $row['password'])) {
                

                $_SESSION['loggato'] = true;
                $_SESSION['log'] = 'Benvenuto al portale!';
                $_SESSION['id'] = $username;
                
                header("location: home.php");
                
                
            } else {
                $_SESSION['pass'] = 'Password errata!';
                header("location: accesso.php");
                

            }
        } else {
            $_SESSION['ko'] = "Attenzione! Username non presente.";
            header("location: accesso.php");
        }
    } else {
        echo "Errore login.";

    }


    $con->close();
}

?>