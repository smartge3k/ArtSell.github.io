<?php
$con = mysqli_connect("localhost", "root", "", "test");
$loggedInUser = "1";

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
	<link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php
$bq = "SELECT * from buyertable WHERE UserId = '$loggedInUser'";
$runbq = mysqli_query($con, $bq);
while($bqrow = mysqli_fetch_assoc($runbq)){
	$bid = $bqrow['BuyerId'];
	$bname = $bqrow['BuyerName'];
	$binum = $bqrow['ItemNumber'];
	$proq = "SELECT * from products WHERE product_code = '$binum'";
	$runproq = mysqli_query($con, $proq);
	while ($prorow = mysqli_fetch_assoc($runproq)) {
		$pcode = $prorow['product_code'];
		$pname = $prorow['product_name'];
		echo "
			<div class='alert alert-success'>
				<p>$bname</p>
				<p>$binum</p>
				<p>$pname</p>
			</div>
		";
	}
}
?>
</body>
</html>
