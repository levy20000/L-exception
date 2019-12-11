<?PHP

class commande
{
	private $id_commande;
	private $id_client;
	private $total;

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
	public function getIdClient()
	{
		return $this->id_client;
	}

	/**
	 * @param mixed $id_client
	 */
	public function setIdClient($id_client)
	{
		$this->id_client = $id_client;
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
