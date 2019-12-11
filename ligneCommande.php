<?PHP

class commandeLigne
{
	private $id_commande;
	private $id_produit;
    private $nom_produit;
    private $quantite_produit;
    private $prix_produit;
	private $total;

    /**
     * commandeC constructor.
     * @param $id_commande
     * @param $id_produit
     * @param $nom_produit
     * @param $quantite_produit
     * @param $prix_produit
     * @param $total
     */
    public function __construct($id_commande, $id_produit, $nom_produit, $quantite_produit, $prix_produit, $total)
    {
        $this->id_commande = $id_commande;
        $this->id_produit = $id_produit;
        $this->nom_produit = $nom_produit;
        $this->quantite_produit = $quantite_produit;
        $this->prix_produit = $prix_produit;
        $this->total = $total;
    }


    /**
	 * @return mixed
	 */
	public function getIdCommande()
	{
		return $this->id_commande;
	}

	/**
	 * @param mixed $id_commande
	 */
	public function setIdCommande($id_commande)
	{
		$this->id_commande = $id_commande;
	}

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->id_produit;
    }

    /**
     * @param mixed $id_produit
     */
    public function setIdProduit($id_produit)
    {
        $this->id_produit = $id_produit;
    }

    /**
     * @return mixed
     */
    public function getNomProduit()
    {
        return $this->nom_produit;
    }

    /**
     * @param mixed $nom_produit
     */
    public function setNomProduit($nom_produit)
    {
        $this->nom_produit = $nom_produit;
    }

    /**
     * @return mixed
     */
    public function getQuantiteProduit()
    {
        return $this->quantite_produit;
    }

    /**
     * @param mixed $quantite_produit
     */
    public function setQuantiteProduit($quantite_produit)
    {
        $this->quantite_produit = $quantite_produit;
    }

    /**
     * @return mixed
     */
    public function getPrixProduit()
    {
        return $this->prix_produit;
    }

    /**
     * @param mixed $prix_produit
     */
    public function setPrixProduit($prix_produit)
    {
        $this->prix_produit = $prix_produit;
    }


	/**
	 * @return mixed
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * @param mixed $total
	 */
	public function setTotal($total)
	{
		$this->total = $total;
	}
	
}
