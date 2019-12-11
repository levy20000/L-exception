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

                                <table id="mytable" class="table table-bordred table-striped">

                                    <thead>
                                    <th width="11%">ID</th>
                                    <th width="11%">NAME</th>
                                    <th width="11%">CATEGORIE</th>
                                    <th width="11%">COLOR</th>
                                    <th width="11%">DESCRIPTION</th>
                                    <th width="11%">IMAGE</th>
                                    <th width="11%">CONDITION</th>

                                    <th width="11%">PRICE</th>
                                    <th width="11%">STOCK</th>

                                    <th width="17%">UPDATE</th>
                                    <th width="11%">DELETE</th>
                                    </thead>

                                    <?php include "../../core/produit.php";
                                    $p=new produit();
                                    if(isset($_GET['page'])) {
                                        $page=$_GET['page'];
                                    } else {
                                        $page="";
                                    }
                                    if($page == "" || $page ==1) {
                                        $page_1 =0 ;
                                    } else {
                                        $page_1=($page*6)-6;
                                    }
                                    $result =$p->afficher($page_1);

                                    $count=ceil(($p->count())/6);


                                        ?>
                                        <a class="btn btn-sm btn-primary" href="ajoutproduit" name="ADD" value="ADD"><i class="fa fa-plus-circle"></i> ADD NEW PRODUCT </a>
                                        <tbody id="myTable">
                                        <?php       foreach ($result as $row)

                                    { ?>
                                    <tr>


                                        <td class="ID" data-id7="1" ><?php echo $row["ID"];?></td>
                                        <td class="text" data-id7="1" ><?php echo $row["name"];?> </td>
                                        <td class="text" data-id18="1" ><?php echo $row["categorie"];?></td>

                                        <td class="text" data-id5="1" ><?php echo $row["color"];?></td>
                                        <td class="text" data-id5="1" ><?php echo $row["description"];?></td>
                                        <td> <img  id="output2" style="  height:70px  ;width:110px ;   " src="../produits/<?php echo $row["image"]?>"/> </td>
                                        <td class="text" data-id5="1" ><?php echo $row["ETAT"]?></td>

                                        <td class="text" data-id5="1" ><?php echo$row["prix"]?></td>


                                        <td><?php echo $row["STOCK"] ?>

                                        </td>



                                        <td><form action="modifier_prod.php">

                                                <button class="btn btn-sm btn-success" type="submit" name="modifier" value="modifier"> <i class="fa fa-pencil"> </i> Update </button>

                                                <input type="hidden" value="<?php echo $row['ID'];?>" name="id">
                                                <input type="hidden" value="<?php echo $row['image'];?>" name="image">
                                            </form>

                                        </td>




                                        <td>
                                            <form  action="../../core/supprimer_prod.php">
                                                <button class="btn btn-sm btn-danger" type="submit" id="supprimer" name="supprimer" value="supprimer"><i class="fa fa-trash"></i> Delete </button>

                                                <input type="hidden" id="id" value="<?php echo $row['ID']; ?>" name="id" >
                                            </form>
                                        </td>




                                    </tr>
                                    </tbody>
                                    <?php } ?>


                                </table>



                            </div>
                            <div>
                                <ul class="pagination">
                                    <?php
                                    if($count>1)
                                    {
                                        for($i=1;$i<=$count;$i++) {
                                            if($i==$page)
                                            { echo "<li> <a style='   background: midnightblue ; width: 10px' href='produits.php?page={$i}'>{$i}</a> </li>  " ; }
                                            else {  echo "<li> <a href='produits.php?page={$i}'>{$i}</a> </li>  " ;}

                                        } }
                                    ?>

                                </ul>
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