<?PHP
include "../config.php";
class clientc {
function afficherclient ($client){
		echo "id_client: ".$client->getid()."<br>";
		echo "Nom: ".$client->getNom()."<br>";
		echo "Prénom: ".$client->getPrenom()."<br>";
		echo "mot de passe".$client->getmdp()."<br>";
		echo "numero ".$client->gettelephone()."<br>";
		echo "adresse ".$client->getadresse()."<br>";
		echo "ville ".$client->getville()."<br>";
	}
	
	function ajouterclient($client){
		$sql="insert into client (id_client,nom_client,prenom_client,mdp_client,telephone_client,adresse_client,ville_client) values (:id_client,:nom_client,:prenom_client,:mdp_client,:telephone_client,:adresse_client,:ville_client)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_client=$client->getid();
        $nom_client=$client->getNom();
        $prenom_client=$client->getPrenom();
        $mdp_client=$client->getmdp();
        $telephone_client=$client->gettelephone();
        $adresse_client=$client->getadresse();
        $ville_client=$client->getville();
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':nom_client',$nom_client);
		$req->bindValue(':prenom_client',$prenom_client);
		$req->bindValue(':mdp_client',$mdp_client);
		$req->bindValue(':telephone_client',$telephone_client);
		$req->bindValue(':adresse_client',$adresse_client);
		$req->bindValue(':ville_client',$ville_client);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherclients(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerclient($id_client){
		$sql="DELETE FROM client where id_client= :id_client";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_client',$id_client);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierclient($client,$id_client){
		$sql="UPDATE client SET id_client=:idd_client, nom_client=:nom_client,prenom_client=:prenom_client,mdp_client=:mdp_client,telephone_client=:telephone_client,adresse_client=:adresse_client,ville_client=:ville_client WHERE id_client=:id_client";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd_client=$client->getid();
        $nom_client=$client->getNom();
        $prenom_client=$client->getPrenom();
        $mdp_client=$client->getmdp();
        $telephone_client=$client->gettelephone();
        $adresse_client=$client->getadresse();
        $ville_client=$client->getville();
		$datas = array(':idd_client'=>$idd_client, ':id_client'=>$id_client, ':nom_client'=>$nom_client,':prenom_client'=>$prenom_client,':mdp_client'=>$mdp_client,':telephone_client'=>$telephone_client,':adresse_client'=>$adresse_client,':ville_client'=>$ville_client);
		$req->bindValue(':idd_client',$idd_client);
		$req->bindValue(':id_client',$id_client);
		$req->bindValue(':nom_client',$nom_client);
		$req->bindValue(':prenom_client',$prenom_client);
		$req->bindValue(':mdp_client',$mdp_client);
		$req->bindValue(':telephone_client',$telephone_client);
		$req->bindValue(':adresse_client',$adresse_client);
		$req->bindValue(':ville_client',$ville_client);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererproduit($id_prod){
		$sql="SELECT * from produit where id_prod=$id_prod";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeclients($id_client){
		$sql="SELECT * from client where id_client=$id_client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>