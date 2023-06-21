<?php

require_once('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

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
                $_SESSION['nome'] = $username;


                $sql = "SELECT id FROM utenti WHERE username = '$username'";
                $result = $con->query($sql);
                $row = mysqli_fetch_array($result);
                $_SESSION['id'] = $row['id'];

                $sql2 = "SELECT Tipo FROM utenti WHERE username = '$username' ";
                $result2 = $con->query($sql2);
                $row2 = mysqli_fetch_array($result2);
                $_SESSION['tipo'] = $row2['Tipo'];

 
                
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