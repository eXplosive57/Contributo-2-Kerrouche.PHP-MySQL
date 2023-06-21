<?php

require_once('config.php');

// Crea la connessione col server
$con = new mysqli($host, $userName, $password);


if ($con->connect_error) {
    die("Connessione fallita ASFAAS: " . $con->connect_error);
}

// Crea il database se non esiste già
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if ($con->query($sql) === FALSE) {
    echo "Errore nella creazione del database " . $con->error;
}

// Seleziona il database con cui vogliamo operare
$con = new mysqli($host, $userName, $password, $dbName);

//Creo la tabella utente se non esiste

$utente = "CREATE TABLE IF NOT EXISTS `Utenti` (
    `id` int(11) NOT NULL AUTO_INCREMENT,               
    `username` varchar(30) NOT NULL,
    `password` varchar(255) NOT NULL,
    `Tipo` int(11) NOT NULL,
    PRIMARY KEY (id)
)";

if ($con->query($utente) === FALSE) {
    echo "Errore nella creazione della tabella utente " . $con->error;
}

//Creo la tabella utente se non esiste

$carr = "CREATE TABLE IF NOT EXISTS `carrello` (
    `id` int(11) NOT NULL AUTO_INCREMENT,               
    `id_utente` int(11) NOT NULL,
    `NomeProdotto` varchar(255) NOT NULL,
    `quantita` int(11) NOT NULL,
     PRIMARY KEY (id)
)";

if ($con->query($carr) === FALSE) {
    echo "Errore nella creazione della tabella utente " . $con->error;
}

//Crea la tabella smartphone se non esiste
$smart = "CREATE TABLE IF NOT EXISTS `Smartphone`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nomeprodotto` varchar(255) NOT NULL,
    `prezzo` float NOT NULL,
    `descrizione` text NOT NULL,
    `immagine` varchar(255) NOT NULL,
    `batteria` varchar(255) NOT NULL,
    `Quantita` int(255) NULL,
    PRIMARY KEY (id)
   
)";

if ($con->query($smart) === FALSE) {
    echo "Errore nella creazione della tabella Smartphone " . $con->error;
}




$insert_utente = "INSERT INTO `Utenti` (`username`, `password`) VALUES
('Admin', '" . password_hash('Admin', PASSWORD_DEFAULT) . "')";

if ($con->query($insert_utente) === FALSE) {
    echo "Errore nell'inserimento degli utenti " . $con->error;
}

$img = 'foto/iphone14.avif';
$img2 = 'foto/iphone12pro.avif';
$img3 = 'foto/iphone12.avif';
$img4 = 'foto/iphone11.avif';

$in_smart = "INSERT INTO `smartphone` (`nomeprodotto`, `prezzo`, `descrizione`, `immagine`, `batteria`, `Quantita`) VALUES
('iPhone 14', '1399', 'iPhone 14', '$img', '6000', '4'),
('iPhone 12 PRO', '1199', 'iPhone 12 PRO', '$img2', '4890', '7'),
('iPhone 12', '899', 'iPhone 12', '$img3', '4500', '2'),
('iPhone 11', '599', 'iPhone 11', '$img4', '4100', '5')";

if ($con->query($in_smart) === FALSE) {
    echo "Errore nell'inserimento degli smartphone " . $con->error;
}


header('Location: index.php');
$con->close();

?>