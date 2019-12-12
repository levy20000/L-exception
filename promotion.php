<?php

class Promotion
{
		private $id_prom;
		private $pourcentage;
		private $ID;
		private $date_debut;
		private $date_fin;
		

		public function __construct($pourcentage,$ID,$date_debut,$date_fin)
		{
            $this->pourcentage = $pourcentage;
            $this->ID = $ID;
            $this->date_debut = $date_debut;
            $this->date_fin = $date_fin;
		}

		public function get_id_prom()
		{
			return $this->id_prom;
		}

		public function set_id_prom($id_prom)
		{
			$this->id_prom = $id_prom;
		}

		public function get_ID()
		{
			return $this->ID;
		}

		public function set_ID($ID)
		{
			$this->ID = $ID;
		}

		public function get_pourcentage()
		{
			return $this->pourcentage;
		}

		public function set_pourcentage($pourcentage)
		{
			$this->pourcentage = $pourcentage;
		}

		public function get_date_debut()
		{
			return $this->date_debut;
		}

		public function set_date_debut($date_debut)
		{
			$this->date_debut = $date_debut;
		}

		public function get_date_fin()
		{
			return $this->date_fin;
		}

		public function set_date_fin($date_fin)
		{
			$this->date_fin = $date_fin;
		}



}




?>