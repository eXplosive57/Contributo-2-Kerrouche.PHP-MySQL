
<?php

include('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();
//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: accesso.php");
}

$sql = "SELECT * FROM Smartphone ";

$result = $con->query($sql);

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>SmartPhone</title>
    <link rel="stylesheet" href="index.css?v=2" />

</head>

<body>

<ul>
  <li><a href="home.php">HOME</a></li>
  <li> <a href="smartphone.php">CATALOGO</a></li>
      <?php 
          if ($_SESSION['tipo'] == 0 ) {
      
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
      if(isset($_SESSION['ok'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['ok'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['ok']);
      }
    ?>

<div class="container"> 

<?php
  while($row = $result->fetch_array()){
    ?>

      
      
       <div class="card">
    <img src="<?= $row['immagine']; ?>" alt="">
    <h3><?= $row['nomeprodotto']; ?></h3>
    <h2><?= $row['prezzo']; ?>$</h2>
    <h3><?= $row['batteria']; ?>mAh</h3>
    <p><?= $row['descrizione']; ?></p>
<?php
    if ($_SESSION['tipo'] == 1 ) {
      ?>
    <form action="gestionecarrello.php" method="POST">
      <input name="nome" hidden value = "<?php echo $row['nomeprodotto']; ?>">
      <input name="prezzo" hidden value = "<?php echo $row['prezzo']; ?>">

        
          <label for="qty">Quantita</label>
          <input type="qty" name="qty" id="qty" required pattern="[0-99]+" title="Inserisci un quantita numerica">
        <br>
      <button type="submit" name="add1">AGGIUNGI</button>
      
  </form>

  <?php 
    }
    ?>

      </div>
    
    <?php
    
  }

?>


</div>



</body>

</html>