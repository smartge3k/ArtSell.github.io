<?php
session_start();
include_once("connection/config.php");
require ("core/init.php");

$sp = " ";
$limit = 20;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  if(isset($_GET['cat'])){
     
            $cat_id = $_GET['cat'];
  }
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
      <link rel="stylesheet" href="css/imagehoverstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/simplePagination.css" />
    <script src="dist/jquery.simplePagination.js"></script>
  
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style>
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
						<div class="logo pull-left">
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
								<li><a href="contact-us.php">About us</a></li>
								<li><div class="dropdown">
						        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <?php echo @$user_data['username']; ?>
								  </button>
								  <div class="dropdown-menu" >
									      <button onclick="window.location.href='userindex.php'"  style="background-color: transparent; border: 1px solid black; margin-left: 15px;" type="button">Dashboard</button>
										<button  onclick="window.location.href='logout.php'" style="background-color: transparent; border: 1px solid black;margin-left: 15px;" type="button">LogOut</button>
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
    
	
	<section>
		<div class="container-fluid">
			<div class="row">
                <div class="col-sm-1">
                </div>
				<div class="col-sm-3">
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="brands_products" id="view-cart" style="margin-bottom:50px;">';
	echo '<h3 style="text-align:center;color:orange;">Your Shopping Cart</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
        
		$subtotal = ($product_price);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="6">';
	echo '<button type="submit" style="margin-left:20px; margin-top:15px;">Update</button><a href="view_cart.php" class="button" style="margin-left:50px;margin-top:15px;">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
						<div class="brands_products">
							<h2 style="margin-top:20px;">Categories</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
                                    <?php get_cat(); ?>
								</ul>
							</div>
						</div>

				</div> 
				
				<div class="col-sm-8">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>





<!-- View Cart Box Start -->

<?php
if(!isset($_GET['cat']) && !isset($_GET["page"])){

$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products ORDER BY id ASC LIMIT $start_from, $limit");
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
    p
    </label>
	<div style="padding-top:5px;font-size:13px;">{$obj->product_desc}</div>
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
	<div style="color:orange" align="center"><button type="submit" style="background-color:orange;color:white;">Add TO Cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
    
$sql = "SELECT COUNT(id) FROM products";  
$rs_result = mysqli_query($mysqli, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav><ul class='paginations'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='products.php?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  
}

if(!isset($_GET['cat']) && isset($_GET["page"])){
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products ORDER BY id ASC LIMIT $start_from, $limit");
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
    p
    </label>
	<div style="padding-top:5px;font-size:13px;">{$obj->product_desc}</div>
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
	<div style="color:orange" align="center"><button type="submit" style="background-color:orange;color:white;">Add TO Cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
    
$sql = "SELECT COUNT(id) FROM products";  
$rs_result = mysqli_query($mysqli, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav><ul class='paginations'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='products.php?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  

}

 if(isset($_GET['cat']) && !isset($_GET["page"])){
     
            $cat_id = $_GET['cat'];
			global $mysqli;
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products where product_cat = '$cat_id'  ORDER BY id ASC  LIMIT $start_from, $limit");
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
    p
    </label>
	<div style="padding-top:5px;font-size:13px;">{$obj->product_desc}</div>
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
	<div style="color:orange" align="center"><button type="submit" style="background-color:orange;color:white;">Add TO Cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
        }
     
$sql = "SELECT COUNT(id) FROM products";  
$rs_result = mysqli_query($mysqli, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='products.php?cat=".$cat_id."?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  

                    	
 }
 if(isset($_GET['cat']) && isset($_GET["page"])){
     
            $cat_id = $_GET['cat'];
			global $mysqli;
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price, rating FROM products where product_cat = '$cat_id'  ORDER BY id ASC  LIMIT $start_from, $limit");
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
    p
    </label>
	<div style="padding-top:5px;font-size:13px;">{$obj->product_desc}</div>
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
	<div style="color:orange" align="center"><button type="submit" style="background-color:orange;color:white;">Add TO Cart</button></div>
	</div></div>
	</form>
	</li>
EOT;
        }
        $products_item .= '</ul>';
        echo $products_item;
        }
     
$sql = "SELECT COUNT(id) FROM products";  
$rs_result = mysqli_query($mysqli, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='products.php?cat=".$cat_id."?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  

                    	
 }
?>    
                        						

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('.paginations').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'products.php?page='
    });
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php  echo $page;?>,
		hrefTextPrefix : 'products.php?cat=<?php echo $cat_id;?>&page='
    });
	});
</script>