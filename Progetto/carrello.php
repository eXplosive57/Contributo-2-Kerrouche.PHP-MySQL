
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
          if ($_SESSION['tipo'] == 0 ) {
      
      ?>
      <li><a href="inserimento.php">INSERISCI SMARTPHONE</a></li>
      <li><a href="inserimento2.php">INSERISCI LAPTOP</a></li>
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

if (isset($_SESSION['acq'])) {

  ?>

  <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      <h3>
          <?php echo $_SESSION['acq']?>
      </h3>
  </div>
  <?php

  unset($_SESSION['acq']);
}



//controllo sulla variabile 'loggato'
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
    header("location: accesso.php");
}else
{
  $username = $_SESSION['nome'];
  echo  "<h1> CARRELLO DI $username </h1>";
  $idutente = $_SESSION['id'];
  $sql2 = "SELECT ca.id_utente, ca.NomeProdotto,
                 ca.quantita, s.nomeprodotto,
                 s.immagine, s.prezzo, ca.id
          FROM carrello ca, smartphone s
          WHERE ca.id_utente = '$idutente' AND ca.NomeProdotto = s.nomeprodotto";
  $result2 = $con->query($sql2);
  

  if(mysqli_num_rows($result2) > 0){

    $totale = 0;
    ?> <table>
            <thead>
      <tr>
        <th>Nome Prodotto</th>
        <th>Quantita</th>
        <th>Prezzo</th>
        <th></th>
      </tr>
      </thead> <?php
    while($row2 = $result2->fetch_array()){

      $totale += $row2['quantita'] * $row2['prezzo'];
      ?>

      <tbody>
      <tr>
        <td><?php echo $row2["nomeprodotto"] ?></td>
        <td><?php echo $row2["quantita"]. "X" ?></td>
        <td><?php echo $row2["prezzo"]. "$" ?></td>
        <td>          
          <form action = "rimuovi.php" method="POST">
            <input name = "id_carrello"  hidden value ="<?php echo $row2["id"]; ?>">
              <button id="elimina" name="elimina">RIMUOVI</button>
          </form></td>
      </tr>
      
    
    </tbody>
   
    <?php
  }
  ?>
   </table> 
  <h2 style="margin-left: 1170px;"> TOTALE: <?php echo $totale ?>$</h2>
  <form action = "svuota.php" method="POST">
            <input name = "id_carrello"  hidden value ="<?php echo $row2["id"]; ?>">
              <button id="svuota" name="svuota">ACQUISTA</button>
          </form></td>
<?php
}
}


?>



</body>

</html>