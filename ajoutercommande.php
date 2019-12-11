<?php
include "../entity/commande.php";
include "../entity/ligneCommande.php";
include "commandeC.php";
include "produit.php";

$p=new produit();
session_start();
if (isset($_SESSION['l']) and isset($_SESSION['cart'])) {
    $lignes = array();
    $commande = new commande();
    $commande->setIdClient($_SESSION['l']);
    $total = 0;
    foreach ($_SESSION['cart'] as $row)  {
        $total = $total + (json_decode($row, true)['prix'] * json_decode($row, true)['quantite']);
    }
    $commande->setTotal($total);
    $commandeC = new commandeC();
    $commandeId = $commandeC->ajoutercommande($commande);
    foreach ($_SESSION['cart'] as $row)  {
        $commandeC->ajouterligne($commandeId, json_decode($row, true)['id'],json_decode($row, true)['name'],json_decode($row, true)['quantite'],json_decode($row, true)['prix'],json_decode($row, true)['prix']*json_decode($row, true)['quantite']);
        $p->modifierstock(json_decode($row, true)['id'],-json_decode($row, true)['quantite']);
    }
    $_SESSION['cart'] = array();
    ?>
   <script type=""> location.replace("succes_commande.html");</script>
    <?php

} else {
    echo "Sorry, there was an error ";
}


?>