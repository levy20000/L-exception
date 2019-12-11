<?PHP
class client{
	private $id_client;
	private $nom_client;
	private $prenom_client;
	private $mdp_client;
	private $telephone_client;
	private $adresse_client;
	private $ville_client;
	function __construct($nom_client,$prenom_client,$mdp_client,$telephone_client,$adresse_client,$ville_client){

		$this->nom_client=$nom_client;
		$this->prenom_client=$prenom_client;
		$this->mdp_client=$mdp_client;
		$this->telephone_client=$telephone_client;
		$this->adresse_client=$adresse_client;
		$this->ville_client=$ville_client;
	}
	
	function getid(){
		return $this->id_client;
	}
	function getNom(){
		return $this->nom_client;
	}
	function getPrenom(){
		return $this->prenom_client;
	}
	function getmdp(){
		return $this->mdp_client;
	}
	function gettelephone(){
		return $this->telephone_client;
	}
	function getadresse(){
		return $this->adresse_client;
	}
	function getville(){
		return $this->ville_client;
	}

	function setNom($nom_client){
		$this->nom_client=$nom_client;
	}
	function setPrenom($prenom_client){
		$this->prenom_client;
	}
	function setmdp($mdp_client){
		$this->mdp_client=$mdp_client;
	}
	function settelephone($telephone_client){
		$this->telephone_client=$telephone_client;
	}
	function setadresse($adresse_client){
		$this->adresse_client=$adresse_client;
	}
	function setville($ville_client){
		$this->ville_client=$ville_client;
	}
	
}

?>