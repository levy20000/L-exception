<?php


require_once '../../config.php';
require_once '../../entitites/produit.php';

class ProduitM
{
	public function getProduits()
    {
    	$db=config::getConnexion();
    	$req="SELECT * FROM produit p";
    	$sql=$db->query($req);
    	return $sql;
    }

	public function getProduit($code)
	{
		$db=config::getConnexion();
    	$req="SELECT * FROM produit WHERE id_produit= '$code'";
    	$sql=$db->query($req);
    	
    	return $sql->fetch();
	}
 

}


 ?>