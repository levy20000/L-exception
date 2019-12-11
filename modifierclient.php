<HTML>
<head>
	<title>Modifier Client</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?PHP
include "../../entity/client.php";
include "../../core/clientc.php";

if (isset($_GET['id_client'])){
	$clientc=new clientc();
    $result=$clientc->recupererclient($_GET['id_client']);
	foreach($result as $row){
		$nom_client=$row['nom_client'];
		$prenom_client=$row['prenom_client'];
		$mdp_client=$row['mdp_client'];
		$telephone_client=$row['telephone_client'];
    $adresse_client=$row['adresse_client'];
    $ville_client=$row['ville_client'];
?>
<form method="POST">
   <div class="container">
  <div class="jumbotron">
   <center> <h1>Modifier Client</h1></center> 
<table>



 <form action="/action_page.php">
    
    <div class="form-group">
      <label for="usr">Nom:</label>
      <input type="text" class="form-control" id="usr" name="nom_client" value="<?PHP echo $nom_client ?>">
    </div>
    <div class="form-group">
      <label for="usr">Prenom:</label>
      <input type="text" class="form-control" id="usr" name="prenom_client"value="<?PHP echo $nom_client ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Mot De Passe:</label>
      <input type="password" class="form-control" id="pwd" name="mdp_client"value="<?PHP echo $mdp_client ?>">
    </div>
    <div class="form-group">
      <label for="usr">Telephone:</label>
      <input type="number" class="form-control" id="usr" name="telephone_client"value="<?PHP echo $telephone_client ?>">
    </div>
    <div class="form-group">
      <label for="usr">Adresse:</label>
      <input type="text" class="form-control" id="usr" name="adresse_client"value="<?PHP echo $adresse_client ?>">
    </div>
    <div class="form-group">
      <label for="usr">Ville:</label>
      <input type="text" class="form-control" id="usr" name="ville_client"value="<?PHP echo $ville_client ?>">
    </div>
    <input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_client'];?>">
    <button type="submit" name="modifier" value="modifier"class="btn btn-outline-secondary">Modifier</button>

      
</form>

<?PHP
	}
}
if (isset($_POST['modifier'])){
	$client=new client($_POST['nom_client'],$_POST['prenom_client'],$_POST['mdp_client'],$_POST['telephone_client'],$_POST['adresse_client'],$_POST['ville_client']);
	$clientc->modifierclient($client,$_POST['id_ini']);
	echo $_POST['id_ini'];
}
?>
<form method="POST" action="afficherclient.php">
             <button type="submit" name="retour" value="retour" class="btn btn-outline-success">Retour</button>
      </form>
</body>
</HTMl>