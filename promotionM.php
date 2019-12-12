<?php


require_once '../../config.php';
require_once '../../entitites/promotion.php';

class PromotionM
{
	
	public function ajoutPromotion(Promotion $promotion)
	{
			$db = config::getConnexion();
		$re = "INSERT INTO promotion (pourcentage, id_produit, date_debut, date_fin) VALUES (:pourcentage, :id_produit, :date_debut, :date_fin)";
	
		$sql = $db->prepare($re);
			$sql->bindvalue(":pourcentage", $promotion->get_pourcentage());
			$sql->bindvalue(":id_produit",$promotion->get_id_produit());
			$sql->bindvalue(":date_debut", $promotion->get_date_debut());
			$sql->bindvalue(":date_fin",$promotion->get_date_fin());
		


			try{
            $sql->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}



	 public function getPromotions()
    {
    	$db=config::getConnexion();
    	$req="SELECT * FROM promotion;";
    	$sql=$db->query($req);
    	return $sql;
    }
    



    	function supprimerPromotion($id_prom)
    {
		$sql="DELETE FROM promotion where id_prom= :id_prom";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_prom',$id_prom);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}



   	    function modifierPromotion($promotion,$code)
   	 {
		$sql="UPDATE promotion SET codePromo=:codee, pourcentage=:pourcentage WHERE codePromo='$code'";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

        $req=$db->prepare($sql);
		$codee=$promotion->get_code();
        $pourcentage=$promotion->get_pourcentage();
     

		$datas = array(':codee'=>$codee, ':code'=>$code, ':pourcentage'=>$pourcentage);
		$req->bindValue(':codee',$codee);
		//$req->bindValue(':code',$code);
		$req->bindValue(':pourcentage',$pourcentage);


		
		
            if($req->execute())
            {
               echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";
                 
            }
			
       else
       {
       echo "<meta http-equiv=\"refresh\";URL=ListeDesPromotions.php\">";
       }
		
	}



		function recupererPromotion($code)
	{
		$db=config::getConnexion();
    	$req="SELECT * FROM promotion WHERE codePromo= '$code'";
    	$sql=$db->query($req);
    	
    	return $sql;
    	//return $sql;
	}
 

}


 ?>