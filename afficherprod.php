<?PHP
include "../core/prod.php";
$prod1c=new produitc();
$listeproduits=$prod1c->afficherproduits();

//var_dump($listeEmployes->fetchAll());
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <div class="container">
  <div class="jumbotron">
   <center> <h1>Liste des Produits</h1></center>      
  </div>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Ref</th>
        <th>Nom</th>
        <th>Tailles</th>
        <th>Couleur</th>
        <th>Prix</th>
      </tr>
    </thead>
    <tbody>
    	<?PHP
foreach($listeproduits as $row){
	?>
      <tr>
  <td><?PHP echo $row['id_prod']; ?></td>
	<td><?PHP echo $row['Nom_prod']; ?></td>
	<td><?PHP echo $row['taille']; ?></td>
	<td><?PHP echo $row['couleur']; ?></td>
	<td><?PHP echo $row['prix']; ?></td>
	<td><form method="POST" action="supprimerprod.php">
	<button type="submit" name="supprimer" value="supprimer" class="btn btn-outline-danger">supprimer</button>
	<input type="hidden" value="<?PHP echo $row['id_prod']; ?>" name="id_prod">
	</form>
	</td>
	 
	<td><a button type="button" class="btn btn-outline-secondary" href="modifierprod.php?id_prod=<?PHP echo $row['id_prod']; ?>">Modifier</a></td>
	</tr>
  
	<?PHP
}
?>

 
</div>
<div>
  <form method="POST" action="ajoutprod.html">
  <button type="submit" name="ajout" value="ajout" class="btn btn-outline-success">Ajouter</button>
</div>
</body>
</html>

