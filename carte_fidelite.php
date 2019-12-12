<?php

class Carte_fidelite
{
		private $id_fidelite;
		private $id_client;
		private $total;
		

		public function __construct($id_client)
		{
			$this->id_client = $id_client;
		}

		public function get_id_fidelite()
		{
			return $this->id_fidelite;
		}

		public function set_id_fidelite($id_fidelite)
		{
			$this->id_fidelite = $id_fidelite;
		}

		public function get_id_client()
		{
			return $this->id_client;
		}

		public function set_id_client($id_client)
		{
			$this->id_client = $id_client;
		}

		public function get_total()
		{
			return $this->total;
		}

		public function set_total($total)
		{
			$this->total = $total;
		}

}




?>