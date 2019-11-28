



<?PHP
include "../core/clientc.php";
$client1c=new clientc();
$listeclients=$client1c->afficherclients();

//var_dump($listeEmployes->fetchAll());
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="afficherclient.php">Client</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Avis</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Produit</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Commande</a>
    </li>
  </ul>
</nav>

<!-- Black with white text -->

  <div class="container">
  <div class="jumbotron">
   <center> <h1>Les Client</h1></center> 
<table>   
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
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>MDP</th>
        <th>Telephone</th>
        <th>Adresse</th>
        <th>Ville</th>
      </tr>
    </thead>
    <tbody>
    	<?PHP
foreach($listeclients as $row){
	?>
      <tr>
	<td><?PHP echo $row['id_client']; ?></td>
	<td><?PHP echo $row['nom_client']; ?></td>
	<td><?PHP echo $row['prenom_client']; ?></td>
	<td><?PHP echo $row['mdp_client']; ?></td>
	<td><?PHP echo $row['telephone_client']; ?></td>
  <td><?PHP echo $row['adresse_client']; ?></td>
  <td><?PHP echo $row['ville_client']; ?></td>
	<td><form method="POST" action="supprimerclient.php">
	<button type="submit" name="supprimer" value="supprimer" class="btn btn-outline-danger">supprimer</button>
	<input type="hidden" value="<?PHP echo $row['id_client']; ?>" name="id_client">
	</form>
	</td>
	 
	<td><a button type="button" class="btn btn-outline-secondary" href="modifierclient.php?id_client=<?PHP echo $row['id_client']; ?>">Modifier</a></td>
	</tr>
  
	<?PHP
}
?>

 
</div>
<div>
  <form method="POST" action="ajoutclient.html">
  <button type="submit" name="ajout" value="ajout" class="btn btn-outline-success">Ajouter</button>
</div>
</body>
</html>

