<?PHP
include "../core/prod.php";
$prodc=new produitc();
if (isset($_POST["id_prod"])){
	$prodc->supprimerprod($_POST["id_prod"]);
	header('Location: afficherprod.php');
}

?>