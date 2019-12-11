<?php
include "../../entity/categories.php";
include "../../core/categorie.php";
$c=new categorie();
$categories=$c->selectcategorie();
$colors=$c->selectcolor();
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
<?php
if (isset($_POST['modifier'])){


    $name = $_FILES['im']['name'];
    $target_dir = "../../front/uploads/";
    $target_file = $target_dir . basename($_FILES["im"]["name"]);
    move_uploaded_file($_FILES['im']['tmp_name'],$target_dir.$name);
    header('Location: modifier_prod.php');
}


?>




<?PHP
include "../../core/produit.php";



if (isset($_GET['id'])){
$info=new produit();
$result=$info->afficherproduit($_GET['id']);
foreach($result as $row){
$id=$row['ID'];
$nom=$row['name'];
$des=$row['description'];
$categorie=$row['categorie'];
$color=$row['color'];
$im=$row['image'];
$stock=$row['STOCK'];
$prix=$row['prix'];
$xs=$row['XS'];
$s=$row['S'];
$m=$row['M'];
$l=$row['L'];
$xl=$row['XL'];
$xxl=$row['XXL'];

?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget" >
                <form action="../../core/modifier.php" method="post" enctype='multipart/form-data' style=" position: relative; right: -150px;  width: 700px">
                    <br>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h1 class="text-white text-center"> UPDATE PRODUCT</h1>
                        </div>
                        <div class="col-12 col-md-9">
                            <label> NAME: </label>
                            <input type="text" id="name" name="n" value="<?PHP echo $nom ?>" class="form-control">
                            <br>
                        </div>


                        <div class="col-12 col-md-9">
                            <label>CATEGORIE</label>



                                <select class="myselect" style="width:200px;" name="categorie" id="categorie">
                                    <option value="<?PHP echo $categorie ?>">Selected:<?PHP echo $categorie ?></option><?php

                                    foreach($categories as $row1) { ?>

                                    <option value="<?PHP echo $row1['name'] ;?>">  <?PHP echo $row1['name'] ;}?></option>

                                </select>
                                <br>

                        </div>

                        <div class="col-12 col-md-9">
                            <br>
                            <label> DESCRIPTION: </label>
                            <input type="text" id="description" name="d" value="<?PHP echo $des ?>" class="form-control">
                            <br>
                        </div>
                        <div class="col-12 col-md-9">
                            <label>COLOR</label>



                            <select class="myselect" style="width:200px;" name="color" id="color">
                                <option value="<?PHP echo $color ?>">Selected:<?PHP echo $color ?></option><?php

                                foreach($colors as $row2) { ?>

                                <option value="<?PHP echo $row2['color'] ;?>">  <?PHP echo $row2['color'] ;}?></option>

                            </select>
                            <br>

                        </div>
                        <div class="col-12 col-md-9">
                            <br>

                            <label> PRIX: </label>
                            <input type="number" id="prix" name="prix" value="<?PHP echo $prix ?>" class="form-control">
                            <span id="error_price" class="text-danger"></span>
                        </div>
                        <div class="col-12 col-md-9">
                            <br>

                            <label> STOCK: </label>
                            <input type="number" id="stock" name="stock" value="<?PHP echo $stock ?>" class="form-control">
                            <br>
                        </div>

                        <div class="col-12 col-md-9">
                            <label>TAILLES:</label>
<br>
                            Xs:<input type="number"min=0 required value="<?PHP echo $xs ?>" name="xs"  id="xs">
                            S:<input type="number" min=0 required value="<?PHP echo $s ?>" name="s"  id="s">
                            <br>
                            M:<input type="number" min=0 required value="<?PHP echo $m ?>" name="m"  id="m">
                            L:<input type="number" min=0 required value="<?PHP echo $l ?>"name="l"  id="l">
                            <br>
                            XL:<input type="number" min=0 required value="<?PHP echo $xl ?>" name="xl"  id="xl">
                            XXL:<input type="number" min=0 required value="<?PHP echo $xxl ?>"name="xxl"  id="xxl">
                            <span id="error_q" class="text-danger"></span>
                        </div>
                        <td><input type="hidden" name="id" value="<?PHP echo $_GET['id'];?>"></td>
                        <div class="col-12 col-md-9">
                            <br>
                            <label for="images_input" class=" form-control-label">Images a choisir </label>
                            <input type="file" id="images_input" name="file"  onchange="readURL(this);" class="form-control-file"><br>
                            <img id="blah" src="#" alt="" />


                        </div>
                        <div class="col-12 col-md-9">

                            <label for="images_input" class=" form-control-label">Picture Already chosen</label><br>
                            <img height="55px" width="200px" src="../produits/<?php echo $row['image'];?>" />



                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm" type="submit" id="save" name="save" value="save" ><i class="fa fa-dot-circle-o"></i> Submit </button>
                                <tr>
                                    <td></td>

                                </tr>
                                <button class="btn btn-danger btn-sm" type="reset"   value="Reset" name="done"><i class="fa fa-ban"></i> Reset </button>
                            </div>
                        </div>
                    </div>
                </form>
                <?PHP
                }
                }
                ?>
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
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <script src="js/verifier_modification.js"></script>

</body>

</html>