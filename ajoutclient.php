<?PHP
include "../../entity/client.php";
include "../../core/clientc.php";

if ( isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['mdp_client']) and isset($_POST['telephone_client'])and isset($_POST['adresse_client'])and isset($_POST['ville_client'])){
    $mdp_client=$_POST['mdp_client'];


    $password = hash('sha512', $mdp_client);
    $client2=new client($_POST['nom_client'],$_POST['prenom_client'],$password,$_POST['telephone_client'],$_POST['adresse_client'],$_POST['ville_client']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$client1=new clientc();
$client1->ajouterclient2($client2);
header('Location: client.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>