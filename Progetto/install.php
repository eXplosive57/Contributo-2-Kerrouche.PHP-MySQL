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
    PRIMARY KEY (id)
)";

if ($con->query($utente) === FALSE) {
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

//Crea la tabella laptop se non esiste
$laptop = "CREATE TABLE IF NOT EXISTS `Laptop`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `NomeDispositivo` varchar(255) NOT NULL,
    `Prezzo` float NOT NULL,
    `Descrizione` text NOT NULL,
    `Processore` text NOT NULL,
    `Ram` int(30) NOT NULL,
    `Immagine` varchar(255) NOT NULL,
    `Quantita` int(255) NULL,
    PRIMARY KEY (id)
   
)";

if ($con->query($laptop) === FALSE) {
    echo "Errore nella creazione della tabella Laptop " . $con->error;
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

$img5 = 'foto/mac.jpeg';
$img6 = 'foto/macpro.avif';
$img7 = 'foto/macpro2019.avif';
$img8 = 'foto/mac2021.avif';
$in_pc = "INSERT INTO `laptop` (`NomeDispositivo`, `Prezzo`, `Descrizione`, `Processore`, `Ram`, `Immagine`, `Quantita`) VALUES
('MacBook Air', '999', 'MacBooK Air', 'Apple M1', '8', '$img5', '8'),
('MacBook Pro 2017', '1199', 'MacBooK Pro 2017', 'Intel Core i5', '8', '$img6', '1'),
('MacBook Pro 2019', '1499', 'MacBooK Air', 'Apple M1', '8', '$img7', '1'),
('MacBook Pro 2021', '2999', 'MacBooK Air', 'Apple M1', '8', '$img8', '3')";

if ($con->query($in_pc) === FALSE) {
    echo "Errore nell'inserimento dei laptop " . $con->error;
}


header('Location: index.php');
$con->close();

?>