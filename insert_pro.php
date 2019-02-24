<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Eguys Admin panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
	<nav class="navbar navbar-default navbar-inverse" style="margin-bottom: 0px;">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-globe"></span> visit website</a>
		</div>


		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  
		  <ul class="nav navbar-nav navbar-right">
			
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Howdy <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			  </ul>
			</li>
		  </ul>
		</div>
        </div>
	</nav>
	<div class="clearfix"></div>

	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-10 sidebar pull-right" style="text-align: left;">
		<form action="insert_pro.php" method="post" enctype="multipart/form-data" style="padding: 30px 0px;">

		  <div class="form-group">
			<label>Product Title</label>
			<input type="text" class="form-control" name="pro_title" placeholder="Product Title" required>
		  </div>
           <div class="form-group">
			<label>Product Code</label>
			<input type="text" class="form-control" name="pro_code" placeholder="Product Code" required>
		  </div>
		  <div class="form-group">
			<label>Product Category</label>
			<select class="form-control" name="pro_cat" required>
				<option>
                    Huha
                </option>
			</select>
		  </div>
		  <div class="form-group">
			<label>Product Price</label>
			<input type="number" class="form-control" name="pro_price" placeholder="Brand Name" required>
		  </div>
		  <div class="form-group">
			<label>Product Details</label>
			<textarea rows="10" class="form-control" name="pro_details" placeholder="Brand Name" required></textarea>
		  </div>
		  <div class="form-group">
			<label>Product Image</label>
			<input type="file"  name="pro_img" required style="padding-bottom:20px;">
		  </div>
			<button type="submit" class="btn btn-primary" name="insert_pro_btn">Add New Product</button>
		</form>
	</div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php

      include_once("connection/config.php");
		if(isset($_POST['insert_pro_btn'])){
			$pro_title = mysqli_real_escape_string($mysqli, $_POST['pro_title']);
            $pro_code = mysqli_real_escape_string($mysqli,   $_POST['pro_code']);
			$pro_cat = mysqli_real_escape_string($mysqli,   $_POST['pro_cat']);
			$pro_price = mysqli_real_escape_string($mysqli, $_POST['pro_price']);
			$pro_details = mysqli_real_escape_string($mysqli, $_POST['pro_details']);
			$pro_img_name = $_FILES['pro_img']['name'];
			$pro_img_type = $_FILES['pro_img']['type'];
			$pro_img_size = $_FILES['pro_img']['size'];
			$pro_img_tmp = $_FILES['pro_img']['tmp_name'];
			
			if($pro_img_type == "image/jpg" or $pro_img_type == "image/jpeg" or $pro_img_type == "image/png"){
				if($pro_img_size <= 1000000){
					$query = "INSERT into products(product_code,product_name,product_cat,product_desc,product_img_name,price)              values('$pro_code','$pro_title','$pro_cat','$pro_details','$pro_img_name','$pro_price')";
					$run = mysqli_query($mysqli, $query);
					if($run){
						if(move_uploaded_file($pro_img_tmp, "images/$pro_img_name")){
							echo"<script>alert('Product has been added');</script>";
							exit();
						}
						else{
							echo"<script>alert('Image upload not Possible');</script>";
							exit();
						}
					}
					else{
						echo"<script>alert('There is some error on your side');</script>";
						exit();
					}
				}
				else{
					echo"<script>alert('Image size should be less than 1 MB');</script>";
					exit();
				}
			}
			else{
				echo"<script>alert('Choose a valid image type i.e JPG, JPEG, PNG');</script>";
				exit();
			}
		}

?>