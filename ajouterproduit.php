<?php
include "../entity/produits.php";
include "produit.php";

if(isset($_POST['but_upload']) and isset($_POST['nom']) and isset($_POST['prix']) and isset($_POST['des'])and isset($_POST['categorie'])) {
    $target_dir = "../views/produits/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (basename($_FILES["fileToUpload"]["name"] != '')) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $produits = new produits($_POST["nom"],$_POST["categorie"],$_POST["color"],$_POST["prix"],$_POST["des"], basename($_FILES["fileToUpload"]["name"]),$_POST["xs"],$_POST["s"],$_POST["m"],$_POST["l"],$_POST["xl"],$_POST["xxl"]);
                $produit = new produit();
                $produit->ajouterproduit($produits);


                ?>
                <script type=""> location.replace("succes_ajout.html");</script>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

}
else {
    echo "Sorry, there was an error uploading your file.";
}
?>