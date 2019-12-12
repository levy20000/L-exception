<?php
require_once '../../core/promotionM.php';
if (isset($_GET['id_prom'])){
    $promotionM = new PromotionM();
    $promotionM->supprimerPromotion($_GET['id_prom']);
    header('Location: listePromotions.php');
}
?>