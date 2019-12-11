<?php
include "../../entity/categories.php";
include "../../core/categorie.php";
$c=new categorie();
$info=$c->selectcategorie();
$color=$c->selectcolor();
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
                    <div class="ecommerce-widget" >
                        <div class="container-fluid">
                            <div class="row">


                                <form method="post" action="../../core/ajouterproduit.php" enctype='multipart/form-data' style=" position: relative; right: -150px;  width: 700px">
                                    <br>
                                    <div class="card">

                                        <div class="card-header bg-dark">
                                            <h1 class="text-white text-center">  ADD PRODUCT </h1>
                                        </div><br>


                                        <div class="col-12 col-md-9">
                                            <label>Name:</label>
                                            <input type="text" required name="nom" class="form-control" id="nome"><br>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label>Categorie</label>
                                            <?php if ($info->rowCount()>0) { ?>
                                                <select class="myselect" style="width:200px;" name="categorie" id="categorie"> <?php
                                                    foreach($info as $row) { ?>

                                                    <option value="<?PHP echo $row['name'] ;?>">  <?PHP echo $row['name'] ;}?></option>

                                                </select>
                                                <br>
                                            <?php } else { ?>  <h4 style="color:#ff004a">you have no category </h4>    <?php } ?>
                                            <br>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label>DESCRIPTION:</label>
                                            <textarea type="text" name="des" required class="form-control" id="des"> </textarea> <br>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <label>COLOR</label>
                                            <?php if ($color->rowCount()>0) { ?>
                                                <select class="myselect" style="width:200px;" name="color" id="color"> <?php
                                                    foreach($color as $row) { ?>

                                                    <option value="<?PHP echo $row['color'] ;?>">  <?PHP echo $row['color'] ;}?></option>

                                                </select>
                                                <br>
                                            <?php } else { ?>  <h4 style="color:#ff004a">you have no color </h4>    <?php } ?>
                                            <br>
                                        </div>

                                        <div class="col-12 col-md-9">
                                            <label>TAILLES:</label>

                                            <br>
                                            <input type="number" min=0 required  placeholder="xS" name="xs"  id="xs">
                                            <input type="number" min=0 required  placeholder="S" name="s"  id="s">
                                            <input type="number" min=0 required placeholder="M" name="m"  id="m">
                                            <input type="number" min=0 required  placeholder="L"name="l"  id="l">
                                            <input type="number"  min=0 required  placeholder="XL" name="xl"  id="xl">
                                            <input type="number" min=0  required  placeholder="XXL"name="xxl"  id="xxl">
                                            <span id="error_q" class="text-danger"></span>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <br>
                                            <label>PRIX:</label>
                                            <input style="width: 200px" required type="number" name="prix" class="form-control" id="prix">
                                            <span id="error_price" class="text-danger"></span>
                                            <br>
                                        </div>

                                        <div class="col-12 col-md-9">
                                            <label for="images_input" class=" form-control-label">Images </label>
                                            <input type="file" required id="images_input" name="fileToUpload" onchange="readURL(this);" class="form-control-file"><br>
                                            <img id="blah" src="#" alt="" />


                                        </div>

                                        <br>
                                        <div class="card-footer">
                                            <?php if ($info->rowCount()<=0) { ?>
                                                <input type="submit"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal2"  value="Envoyer" id="button-blue" name="button-blue"/>
                                            <?php } else if ($color->rowCount()<=0) { ?>  <input type="submit"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal3"  value="Envoyer" id="button-blue" name="button-blue"/>
                                            <?php }  else {  ?>   <button type='submit' id ="save"  value='Save name' name='but_upload'  class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i>Submit</button>
                                            <?php }?>
                                            <button class="btn btn-danger btn-sm" type="reset" name="done"><i class="fa fa-ban"></i> Reset </button><br>
                                        </div>
                                    </div>
                                </form>

                        </div>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <h4 style="color: red">you must add at least one category to continue
                                        <a href="ajoutcategorie.php" >add new categorie ..</a>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <h4 style="color: red">you must add at least one color to continue

                                        </h4>
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
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                    <script src="js/verifier.js"></script>
</body>
 
</html>