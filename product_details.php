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
<style>
    *{
        user-select:none;
    }
    .wrapper{
        overflow:hidden;
        padding:10%;
    }


    .image-zoom-available{
        cursor: zoom-in;
    }
    .image-zoom-available.is-active{
        cursor: none;
    }
</style>
    <script src="js/image.js"></script>
</head>

<body>
<?php include 'header.php' ?>

   <?php include "../core/produit.php";
   $p=new produit();
       $result =$p->afficherproduit($_GET['id']);
   while($row = $result->fetch()  ){
?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Category</a></li>
				<li class="active"><?php echo $row["name"] ; ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
                                <div class="wrapper">
                                    <img height="450px" width="400px" class="image-zoom-available"  src="produits/<?php echo $row["image"] ; ?>" draggable=false>


                                </div>

							</div>
						</div>

					</div>
                    <div class="col-md-6">

                        <div class="col-xs-12">

                        </div>
                    </div>

					<div class="col-md-6">
						<div class="product-body">

							<h2 class="product-name"><?php echo $row["name"] ; ?></h2>
							<h3 class="product-price"><?php echo $row["prix"] ; ?> DT</h3>
							<div>
								<div class="product-rating">
                              <strong>rate this product :</strong>
                                    <?php
                                    if(isset($_SESSION['l'])) {
                                        $idc = $_SESSION['l'];

                                        //afficher note
                                    }
                                    else {   $idc = gethostbyaddr($_SERVER['REMOTE_ADDR']);}
                                    $idp=$_GET['id'];
                                    $sql=" SELECT * from note where (id_client='$idc' and  id_prod=$idp)";
                                    $db = config::getConnexion();

                                    $listnote=$db->query($sql);



                                    if($listnote->rowCount()) {

                                    foreach($listnote as $row1){

                                    for($i=0;$i<5;$i++){
                                    if($row1['note']>$i)
                                    {
                                    ?>	<td width="80%"><a href="<?php echo "../core/ajouter_note.php?id=".$idc."&note=".($i+1)."&produit=".$idp."" ?> " class="social-info">
                                            <i class="fa fa-star"></i>
                                            <?php }else{ ?>
                                    <td><a href="<?php echo "../core/ajouter_note.php?id=".$idc."&note=".($i+1)."&produit=".$idp."" ?> " class="social-info">
                                            <i class="fa fa-star-o empty"></i>
                                            <?php }
                                            }}
                                            ?>
                                            <?php
                                            }
                                            else{
                                            for($i=0;$i<5;$i++){
                                            ?>
                                    <td><a href="<?php echo "../core/ajouter_note.php?id=".$idc."&note=".($i+1)."&produit=".$idp.""?> " class="social-info">
                                            <i class="fa fa-star-o empty"> </i>
                                            <?php
                                            }
                                            }  ?>
                                </div>
                            <?php if ($row['STOCK'] >0) { ?>

                            <p><strong>Availability:</strong> In stock
                            </p>
                            <?php }
                         else { ?>
                             <p><strong>Availability:</strong> <span style="color: red"> Out of stock </span>
                            </p>
                            <?php }  ?>
							<p><strong>Categorie:</strong> <?php echo $row["categorie"] ; ?></p>
							<p><?php echo $row["description"] ; ?></p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
                                    <?php if($row["XS"]>0) { ?>
                                        <li ><a href="#">XS</a></li>
                                    <?php } ?>
                                    <?php if($row["S"]>0) { ?>
                                        <li ><a href="#">S</a></li>
                                    <?php } ?>
                                    <?php if($row["M"]>0) { ?>
                                        <li ><a href="#">M</a></li>
                                    <?php } ?>
                                    <?php if($row["L"]>0) { ?>
                                        <li ><a href="#">L</a></li>
                                    <?php } ?>
                                    <?php if($row["XL"]>0) { ?>
                                        <li ><a href="#">XL</a></li>
                                    <?php } ?>
                                    <?php if($row["XXL"]>0) { ?>
                                        <li ><a href="#">XXL</a></li>
                                    <?php } ?>


								</ul>
								<ul class="color-option">
									<li><span class="text-uppercase">Color:</span></li>
									<li class="active"><a href="#" style="background-color:<?php echo $row["color"] ; }?>;"></a></li>

								</ul>
							</div>

							<div class="product-btns">
								<div class="qty-input">
									<span class="text-uppercase">QTY: </span>
									<input class="input" type="number">
								</div>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								<div class="pull-right">
									<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
									<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
								</div>
							</div>
						</div>
					</div>
                        <br>
                        <br>
                        <h4 class="title-attr"><small>Share with friends </small></h4>
                        <div>
                            <!-- Facebook -->
                            <a   title="Facebook" href="https://www.facebook.com/sharer.php?u=https://localhost/inesguizani/views/product_details?id=<?php echo $_GET['id'] ; ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;"><img src="img/facebook_icon.png" alt="Facebook" /></a>
                            <!-- //Facebook -->

                            <!-- Twitter -->
                            <a target="_blank" title="Twitter" href="https://twitter.com/share?url=http://localhost/inesguizani/views/product_details?id=<?php echo $_GET['id'] ; ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700');return false;"><img src="img/twitter_icon.png" alt="Twitter" /></a>
                            <!-- //Twitter -->



                            <!-- Email -->
                            <a target="_blank" title="Envoyer par mail" href="mailto:?Subject=Regarde ça c'est cool !&amp;Body=regarde%20cet%20article%20c'est%20super !%20 http://localhost/inesguizani/views/product_details?id=<?php echo $_GET['id'] ; ?>" rel="nofollow"><img src="img/email_icon.png" alt="email" /></a>
                            <!-- //Email -->
                        </div>
                        </center>

                    </div>


				<!-- /Product Single -->
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

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>


</body>

</html>
