<HTML>
<head>
	<title>Modifier Produit</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?PHP
include "../entities/produit.php";
include "../core/prod.php";

if (isset($_GET['id_prod'])){
	$produitc=new produitc();
    $result=$produitc->recupererprod($_GET['id_prod']);
	foreach($result as $row){
		$id_prod=$row['id_prod'];
		$Nom_prod=$row['Nom_prod'];
		$taille=$row['taille'];
    $couleur=$row['couleur'];
    $prix=$row['prix'];
?>
<form method="POST">
	<div class="container">
  <center><h2>Modifier Produit</h2></center>
<table>



 <form action="/action_page.php">
  <div class="form-group">
      <label for="usr">Reference produit:</label>
      <input type="text" class="form-control" id="usr" name="id_prod" value="<?PHP echo $id_prod ?>">
    </div>
    <div class="form-group">
      <label for="usr">Nom du produit:</label>
      <input type="text" class="form-control" id="usr" name="Nom_prod" value="<?PHP echo $Nom_prod ?>">
    </div>
    <div class="form-group">
      <label for="usr">les tailles:</label>
      <input type="text" class="form-control" id="usr" name="taille" value="<?PHP echo $taille ?>">
    </div>
    <div class="form-group">
      <label for="usr">couleur :</label>
      <input type="text" class="form-control" id="usr" name="couleur"value="<?PHP echo $couleur ?>">
    </div>
     <div class="form-group">
      <label for="usr">prix:</label>
      <input type="number" class="form-control" id="usr" name="prix"value="<?PHP echo $prix ?>">
    </div>
    <input type="hidden" name="id_ini" value="<?PHP echo $_GET['id_prod'];?>">
    <button type="submit" name="modifier" value="modifier"class="btn btn-outline-secondary">Modifier</button>

      
</form>

<?PHP
	}
}
if (isset($_POST['modifier'])){
	$produit=new produit($_POST['id_prod'],$_POST['Nom_prod'],$_POST['taille'],$_POST['couleur'],$_POST['prix']);
	$produitc->modifierprod($produit,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherprod.php');
}
?>
<form method="POST" action="afficherprod.php">
             <button type="submit" name="retour" value="retour" class="btn btn-outline-success">Retour</button>
      </form>
</body>
</HTMl>