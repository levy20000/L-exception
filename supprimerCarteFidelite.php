<?php
require_once '../../core/carte_fideliteM.php';
if (isset($_GET['id'])){
    $carte_fideliteM = new Carte_fideliteM();
    $carte_fideliteM->supprimerCarte($_GET['id']);
    header('Location: listeCarteFidelite.php');
}
?>