<?PHP

class produits
{
private $ID;
private $name;
private $categorie;
private  $color;
private $description;
private  $etat;
private  $stock;
private  $image;
private  $prix;
private $xs;
private $s;
private $m;
private $l;
private $xl;
private $xxl;


    public function __construct($name, $categorie,$color, $prix, $description, $image, $xs, $s, $m, $l, $xl, $xxl)
    {
        $this->name = $name;
        $this->categorie = $categorie;
        $this->prix = $prix;
        $this->description = $description;
        $this->color= $color;

        $this->image = $image;
        $this->xs = $xs;
        $this->s = $s;
        $this->m = $m;
        $this->l = $l;
        $this->xl = $xl;
        $this->xxl = $xxl;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getEtat()
    {
        return $this->etat;
    }


    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


    public function getStock()
    {
        return $this->stock;
    }


    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix=$prix;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getXs()
    {
        return $this->xs;
    }


    public function setXs($xs)
    {
        $this->xs = $xs;
    }


    public function getS()
    {
        return $this->s;
    }


    public function setS($s)
    {
        $this->s = $s;
    }


    public function getM()
    {
        return $this->m;
    }

    public function setM($m)
    {
        $this->m = $m;
    }


    public function getL()
    {
        return $this->l;
    }


    public function setL($l)
    {
        $this->l = $l;
    }


    public function getXl()
    {
        return $this->xl;
    }

    public function setXl($xl)
    {
        $this->xl = $xl;
    }


    public function getXxl()
    {
        return $this->xxl;
    }


    public function setXxl($xxl)
    {
        $this->xxl = $xxl;
    }


}



?>