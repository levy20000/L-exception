<?PHP
include "../../core/clientc.php";
$client1c=new clientc();
$listeclients=$client1c->afficherclients();
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
<?php include 'header.php' ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">

                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="container-fluid">
                            <div class="row">

                              <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>

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

    <td><?PHP echo $row['telephone_client']; ?></td>
  <td><?PHP echo $row['adresse_client']; ?></td>
  <td><?PHP echo $row['ville_client']; ?></td>
    <td><form method="POST" action="supprimerclient.php">
    <button type="submit" name="supprimer" value="supprimer" class="btn btn-outline-danger">supprimer</button>
    <input type="hidden" value="<?PHP echo $row['id_client']; ?>" name="id_client">
    </form>
    </td>
     
    <td><a button type="button" class="btn btn-outline-secondary" href="modifierclient1.php?id_client=<?PHP echo $row['id_client']; ?>">Modifier</a></td>
    </tr>
  
    <?PHP
}
?>

 
</div>
<div>
  <form method="POST" action="ajouterclient1.php">
  <button type="submit" name="ajout" value="ajout" class="btn btn-outline-success">Ajouter</button>
</div>



                            </div>
                       
                        </div>

                        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>