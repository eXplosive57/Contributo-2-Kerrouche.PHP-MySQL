<?php

include('config.php');

session_start();

$prod = $_POST['nome'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql = "SELECT * FROM Laptop WHERE NomeDispositivo = '$prod' AND Quantita > 0";
    $result = $con->query($sql);

    //controllo se ci sono dispositivi con qnt effettive
    if (mysqli_num_rows($result) > 0) {
        $sql2 = " UPDATE Laptop SET Quantita = Quantita - 1 WHERE NomeDispositivo = '$prod' ";
        if ($con->query($sql2) === TRUE) {
            header("location: laptop.php");
        } else {
            echo "errore ";
        }

        $_SESSION['add'] = "PRODOTTO ACQUISTATO!";
    } else {

        $_SESSION['stato'] = "PRODOTTO ESAURITO!";
        header("location: laptop.php");


    }

}

?>