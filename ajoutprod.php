<?PHP
include "../entities/produit.php";
include "../core/prod.php";

if (isset($_POST['id_prod']) and isset($_POST['Nom_prod']) and isset($_POST['taille']) and isset($_POST['couleur']) and isset($_POST['prix'])){
$prod2 =new produit($_POST['id_prod'],$_POST['Nom_prod'],$_POST['taille'],$_POST['couleur'],$_POST['prix']);
//Partie2
/*
var_dump($employe1)
}
*/
//Partie3
$prod1=new produitc();
$prod1->ajouterprod($prod2);
header('Location: afficherprod.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>