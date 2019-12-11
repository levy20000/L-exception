<?PHP

include "../entity/produits.php";
include "produit.php";

$target_dir = "../views/produits/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["but_upload"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["file"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";

    $uploadOk = 0;


}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

     
    $uploadOk = 0;

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

     $p=new produit();

    $p->modifierProd2($_POST["n"],$_POST["d"],$_POST["color"],$_POST["prix"],$_POST["stock"],$_POST["categorie"],$_POST["id"],$_POST["xs"],$_POST["s"],$_POST["m"],$_POST["l"],$_POST["xl"],$_POST["xxl"]);
               
              echo '<script type=""> location.replace("succes_modification.html");</script> ';


echo '</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

    $var=basename( $_FILES["file"]["name"]);


        $p=new produit();

	$p->modifierProd($_POST["n"],$_POST["d"],$_POST["color"],$_POST["prix"],$_POST["stock"],$var,$_POST["categorie"],$_POST["id"],$_POST["xs"],$_POST["s"],$_POST["m"],$_POST["l"],$_POST["xl"],$_POST["xxl"]);
          sleep(5);

              echo '<script type=""> location.replace("succes_modification.html");</script> ';


echo '</script>';
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}







?>















