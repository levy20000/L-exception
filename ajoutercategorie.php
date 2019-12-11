<?php
include "../entity/categories.php";
include "categorie.php";

if(isset($_POST['but_upload']) and isset($_POST['nom'])) {

                $categories = new categories($_POST["nom"]);
                $categorie = new categorie();
                $categorie->ajoutercategorie($categories);

?>
<script type=""> location.replace("succes_ajout_categorie.html");</script>
<?php

            } else {
                echo "Sorry, there was an error ";
            }



?>