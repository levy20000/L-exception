<?PHP
include "../entity/SAVS.php";
include "SAV.php";
session_start ();
if( !empty($_POST['ref']) && !empty($_POST['message'])  )
{
    $target_dir = "../views/SAV/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if(basename($_FILES["fileToUpload"]["name"]!=''))
    {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $sav=new SAVS( $_SESSION['l'],$_POST['ref'],$_POST['message'],basename($_FILES["fileToUpload"]["name"]));
                $s=new SAV();
                $s->ajouter2($sav);


                ?>
                <script type=""> location.replace("succes_ajout_sav.html");</script>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }}
    else if(basename($_FILES["fileToUpload"]["name"]==''))
    {
        $SA=new SAVS( $_SESSION['l'],$_POST['ref'],$_POST['message']);
        $s=new SAV();
        $s->ajouter1($SA);

        ?>
        <script type=""> location.replace("succes_ajout_sav.html");</script>
        <?php
    }}

?>