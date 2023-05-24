<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>INSERIMENTO SMARTPHONE</title>
    <link rel="stylesheet" href="index.css" />

</head>

<body>




<ul>
    <li><a href="home.php">HOME</a></li>
    <li class="dropdown">
        <a class="dropbtn">MENU</a>
        <div class="dropdown-content">
            <a href="smartphone.php">SmartPhone</a>
            <a href="laptop.php">Portatili</a>
    <li><a href="inserimento2.php">INSERISCI LAPTOP</a></li>
    <li><a href="logout.php">DISCONNETTI</a></li>
    </div>
    </li>
</ul>

<form action="insert.php" method="post">
    <h1>INSERISCI I DATI RELATIVI AL DISPOSITIVO</h1>

    <label for="nomeprodotto">Nome Dispositivo</label>
    <input type="text" name="nomeprodotto" id="nomeprodotto" required>

    <label for="prezzo">Quantita</label>
    <input type="quantita" name="quantita" id="quantita" required>

    <label for="prezzo">Prezzo</label>
    <input type="number" name="prezzo" id="prezzo" required>

    <label for="descrizione">Descrizione</label>
    <input type="text" name="descrizione" id="descrizione" required>

    <label for="immagine">Scegli immagine:</label>
    <input type="file" id="immagine" name="immagine" accept="image/*">

    <label for="batteria">Capacita batteria:</label>
    <input type="text" name="batteria" id="batteria" required>





    <input type="submit" value="invia">

</form>

</body>
<html>