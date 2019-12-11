<?php
include "../entity/SAVS.php";
include "../Core/SAV.php";

if(!empty($_POST['ref']))
{
    session_start();
    extract($_POST);
    $ref = strip_tags($_POST['ref']);
  try{
 $db = config::getConnexion();
  $db->exec('SET NAMES utf8');
  }

  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }

  $req = $db->prepare('SELECT id_commande FROM commande WHERE id_commande=:ref and  id_user=:user');

    $user=  $_SESSION['l'];
    $req->execute(array(':ref'=>$ref,':user'=>$user));

    $req->execute();

  if($req->rowCount()>0)
  {
    $status = 'succes';
    $message = 'referance de commande valide';
  }
  else
  {
    $status = 'error';
    $message = "vous n'avez pas de commande ayant cette reference, veuillez bien verifier votre commande";
  }

}
else
{
    $status = 'error';
    $message = 'referance de commande  invalid';
}
$data = array('status'=>$status, 'message'=>$message);

echo json_encode($data);

?>