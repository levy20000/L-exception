<?PHP
include_once "config.php";
include "produit.php";
session_start();
$idc=$_GET['id'];
$note=$_GET['note'];
$produit=$_GET['produit'];
if(isset($_GET['id']) ) {

    $sql = " SELECT * from note where (id_client='$idc' and  id_prod=$produit)";
    $db = config::getConnexion();
    $listnote = $db->query($sql);
    if ($listnote->rowCount() == 0) {
      $p=new produit();
      $p->note($note,$idc,$produit);
        $p->AVG($produit);
      header("location:" . $_SERVER['HTTP_REFERER']);
    } else {



            $p=new produit();
            $p->updatenote($note,$idc,$produit);
            $p->AVG($produit);

            header("location:" . $_SERVER['HTTP_REFERER']);

    }}
?>