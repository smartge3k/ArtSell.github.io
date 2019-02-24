<?php
	SESSION_START();
	require('connection/config.php');
	 include("core/init.php");

	if(isset($_POST['signupbtn'])){
		
		$_SESSION['uname'] = $_POST['uname'];
		$_SESSION['upno'] = $_POST['upno'];
		$_SESSION['uaddress'] = $_POST['uaddress'];
		$_SESSION['uemail'] = $_POST['uemail'];
		$_SESSION['upass'] = $_POST['upass'];
          
            $uname = mysqli_real_escape_string($mysqli, $_POST['uname']);
			$upno = mysqli_real_escape_string($mysqli, $_POST['upno']);
			$uaddress = mysqli_real_escape_string($mysqli, $_POST['uaddress']);
			$uemail = mysqli_real_escape_string($mysqli, $_POST['uemail']);
			$upass = mysqli_real_escape_string($mysqli, $_POST['upass']);

            $query = "INSERT into user(username, userphone, useraddress, usermail, userpass) values('$uname', '$upno', '$uaddress', '$uemail', '$upass')";
            $run = mysqli_query($mysqli, $query);

            $to = 'ArtBuySell.com@gmail.com';
			$message = "Hello new user  $uname Has created account ! His account details is :  \n  'username =' $uname \n 'user Phone no = ' $upno \n 'user Address is = ' $uaddress";
			$subject = 'New user Signup';
			//$webmaster = 'From: 130924@students.au.edu.pk';

			mail($to, $subject, $message);
            
            
            if($run){
                header("location: login.php?success=" . urlencode("Congratulations! You are now a member, please sign in below"));
            }
            else{
                header("location: login.php?error=" . urlencode("There is some error on your side"));
            }
		 }

  else if(isset($_POST['loginbtn'])){
    
        $uloginemail =  $_POST['uloginmail'];
        $uloginpassword =  $_POST['uloginpass'];
        
       $query = "SELECT * FROM user WHERE usermail = '$uloginemail' and userpass = '$uloginpassword'";
		$run = mysqli_query($mysqli, $query);
		if($row = mysqli_fetch_assoc($run)){
            $_SESSION['user_id'] = $row['UserId'];
            $setsession = $_SESSION['user_id'];
			 header("location: userindex.php");
            
            }
        
       else {
             header("location: login.php?error=" . urlencode("Wrong Username or password"));
        }
    }
?>



<?php

    if (logged_in() === true ) {
        ?>
            <script type="text/javascript">
                window.location.href = 'userindex.php'; 
            </script>
        <?php
    }
else{

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
  
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
				</div>
			</div>
		</div><!--/header-middle-->
	</header>
    
	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="login.php" method="post">
							<input type="email"  name="uloginmail" placeholder="Email" />
							<input type="password" name="uloginpass"  placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit"  name="loginbtn" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="login.php" method="post">
							<input type="text" name="uname" placeholder="Name"/>
							<input type="text"  name="upno"  placeholder="Phone Number"/>
							<input type="text"  name="uaddress"  placeholder="Address"/>
							<input type="email"  name="uemail"  placeholder="Email Address"/>
							<input type="password"  name="upass" placeholder="Password"/>
							
							<button type="submit" name="signupbtn" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
}
?>