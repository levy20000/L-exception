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



    .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
    }
    .form-signin {
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.1);



    .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
    @include box-sizing(border-box);

    &:focus {
         z-index: 2;
     }
    }

    input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    }

</style>
</head>

<body>

<?php include "header.php" ?>
	<!-- NAVIGATION -->

	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Category</a></li>

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
                <div class="body-container">

                    <div class="auth-page-container">

                        <div class="main-form front">
                            <div class="main-form-inner">
                                <div class="engine-name"></div>
                        <div class="wrapper">
                            <form class="form-signin"  method="post"  action="../core/Reset.php"">
                                <h2 class="form-signin-heading">Please login</h2>
                                <input type="text" class="form-control"  placeholder="Email Address" name="email"id="email"  required  autofocus="" />
                                <br>
                            <a  href="join.php"> <span>Pas encore membre ? </span></a>
                                <br>
                                <br>
                                <button class="btn btn-lg btn-warning btn-block" type="submit">Login</button>
                            </form>
                        </div>

                            </div>
                        </div>






                    </div>
		</div>
		<!-- /container -->
	</div>
        </div>
	<!-- /section -->


<?php include "footer.php" ?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
