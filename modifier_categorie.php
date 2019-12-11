
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
include "../../entity/categories.php";
include "../../core/categorie.php";


if (isset($_GET['id'])){
$info=new categorie();
$result=$info->affichercategorie($_GET['id']);
foreach($result as $row){
$id=$row['id'];
$nom=$row['name'];

?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget" >
                <form action="../../core/modifier_categorie.php" method="post" enctype='multipart/form-data' style=" position: relative; right: -150px;  width: 700px">
                    <br>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h1 class="text-white text-center"> UPDATE CATEGORIE</h1>
                        </div>
                        <div class="col-12 col-md-9">
                            <label> NAME: </label>
                            <input type="text" id="name" name="n" value="<?PHP echo $nom ?>" class="form-control">
                            <br>
                            <td><input type="hidden" name="id" value="<?PHP echo $_GET['id'];?>"></td>
                        </div>

                            <div class="card-footer">
                                <button class="btn btn-primary btn-sm" type="submit" name="mod" value="mod" ><i class="fa fa-dot-circle-o"></i> Submit </button>
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
            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah')
                                .attr('src', e.target.result)
                                .width(200)
                                .height(55);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>

            <script>

                $(document).ready(function() {
                    var error_ref = '';

                    $('#save').click(function(){
                        var xs = $('#xs').val();
                        var s = $('#s').val();
                        var m = $('#m').val();
                        var l = $('#l').val();
                        var xl = $('#xl').val();
                        var xxl = $('#xxl').val();
                        var prix = $('#prix').val();
                        if (!(xs>0) || !(s>0) ||!(m>0)||!(l>0)||!(xl>0)||!(xxl>0)) {
                            error_qua = 'Invalid Quantity';
                            $('#error_q').text(error_qua);
                            return false;
                        }
                        else
                        {    error_qua = '';
                            $('#error_q').text(error_qua);}
                        if (!(prix>0)) {
                            error_p = 'Invalid Price';
                            $('#error_price').text(error_p);
                            return false;
                        }
                        else
                        {    error_p = '';
                            $('#error_price').text(error_p);}
                    });
                });


            </script>
            <script type="text/javascript">
                $(".myselect").select2({
                    placeholder: 'Select an option'
                });

            </script>

</body>

</html>