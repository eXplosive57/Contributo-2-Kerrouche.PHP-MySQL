
<?php


include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();
//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: accesso.php");
}



?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>HOME</title>
    <link rel="stylesheet" href="index.css" />
    <style>

    h1 {
      color: #333;
      text-align: center;
    }


    </style>
</head>

<body>

<ul>
  <li><a href="home.php">HOME</a></li>
  <li> <a href="smartphone.php">CATALOGO</a></li>

      <?php
          
          if ($_SESSION['tipo'] == 0) {
      
      ?>
      <li><a href="inserimento.html">INSERISCI SMARTPHONE</a></li>
      <?php } ?>
      
      <li><a href="logout.php">DISCONNETTI</a></li>
      <?php if($_SESSION['tipo'] == 1) {
        ?>
        <li style=float:right><a href="carrello.php">CARRELLO</a></li> <?php
      }
      ?>
      
      <li><a>Sei loggato come, <?php echo $_SESSION['nome'] ?> </a></li>

    </div>
  </li>
</ul>
    


<?php


if (isset($_SESSION['log'])) {

    ?>

    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <h3>
            <?php echo $_SESSION['log']?>
        </h3>
    </div>
    <?php

    unset($_SESSION['log']);
}
?>





<h1>Dai un'occhiata alle ultime novità!</h1>

<div class="article">
  <h2>Iphone 14</h2>
  <img src="foto/iphone14.avif" alt="">
  <p>Il telefono ha uno schermo OLED Super Retina XDR da 6,1 pollici per l'iPhone 14 e 6,7 pollici per l'iPhone 14 Plus, con un formato di 19,5:9. È dotato di un vetro "Ceramic Shield", un rivestimento di cristalli di ceramica introdotto per la prima volta sulla linea iPhone 12. È dotato del chip Apple A15 Bionic, connettività 5G, la cui tecnologia a onde millimetriche mmWave è disponibile solo in alcuni mercati. Gli iPhone 14 ripropongono lo stesso design del modello precedente.</p>
</div>

<div class="article">
  <h2>Iphone 13</h2>
  <img src="foto/iphone13.avif" alt="">
  <p>L'iPhone 13 offre un display Super Retina XDR per colori vividi e contrasto elevato. Il potente chip A15 Bionic garantisce prestazioni veloci e un'efficienza energetica ottimizzata. La fotocamera a doppia lente con modalità Notte permette di scattare foto di alta qualità anche in condizioni di scarsa illuminazione. La durata della batteria è migliorata e l'iPhone 13 è resistente all'acqua e alla polvere.</p>
</div>

<div class="article">
  <h2>Iphone 12</h2>
  <img src="foto/iphone12.avif" alt="">
  <p>L'iPhone 12 offre un design elegante e compatto con un display Super Retina XDR per colori vividi. Il chip A14 Bionic garantisce prestazioni veloci e un'efficienza energetica ottimizzata. La fotocamera a doppia lente cattura foto di alta qualità, e la modalità Notte migliora le prestazioni in condizioni di scarsa luminosità. La compatibilità con la rete 5G offre una connettività veloce e affidabile.</p>
</div>


</body>

</html>