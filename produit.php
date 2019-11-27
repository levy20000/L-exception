<?PHP
class produit{
	private $id_prod;
	private $Nom_prod;
	private $taille;
	private $couleur;
	private $prix;
	
	function __construct($id_prod,$Nom_prod,$taille,$couleur,$prix){
		$this->id_prod=$id_prod;
		$this->Nom_prod=$Nom_prod;
		$this->taille=$taille;
		$this->couleur=$couleur;
		$this->prix=$prix;
	}
	
	function getid(){
		return $this->id_prod;
	}
	function getNom(){
		return $this->Nom_prod;
	}
	function getTaille(){
		return $this->taille;
	}
	function getCouleur(){
		return $this->couleur;
	}
	function getPrix(){
		return $this->prix;
	}
	function setid($id_prod){
		$this->id_prod=$id_prod;
	}
	function setNom($Nom_prod){
		$this->Nom_prod=$Nom_prod;
	}
	function setTaille($taille){
		$this->taille=$taille;
	}
	function setCouleur($couleur){
		$this->couleur=$couleur;
	}
	function setPrix($prix){
		$this->prix=$prix;
	}
	
}

?>