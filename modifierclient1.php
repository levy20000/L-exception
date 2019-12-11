
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
<?PHP
include "../../entity/client.php";
include "../../core/clientc.php";

if (isset($_GET['id_client'])){
    $clientc=new clientc();
    $result=$clientc->recupererclient($_GET['id_client']);
    foreach($result as $row){
        $id_client=$row['id_client'];
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
      <label for="usr">ID:</label>
      <input type="number" class="form-control" id="usr" name="id_client" value="<?PHP echo $id_client ?>">
    </div>
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
    $mdp_client=$_POST['mdp_client'];


    $password = hash('sha512', $mdp_client);
    $client=new client($_POST['nom_client'],$_POST['prenom_client'],$password,$_POST['telephone_client'],$_POST['adresse_client'],$_POST['ville_client']);
    $clientc->modifierclient($client,$_POST['id_ini']);
    echo $_POST['id_ini'];
   ?>
    <script type="text/javascript">
       window.location.replace('client.php');
   </script> 
   <?PHP
}
?>
<form method="POST" action="client.php">
             <button type="submit" name="retour" value="retour" class="btn btn-outline-success">Retour</button>
      </form>


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