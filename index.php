<?php 
    session_start();
    include_once("connection/config.php");
    include("core/init.php");


        ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel="stylesheet" href="css/imagehoverstyle1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    	 .ratings {
    position: relative;
    vertical-align: middle;
    display: inline-block;
    color: #b1b1b1;
    overflow: hidden;
}
.full-stars {
    position: absolute;
    left: 0;
    top: 0;
    white-space: nowrap;
    overflow: hidden;
    color: #fde16d;
}
.empty-stars:before, .full-stars:before {
    content:"\2605\2605\2605\2605\2605";
    font-size: 14pt;
}
.empty-stars:before {
    -webkit-text-stroke: 1px #848484;
}
.full-stars:before {
    -webkit-text-stroke: 1px orange;
}
/* Webkit-text-stroke is not supported on firefox or IE */

/* Firefox */
 @-moz-document url-prefix() {
    .full-stars {
        color: #ECBE24;
    }
}
/* IE */
 <!--[if IE]> .full-stars {
    color: #ECBE24;
}
<![endif]-->
    
    </style>
</head>
<body>


	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6 ">
						<div class="contactinfo">
							<ul class="nav nav-pills">
							
								<li><a href="#"><i class="fa fa-envelope"></i> info@ArtBuySell.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="pull-left">
							<img src="images/digilogo.png"   height="70" alt="DIgi Art mart LOgo">
						</div>
					</div>
					<?php 

                  if (logged_in() === false ) {

					?>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>  
								<li><a href="products.php">Products</a></li>
								<li><a href="contact-us.php">About Us</a></li>
								<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
					<?php
				} else {
			?>
								<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>  
								<li><a href="products.php">Products</a></li>
								<li><a href="contact-us.php">About Us</a></li>
								<li><div class="dropdown">
						        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <?php echo @$user_data['username']; ?>
								  </button>
								  <div class="dropdown-menu" >
      <button onclick="window.location.href='userindex.php'"  style="background-color: transparent; border: 1px solid black; margin-left: 10px; color: black;" type="button">Dashboard</button>
	<button  onclick="window.location.href='logout.php'" style="background-color: transparent; border: 1px solid black;margin-left: 10px;color: black;" type="button">LogOut</button>
								  </div>
                              </div>
                              </li>
							</ul>
						</div>
					</div>


					<?php
				}
			?>

				</div>
			</div>
		</div><!--/header-middle-->
	</header>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Digi</span> Art Mart</h1>
									<h3>A slogan to be added here</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Digi</span> Art Mart</h1>
									<h3>A slogan to be added here</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Digi</span> Art Mart</h1>
									<h3>A slogan to be added here</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<div>
		<center><h1 style="color: green;border: 1px solid orange; width: 40%; padding: 10px;"> Recently Product Posted </h1></center>
	</div>

	<div style="margin-left: 160px;margin-top: 30px;">

	<?php
	$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products ORDER BY id DESC LIMIT 3");
if($results){ 
$products_item = '<ul class="products">';
$conc = "-";
    $multi = "2"; 
    
while($obj = $results->fetch_object())
{
    $rating = $obj->rating * 2;
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3 style="color:orange">{$obj->product_name}</h3>
	<div>
	  <a class="list-block demo-2" style="text-decoration:none;">
    <figure>
      <img src="images/{$obj->product_code}$conc{$obj->product_img_name}" width="240px" height="210px"alt="" />
      <figcaption>
        <h2>Add to Cart</h2>
      </figcaption>
    </figure>
  </a> 
</div>
	<div class="product-info" >
		<label style="color:white;  visibility: hidden;">
    </label>
	<fieldset>
	<label style="color:orange">
    	Price {$currency}{$obj->price}
    </label>
	<label>
		<input style="color:orange" type="hidden" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
    	<label style="color:orange">
    	<span>Ratting  </span>
        <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars" style="width:{$rating}0%"></div>
</div>
    </label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
	?>
	</div>
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
			<p class="pull-left">Copyright © 2017 Digi Art Mart Inc. All rights reserved.</p>
			<p class="pull-right">Designed by <span><a>Digi Art Mart</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
