<?PHP
include "commandeC.php";

 $c=new commandeC();
if (isset($_GET["id"])){
	$c->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimer_commande.html");</script>';


    echo '</script>';

}
else {echo"cannot get this page";}
?>