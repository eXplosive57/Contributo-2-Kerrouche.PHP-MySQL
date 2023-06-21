
<?php

require_once('config.php');
$con = new mysqli($host,$userName,$password,$dbName);

session_start();





if(isset($_SESSION['id']) && isset($_POST['add1']))

{
    $userID = $_SESSION['id'];
    $nome = $_POST['nome'];
    $qty = $_POST['qty'];
    
    $sql = "SELECT id, quantita
            FROM carrello
            WHERE id_utente='$userID' and NomeProdotto='$nome'";
    $result = $con->query($sql);
    
    if(mysqli_num_rows($result) > 0)
   
    {   
        //aggiorno la quantita se il prodotto é giá nel carrello
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $id_carrello = $row['id'];
        $quantitaora = $row['quantita'];
        $quantitaora += $qty;

        $sql2 = "UPDATE carrello
                 SET quantita = '$quantitaora'
                 WHERE id = '$id_carrello' ";
        $result2 = $con->query($sql2);
        
        header("location: carrello.php");
        
        
        
    }
    else
    {   
        //inserisco il prodotto nel carrello se non esiste
        
        $sql3 = "INSERT INTO carrello (id_utente, NomeProdotto, quantita)
                 VALUES ('$userID','$nome','$qty')";

        $result3 = $con->query($sql3);
        
        
        header("location: carrello.php");
        
        
    }

}



?>