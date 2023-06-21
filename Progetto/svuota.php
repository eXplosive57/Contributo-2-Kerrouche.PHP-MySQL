<?php
include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();


if(isset($_SESSION['id']) && isset($_POST['svuota']) && isset($_POST['id_carrello']))

{
    $user = $_SESSION['id'];
    $carrelloId = $_POST['id_carrello'];

    $sql = "DELETE  FROM carrello
            WHERE id_utente= '$user' ";
    $result = $con->query($sql);

    $_SESSION['acq'] = "ACQUISTO EFFETTUATO!";
    header("location: carrello.php");

}

?>