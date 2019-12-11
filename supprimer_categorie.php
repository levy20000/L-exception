<?PHP
include "categorie.php";

 $c=new categorie();
if (isset($_GET["id"])){
	$c->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimer_categorie.html");</script>';


    echo '</script>';

}
else {echo"cannot get this page";}
?>