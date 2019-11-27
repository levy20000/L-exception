<?PHP
include "../entities/produit.php";
include "../core/prod.php";
$prodC=new produitc();
$prodC->afficherprod($product);
echo "****************";

echo "<br>";
echo "id_prod:".$product->getid();
echo "<br>";
echo "Nom_prod:".$product->getNom();
echo "<br>";
echo ":taille".$product->getTaille();
echo "<br>";
echo ":couleur".$product->getCouleur();
echo "<br>";
echo ":prix".$product->getPrix();
echo "<br>";

?>