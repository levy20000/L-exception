<?PHP
include "../entities/client.php";
include "../core/clientc.php";

if (isset($_POST['id_client']) and isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['mdp_client']) and isset($_POST['telephone_client'])and isset($_POST['adresse_client'])and isset($_POST['ville_client'])){
$client2=new client($_POST['id_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['mdp_client'],$_POST['telephone_client'],$_POST['adresse_client'],$_POST['ville_client']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$client1=new clientc();
$client1->ajouterclient($client2);
header('Location: afficherclient.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>