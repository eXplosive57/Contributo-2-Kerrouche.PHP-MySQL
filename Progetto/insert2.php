<?php

include('config.php');

session_start();

$prodotto = $con->real_escape_string($_POST['nomelaptop']);
$prezzo = $con->real_escape_string($_POST['prezzo']);
$descrizione = $con->real_escape_string($_POST['descrizione']);
$immagine = $con->real_escape_string($_POST['immagine']);
$ram = $con->real_escape_string($_POST['ram']);
$cpu = $con->real_escape_string($_POST['processore']);
$qnt = $con->real_escape_string($_POST['quantita']);

$uploadDir = 'foto/';
$percorso = $uploadDir . $immagine;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //controllo se già esiste il prodotto
    $sql = "SELECT * FROM Laptop WHERE NomeDispositivo = '$prodotto' ";
    $result = $con->query($sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Laptop gia esistente";

    } else {
        //inserisco il prdotto se non esiste

        $sql = "INSERT INTO Laptop (NomeDispositivo, Prezzo, Descrizione, Processore, Ram, Immagine, Quantita) 
        VALUES ('$prodotto','$prezzo','$descrizione', '$cpu','$ram','$percorso', '$qnt')";


        if ($con->query($sql) === TRUE) {
            $_SESSION['ok'] = 'Prodotto aggiunto!';
            header("location: laptop.php");
        } else {
            echo "REGISTRAZIONE FALLITA ";
        }
    }

}

?>