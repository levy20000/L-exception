<?php
include 'config.php';
if(!empty($_POST['email']))
{
  $regex = " /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
if (preg_match($regex, $_POST['email']))
{
  extract($_POST);
  $email = strip_tags($_POST['email']);
  try{
 $db = config::getConnexion();
  $db->exec('SET NAMES utf8');
  }

  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }

    $req = $db->prepare('SELECT id_client FROM client WHERE adresse_client=:email');
    $req->execute(array(':email'=>$email));
  if($req->rowCount()>0)
  {
    $status = 'error';
    $message = ' email address has already been used';
  }
  else
  {
    $status = 'success';
    $message = 'email address available';
  }

}
else
{
    $status = 'error';
    $message = 'invalid email address ';
}
}
else
{
  $status = 'error';
  $message = 'invalid email address';
}

$data = array('status'=>$status, 'message'=>$message);

echo json_encode($data);

?>