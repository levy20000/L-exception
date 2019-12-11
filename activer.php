<?php  

include "clientc.php";
if(isset($_GET['activation_code']))
{
	 $client=new clientc();
	 $info=$client->afficherclients($_GET['activation_code']);

foreach($info as $row){
if($row['EmailConfirmed']==1)
{
	session_start();
	    $_SESSION['l']= $row['adresse_client'];
    $_SESSION['p']=$row['mdp_client'];
     $_SESSION['ID']=$row['id_client'];
			      ?>
      <script language="javascript">
location.replace("../views/products.php");

</script>
<?PHP 
} 
else {

 
$msg=$client->activer($_GET['activation_code']);
	if($msg='ok')  
	{  
		session_start();
        $_SESSION['l']= $row['adresse_client'];
        $_SESSION['p']=$row['mdp_client'];
        $_SESSION['ID']=$row['id_client'];

		      ?>
      <script language="javascript">
 location.replace("alert_succes.html");
</script>
<?PHP 
	}  
	else 
	{
		echo 'error';
	}
}
} }
else{echo 'error2' ; } 
 ?>



