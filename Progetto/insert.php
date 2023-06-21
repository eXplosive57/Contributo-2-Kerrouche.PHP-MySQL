<?php

include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);


session_start();



$prodotto = $con->real_escape_string($_POST['nomeprodotto']);
$prezzo = $con->real_escape_string($_POST['prezzo']);
$descrizione = $con->real_escape_string($_POST['descrizione']);
$immagine = $con->real_escape_string($_POST['immagine']);
$batteria = $con->real_escape_string($_POST['batteria']);
$qnt = $con->real_escape_string($_POST['quantita']);

$uploadDir = 'foto/';
$percorso = $uploadDir . $immagine;

if ($_SERVER["REQUEST_METHOD"] === "POST") {



    if ($_SESSION['tipo'] == 0) {

        //controllo se già esiste il prodotto
        $sql = "SELECT * FROM Smartphone WHERE nomeprodotto = '$prodotto' ";
        $result = $con->query($sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Prodotto gia esistente";
        } else {
            //inserisco il prdotto se non esiste

            $sql = "INSERT INTO Smartphone (nomeprodotto, prezzo, descrizione, immagine, batteria, Quantita) 
        VALUES ('$prodotto','$prezzo','$descrizione','$percorso','$batteria','$qnt')";

            if ($con->query($sql) === TRUE) {
                $_SESSION['ok'] = 'Prodotto aggiunto al catalogo!';
                header("location: smartphone.php");
            } else {
                echo "Errore ";
            }
        }

    }
}

?>