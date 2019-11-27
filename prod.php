<?PHP
include "../config.php";
class produitc {
function afficherprod ($produit){
		echo "id_prod".$produit->getid()."<br>";
		echo "Nom_prod".$produit->getNom()."<br>";
		echo "taille: ".$produit->getTaille()."<br>";
		echo "couleur: ".$produit->getCouleur()."<br>";
		echo "prix".$produit->getPrix()."<br>";
	}
	
	function ajouterprod($produit){
		$sql="insert into produit (id_prod,Nom_prod,taille,couleur,prix) 
		      values (:id_prod,:Nom_prod,:taille,:couleur,:prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
		$id_prod=$produit->getid();
		$Nom_prod=$produit->getNom();
        $taille=$produit->getTaille();
        $couleur=$produit->getCouleur();
        $prix=$produit->getPrix();
        $req->bindValue(':id_prod',$id_prod);
		$req->bindValue(':Nom_prod',$Nom_prod);
		$req->bindValue(':taille',$taille);
		$req->bindValue(':couleur',$couleur);
		$req->bindValue(':prix',$prix);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherproduits(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerprod($id_prod){
		$sql="DELETE FROM produit where id_prod= :id_prod";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_prod',$id_prod);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierprod($produit,$id_prod){
		$sql="UPDATE produit SET id_prod=:idd_prod, Nom_prod=:Nom_prod,taille=:taille,couleur=:couleur,prix=:prix WHERE id_prod=:id_prod";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);

		$idd_prod=$produit->getid();
        $Nom_prod=$produit->getNom();
        $taille=$produit->getTaille();
        $couleur=$produit->getCouleur();
        $prix=$produit->getPrix();
        
		$datas = array(':idd_prod'=>$idd_prod, ':id_prod'=>$id_prod, ':Nom_prod'=>$Nom_prod,':taille'=>$taille,':couleur'=>$couleur,':prix'=>$prix);
		$req->bindValue(':idd_prod',$idd_prod);
		$req->bindValue(':id_prod',$id_prod);
		$req->bindValue(':Nom_prod',$Nom_prod);
		$req->bindValue(':taille',$taille);
		$req->bindValue(':couleur',$couleur);
		$req->bindValue(':prix',$prix);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererprod($id_prod){
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
	
	function rechercherListeprod($id_prod){
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
}

?>