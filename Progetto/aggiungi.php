<?php

include('config.php');

session_start();

$prod = $_POST['nome'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $sql = "SELECT * FROM Smartphone WHERE nomeprodotto = '$prod' AND Quantita > 0";
    $result = $con->query($sql);

    //controllo se ci sono dispositivi con qnt effettive
    if (mysqli_num_rows($result) > 0) {
        $sql2 = " UPDATE Smartphone SET Quantita = Quantita - 1 WHERE nomeprodotto = '$prod' ";
        if ($con->query($sql2) === TRUE) {
            header("location: smartphone.php");
        } else {
            echo "errore ";
        }

        $_SESSION['add'] = "PRODOTTO ACQUISTATO!";
    } else {

        $_SESSION['stato'] = "PRODOTTO ESAURITO!";
        header("location: smartphone.php");


    }

}

?>