<?php

class Produit
{
		private $id_produit;
		private $nom;
		private $description;
		private $prix;
		private $image;
		

		public function __construct($id_produit,$nom,$description,$prix,$image)
		{
            $this->id_produit = $id_produit;
            $this->nom = $nom;
            $this->description = $description;
            $this->prix = $prix;
            $this->image = $image;
		}

		public function get_id_produit()
		{
			return $this->id_produit;
		}

		public function set_id_produit($id_produit)
		{
			$this->id_produit = $id_produit;
		}

		public function get_nom()
		{
			return $this->nom;
		}

		public function set_nom($nom)
		{
			$this->nom = $nom;
		}

		public function get_description()
		{
			return $this->description;
		}

		public function set_description($description)
		{
			$this->description = $description;
		}

		public function get_prix()
		{
			return $this->prix;
		}

		public function set_prix($prix)
		{
			$this->prix = $prix;
		}

		public function get_image()
		{
			return $this->image;
		}

		public function set_image($image)
		{
			$this->image = $image;
		}



}




?>