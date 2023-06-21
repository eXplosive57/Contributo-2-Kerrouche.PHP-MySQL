<?php
include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();


if(isset($_SESSION['id']) && isset($_POST['elimina']) && isset($_POST['id_carrello']))

{
    $userId = $_SESSION['id'];
    $carrelloId = $_POST['id_carrello'];

    $sql = "DELETE FROM carrello
            WHERE id= '$carrelloId' ";
    $result = $con->query($sql);

    header("location: carrello.php");

}

?>