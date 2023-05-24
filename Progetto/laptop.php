
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');

session_start();
//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: login.html");
}

$sql = "SELECT * FROM Laptop ";

$result = $con->query($sql);

?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

    <title>Laptop</title>
    <link rel="stylesheet" href="index.css?v=2" />

</head>

<body>

<ul>
  <li><a href="home.php">HOME</a></li>
  <li class="dropdown">
    <a class="dropbtn">MENU</a>
    <div class="dropdown-content">
      <a href="smartphone.php">SmartPhone</a>
      <a href="laptop.php">Portatili</a>
      <?php if ($_SESSION['id'] == 'Admin' ) { ?>
      <li><a href="inserimento.php">INSERISCI SMARTPHONE</a></li>
      <li><a href="inserimento2.php">INSERISCI LAPTOP</a></li>
      <?php } ?>
      <li><a href="logout.php">DISCONNETTI</a></li>
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

<?php 
      if(isset($_SESSION['add'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['add'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['add']);
      }
    ?>

<?php 
      if(isset($_SESSION['stato'])) {
        
        ?>

      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <h3><?php echo $_SESSION['stato'] ?></h3>
        </div>  
<?php
        
        unset($_SESSION['stato']);
      }
    ?>
    
    
    
<div class="container"> 
<?php
  while($row = $result->fetch_array()){
    ?>
    
       <div class="card">
    <img src="<?= $row['Immagine']; ?>" alt="">
    <h3><?= $row['NomeDispositivo']; ?></h3>
    <h2><?= $row['Prezzo']; ?>$</h2>
    <h2><?= $row['Processore']; ?></h2>
    <h2><?= $row['Ram']; ?>GB</h2>
    <p><?= $row['Descrizione']; ?></p>
    <form action="aggiungi2.php" method="POST">
      <input name="nome" hidden value = "<?php echo $row['NomeDispositivo']; ?>">
      <button type="submit" name="aggiungi">ACQUISTA</button>
   </form>
      </div>
    
    <?php
    
  }

?>
</div>


</body>

</html>