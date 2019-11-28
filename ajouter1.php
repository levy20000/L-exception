<html>
<head>
  <title>
   L'EXCEPTION : Create an account
  </title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link href="css1/main.css" rel="stylesheet" media="all">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

 <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css3/main.css" rel="stylesheet" media="all">

    <script type="text/javascript"  src="ajouter1.js"></script>
</head>
<body>







    <div class="page-wrapper bg-dark p-t-100 p-b-50" style="padding-top:100px;">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                
  <div class="jumbotron">
   <center> <h1>Bienvenue</h1></center> 
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" action="ajouter1.php" name="form" onsubmit="return validate();">
                        
                     
                        <div class="form-row">
                            <div class="name">Nom</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="nom_client" id="nom"placeholder="Nom" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Prenom</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="prenom_client"id="prenom" placeholder="Prenom" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Mot de passe</div>
                            <div class="value">
                                <input class="input--style-6" type="password" name="mdp_client" id="mdp" placeholder="Mot de passe" required>
                            </div>
                        </div>
                       <div class="form-row">
                            <div class="name">Confirmer Mot de passe</div>
                            <div class="value">
                                <input class="input--style-6" type="password" name="map_client" id="map" placeholder="Confirmer Mot de passe" required>
                            </div>
                        </div>
                      
                        <div class="form-row">
                            <div class="name">Telephone</div>
                            <div class="value">
                                <input class="input--style-6" type="number" name="telephone_client" id="telephone" placeholder="+216..." required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Adresse</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="adresse_client" id="adresse" placeholder="Adresse" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Ville</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="ville_client" id="ville" placeholder="ville" required>
                                </div>
                            </div>
                        </div>
                        <br>
                       <center> <div >
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="bouton" >Ajouter</button>
                </div></center>
<br>
                   <center> </form>
               <form method="POST" action="index.php">
             <button type="submit" name="retour" value="retour" class="btn btn--radius-2 btn--blue-2">Retour</button>
      </form></center>
                <div>
                <p>NB: il faut remplir tout le formulaire!!!</p>
              </div>

            </div>
        </div>
    </div>
</div>
    

    <?php
      if (  isset($_POST['nom_client']) AND isset($_POST['prenom_client'])AND isset($_POST['mdp_client']) AND isset($_POST['bouton']) AND isset($_POST['telephone_client'])AND isset($_POST['adresse_client'])AND isset($_POST['ville_client']))
      
      {
         
        
        
          
           $link = mysqli_connect("localhost", "root", "", "projt")or die("Impossible de se connecter : " . mysqli_error());
         
        // Check connection
        if($link === false)
        {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
         
         $nom_client=$_POST['nom_client'];
         $prenom_client=$_POST['prenom_client'];
         $mdp_client=$_POST['mdp_client'];
         //$map=$_POST['map'];
         $telephone_client=$_POST['telephone_client'];
         $adresse_client=$_POST['adresse_client'];
         $ville_client=$_POST['ville_client'];

         $sql="insert into client (nom_client,prenom_client,mdp_client,telephone_client,adresse_client,ville_client) VALUES ('$nom_client','$prenom_client','$mdp_client','$telephone_client','$adresse_client','$ville_client')";
            if(mysqli_query($link, $sql))
                {
                    //header('Location: index.php');
                ?>

                <script type="text/javascript">
                    alert("succeesfully posted");
                </script>    
                <?php 
                 

                } 
            else
                {
                ?>
                 
                <?php 
                                      echo "Error: " .$sql. "<br>" . mysqli_error($link)."\n";

                    
                }
                    // Close connection
        mysqli_close($link);



        


      }
      else if ((!(isset($_POST['nom_client'])) OR !(isset($_POST['prenom_client']))OR !(isset($_POST['mdp_client']))  OR !(isset($_POST['telephone_client']))OR !(isset($_POST['adresse_client']))OR !(isset($_POST['ville_client'])))  AND isset($_POST['bouton']))
      
      {
        ?>



        <script type="text/javascript">
                   alert("3amar  formulaire");
                </script>




        <?php

      }
      
      
      

      ?>



<!-- Footer -->


<!----- fin cards ----------->
    <!-- Vendor JS-->
        <script src="vendor/jquery/jquery.min.js"></script>
         <script src="vendor1/jquery/jquery.min.js"></script>
    <script src="js1/global.js"></script>

    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
<script type="text/javascript" src="picker.js"></script>
<script type="text/javascript" src="picker.date.js"></script>
<script type="text/javascript" src="picker.time.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/global.js"></script>

</body>
</html>