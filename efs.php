<?php
include_once("connection/config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$con = mysqli_connect("localhost", "root", "", "test");
$loggedInUser = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/popupstyle.css">

</head>
<body>

	<section>
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Products You Purchase</h2>
<?php
$results = $mysqli->query("SELECT products.id,products.product_code, products.product_name, products.product_img_name, products.product_desc, products.price FROM products INNER JOIN buyertable ON products.product_code = buyertable.ItemNumber WHERE buyertable.UserId = $loggedInUser");
if($results){ 
$products_item = '<ul class="products">';
$conc = "-";
while($obj = $results->fetch_object())
{
    $products_item .= <<<EOT
	<li class="product">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_code}$conc{$obj->product_img_name}" width="230px" height="240px" style="border:1px solid green;" ></div>
	<div class="product-desc"><a href="images/{$obj->product_code}$conc{$obj->product_img_name}" download class="btn btn-primary" type="submit" >Download Image</a></div>
	<div class="product-info">
	<fieldset>
	<label>
    	Price {$currency}{$obj->price} 
    </label>
	</fieldset>

	<div align="center"><button name="ratebtn" onclick="popup({$obj->id});"  class="btn btn-default reg" type="submit" >Rate Product</button></div>

	</div>
	</div>
	</li>
EOT;
}

$products_item .= '</ul>';
echo $products_item;
}
?>  
				<div class="pop">
			  <span style="padding-right:8px;padding-top: 8px;"><b>✖ </b></span>
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM products  WHERE id = 25";
$result = $db_handle->runQuery($query);
?>
<style>
.demo-table {width: 40%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table th {background: #999;padding: 5px;text-align: left;color:#FFF;}
.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.demo-table td div.feed_title{text-decoration: none;color:#00d4ff;font-weight:bold;}
.demo-table ul{margin:0;padding:0;}
.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>function highlightStar(obj,id) {
	removeHighlight(id);		
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
}

function removeHighlight(id) {
	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

function addRating(obj,id) {
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('selected');
		$('#tutorial-'+id+' #rating').val((index+1));
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
	$.ajax({
	url: "add_rating.php",
	data:'id='+id+'&rating='+$('#tutorial-'+id+' #rating').val(),
	type: "POST"
	});
}

function resetRating(id) {
	if($('#tutorial-'+id+' #rating').val() != 0) {
		$('.demo-table #tutorial-'+id+' li').each(function(index) {
			$(this).addClass('selected');
			if((index+1) == $('#tutorial-'+id+' #rating').val()) {
				return false;	
			}
		});
	}
} </script>

</HEAD>
<BODY>
<table class="demo-table">
<tbody>
<tr>
<th><strong>PLease Rate this product</strong></th>
</tr>
<?php
if(!empty($result)) {
$i=0;
foreach ($result as $tutorial) {
?>
<tr>
<td valign="top">
<div class="feed_title"><?php echo $tutorial["product_name"]; ?></div>
<div id="tutorial-<?php echo $tutorial["id"]; ?>">
<input type="hidden" name="rating" id="rating" value="<?php echo $tutorial["rating"]; ?>" />
<ul onMouseOut="resetRating(<?php echo $tutorial["id"]; ?>);">
  <?php
  for($i=1;$i<=5;$i++) {
  $selected = "";
  if(!empty($tutorial["rating"]) && $i<=$tutorial["rating"]) {
	$selected = "selected";
  }
  ?>
  <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);" onClick="addRating(this,<?php echo $tutorial["id"]; ?>);">&#9733;</li>  
  <?php }  ?>
<ul>
</div>
<div><?php echo $tutorial["product_desc"]; ?></div>
</td>
</tr>
<?php		
}
}
?>
</tbody>
</table>
			</div>  
                        						
					</div><!--features_items-->
				</div>

                

			</div>
		</div>
	</section>
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
    	function popup(pid) {
      
         $(".pop").fadeIn(300);
            
         positionPopup();

     };
     $(".pop > span, .pop").click(function () {
         $(".pop").fadeOut(300);
     });
    </script>

</body>
</html>
