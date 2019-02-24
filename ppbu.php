<?php
include_once("connection/config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
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

	<section>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products Posted By U</h2>





<!-- View Cart Box Start -->

<?php
$results = $mysqli->query("SELECT id,product_code, product_name, product_desc, product_img_name, price , rating FROM products WHERE userid = $session_user_id  ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';
$conc = "-";
while($obj = $results->fetch_object())
{
    $proid = $obj->id;
	$rating = $obj->rating * 2;
    $products_item .= <<<EOT
	<li class="product">
	<form method="post" action="deleteitem.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_code}$conc{$obj->product_img_name}" width="200px" height="180px" style="border:1px solid green;" ></div>
	<div class="product-desc" style="margin-bottom:10px;">{$obj->product_desc}</div>
	<div class="product-info">
	<fieldset>
	<label>
    	Price {$currency}{$obj->price} 
    </label>
    	<label style="color:orange">
    	<span>Ratting  </span>
        <div class="ratings">
       <div class="empty-stars"></div>
       <div class="full-stars" style="width:{$rating}0%"></div>
</div>
    </label>
	
	</fieldset>
	<div align="center"><a href="userindex.php?del_pro=$proid" class="btn btn-danger" type="submit" >Remove Product</a></div>
	</div></div>
	</form>
	</li>
EOT;
}

$products_item .= '</ul>';
echo $products_item;
}
?>    
                        						
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
				</div>

                

			</div>
		</div>
	</section>
</body>
</html>
<?php
    if(isset($_GET['del_pro'])){
        $delid = $_GET['del_pro'];
                          $query = "DELETE from products WHERE id = '$delid'";
                            $run = mysqli_query($mysqli, $query);
                           if($run){
                               
                                      ?>
            <script type="text/javascript">
                window.location.href = 'userindex.php'; 
            </script>
        <?php
         }
        else
        {
            header("location: userindex.php?error=" . urlencode("not deleted incorrect"));
        }

    }
?>