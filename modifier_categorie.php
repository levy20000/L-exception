<?PHP
include "categorie.php";


        $c=new categorie();

	$c->modifiercategorie($_POST["id"],$_POST["n"]);

          sleep(5);

              echo '<script type=""> location.replace("succes_modification_categorie.html");</script>';


echo '</script>';
        









?>















