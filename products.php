<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
<?php include 'header.php' ?>

    <?php //include "../core/produit.php";
    include "../core/categorie.php";
    $p=new produit();
    $c=new categorie();
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
    $top =$p->top5();
    $categories =$c->selectcategorie();

    $count=ceil(($p->count())/6);


        ?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Categorie</h3>
						<ul class="list-links">
                            <?php    foreach ($categories as $row)  {?>
							<li><a href="productsbycategorie.php?categorie=<?php echo $row["name"] ; ?>"><?php echo $row["name"] ;} ?></a></li>


						</ul>
					</div>
					<!-- /aside widget -->
					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Top Rated Product</h3>
						<!-- widget product -->
                        <?php    foreach ($top as $row)  {?>
						<div class="product product-widget">
							<div class="product-thumb">
								<img  src="produits/<?php echo $row["image"]; ?>" alt="">
							</div>
							<div class="product-body">
								<h2 class="product-name"><a href="product_details?id=<?php echo $row["ID"] ; ?>"><?php echo $row["name"]; ?></a></h2>
								<h3 class="product-price"><?php echo $row["prix"]; ?> DT</h3>
								<div class="product-rating">
                                    <?php

                                    $idp=$row["ID"];
                                    $sql=" SELECT * from produit where (ID='$idp')";
                                    $db = config::getConnexion();
                                    $listnote=$db->query($sql);
                                    if($listnote->rowCount()) {
                                    foreach($listnote as $row1){
                                    for($i=0;$i<5;$i++){
                                    if($row1['note']>$i)
                                    {
                                    ?>  <td width="80%">
                                        <i class="fa fa-star"></i>
                                        <?php }else{ ?>
                                    <td>
                                        <i class="fa fa-star-o empty"></i>
                                        <?php }
                                        }}
                                        ?>
                                        <?php
                                        }
                                        else{
                                        for($i=0;$i<5;$i++){
                                        ?>
                                    <td>
                                        <i class="fa fa-star-o empty"> </i>
                                        <?php
                                        }} ?>
								</div>
							</div>
						</div>
                        <?php } ?>
					</div>

				</div>
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">

							</div>

						</div>
						<div class="pull-right">

							<ul class="store-pages">

                                <?php
                                if($count>1)
                                { ?>




                                <li><span class="text-uppercase">Page:</span></li>
                                <?php
                                    for($i=1;$i<=$count;$i++) {
                                        if($i==$page)
                                        { echo "<li> <a style='color: orangered' href='products.php?page={$i}'>{$i}</a> </li>  " ; }
                                        else {  echo "<li> <a href='products.php?page={$i}'>{$i}</a> </li>  " ;}

                                    } }
                                ?>


							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->

						<div class="row">
							<!-- Product Single -->
                            <?php    foreach ($result as $row)  {?>
							<div class="col-md-4 col-sm-6 col-xs-6">

								<div class="product product-single">
									<div class="product-thumb">

										<button  onclick="location.href='product_details?id=<?php echo $row["ID"] ; ?>'" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img  style="width: 250px; height: 200px" src="produits/<?php echo $row["image"]; ?>" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price"><?php echo $row["prix"];?> DT</h3>
										<div class="product-rating">
                                            <?php

                                            $idp=$row["ID"];
                                            $sql=" SELECT * from produit where (ID='$idp')";
                                            $db = config::getConnexion();

                                            $listnote=$db->query($sql);



                                            if($listnote->rowCount()) {

                                            foreach($listnote as $row1){

                                            for($i=0;$i<5;$i++){
                                            if($row1['note']>$i)
                                            {
                                            ?>  <td width="80%">
                                                <i class="fa fa-star"></i>


                                                <?php }else{ ?>


                                            <td>
                                                <i class="fa fa-star-o empty"></i>
                                                <?php }


                                                }}
                                                ?>
                                                <?php
                                                }

                                                else{

                                                for($i=0;$i<5;$i++){
                                                ?>
                                            <td>
                                                <i class="fa fa-star-o empty"> </i>


                                                <?php

                                                }
                                                }  ?>
										</div>
										<h2 class="product-name"><a href="product_details?id=<?php echo $row["ID"] ; ?>"><?php echo $row["name"];?></a></h2>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<button class="primary-btn add-to-cart" onclick="addToCart('<?php echo $row["ID"] ; ?>','<?php echo $row["name"] ; ?>','<?php echo $row["prix"] ; ?>')"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</div>
									</div>
								</div>

							</div>
                            <?php } ?>
							<!-- /Product Single -->



						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">

							</div>

						</div>
						<div class="pull-right">

							<ul class="store-pages">

                                <?php
                                if($count>1)
                                { ?>
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <?php
                                    for($i=1;$i<=$count;$i++) {
                                        if($i==$page)
                                        { echo "<li > <a style='color: orangered'  href='products.php?page={$i}'>{$i}</a> </li>  " ; }
                                        else {  echo "<li> <a href='products.php?page={$i}'>{$i}</a> </li>  " ;}

                                    } }
                                ?>

                            </ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
    <script>
        function addToCart(id,name,prix) {
            obj = {
                'id':id,
                'name':name,
                'prix':prix,
                'quantite' : 1
            }
            console.log(obj);
            request = $.ajax({
                url: "../core/addToCart.php",
                type: "post",
                data: {data: [obj]}
            });

// callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // log a message to the console
                console.log(response);
                alert('l\'article ' + name + 'à été ajouté au panier');
               $('#mycart').load("cartreload.php");
            });

// callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // log the error to the console
                console.error(
                    "The following error occured: "+
                    textStatus, errorThrown
                );
            })
        }
        function removeFromCart(id) {
            obj = {
                'id':id
            }
            console.log(obj);
            request = $.ajax({
                url: "../core/deleteFromCart.php",
                type: "post",
                data: {data: [obj]}
            });

// callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR){
                // log a message to the console
                console.log(response);
                alert('l\'article ' + name + 'à été supprimé du panier');
                $('#mycart').load("cartreload.php");
            });

// callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown){
                // log the error to the console
                console.error(
                    "The following error occured: "+
                    textStatus, errorThrown
                );
            })
        }
    </script>
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
