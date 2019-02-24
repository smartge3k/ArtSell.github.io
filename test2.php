<?php
include_once("connection/config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Digi Art Mart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/forms.css" rel="stylesheet">
    </head>
    <style>

body { background:#ffffff;}
.profile-head { width:100%; float: left;padding: 15px 5px;border-radius: 30px; position: relative;}
.profile-head img { height:180px; width:180px; margin:0 auto; border:5px solid #fff; border-radius:5px;}
.profile-head h5 {width: 100%;padding:5px 5px 0px 5px;text-align:justify;font-weight: bold;color: white;font-size: 25px;text-transform:capitalize;
margin-bottom: 0;}
.profile-head p {width: 100%;text-align: justify;padding:0px 5px 5px 5px;color: #fff;font-size:17px;text-transform:capitalize;margin:0;}
.profile-head a {width: 100%;text-align: center;padding: 10px 5px;color: #fff;font-size: 15px;text-transform: capitalize;}

.profile-head ul { list-style:none;padding: 0;}
.profile-head ul li { display:block; color:#ffffff;padding:5px;font-weight: 400;font-size: 15px;}
.profile-head ul li:hover span { color:rgb(0, 4, 51);}
.profile-head ul li span { color:#ffffff;padding-right: 10px;}
.profile-head ul li a { color:#ffffff;}
.profile-head h6 {width: 100%;text-align: center;font-weight: 100;color: #fff;font-size: 15px;text-transform: uppercase;margin-bottom: 0;}


.nav-tabs {margin: 0;padding: 0;border: 0;}
.nav-tabs > li > a {background: #DADADA;border-radius: 0;
    box-shadow: inset 0 -8px 7px -9px rgba(0,0,0,.4),-2px -2px 5px -2px rgba(0,0,0,.4);}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover {background: #F5F5F5;
    box-shadow: inset 0 0 0 0 rgba(0,0,0,.4),-2px -3px 5px -2px rgba(0,0,0,.4);}
.tab-pane {background: #ffffff;box-shadow: 0 0 4px rgba(0,0,0,.4);border-radius: 0;text-align: center;padding: 10px;}
.tab-content>.active {margin-top:50px;/*width:100% !important;*/} 

/* edit profile css*/

.hve-pro {    background-color:rgb(255, 102, 0);padding: 5px; width:100%; height:auto;float:left;}
.hve-pro p {float: left;color:#fff;font-size: 15px;text-transform: capitalize;padding: 5px 20px;font-family: 'Noto Sans', sans-serif;}
h2.register { padding:10px 25px; text-transform:capitalize;font-size: 25px;color: rgb(255, 102, 0);}
.fom-main { overflow:hidden;}

legend {font-family: 'Bitter', serif;color:#ff3200;border-bottom:0px solid;}
.main_form {background-color: #;}
label.control-label {font-family: 'Noto Sans', sans-serif;font-weight: 100; margin-bottom:5px !important; 
text-align:left !important; text-transform:uppercase; color:#798288;}
.submit-button {color: #fff;background-color:rgb(255, 102, 0);width:190px;border: 0px solid;border-radius: 0px; transition:all ease 0.3s;margin: 5px;
float:left;}
.submit-button:hover, .submit-button:focus {color: #fff;background-color:rgb(0, 4, 51);}
.edit-button {color: #fff;background-color:rgb(255, 102, 0);width:190px;border: 0px solid;border-radius: 0px; transition:all ease 0.3s;margin: 5px;
float:left;}
.edit-button:hover, .submit-button:focus {color: #fff;background-color:rgb(0, 4, 51);}
.hint_icon {color:#ff3200;}
.form-control:focus {border-color: #ff3200;}
select.selectpicker { color:#99999c;}
select.selectpicker option { color:#000 !important;}
select.selectpicker option:first-child { color:#99999c;}
.input-group { width:100%;}
.uplod-picture {width: 100%;color: #fff; padding:20px 10px;margin-bottom:10px;}
.uplod-file {position: relative;overflow: hidden;color: #fff;background-color: rgb(0, 4, 51);border: 0px solid #a02e09;border-radius: 0px;
 transition:all ease 0.3s;margin: 5px;}
.uplod-file input[type=file] {position: absolute;top: 0;right: 0;min-width: 100%;min-height: 100%;font-size: 100px;text-align: right;
filter: alpha(opacity=0);opacity: 0;outline: none;background: white;cursor: inherit;display: block;}
.uplod-file:hover, .uplod-file:focus {color: #fff;background-color:rgb(255, 102, 0);}
h4.pro-title { font-size:24px; color:rgba(0, 4, 51, 0.96); text-transform:capitalize; text-align:justify;padding: 10px 15px;font-family: 'Bitter', serif;}
.bio-table { width:75%;border:0px solid;}
.bio-table td {text-transform: capitalize;text-align: left;font-size: 15px;}
.bio-table>tbody>tr>td { border:0px solid;text-transform: capitalize;color: rgb(0, 4, 51); font-size:15px;}
.responsiv-table { border:0px solid;}
.nav-menu li a {margin: 5px 5px 5px 5px;position: relative;display: block;padding: 10px 50px;border: 0px solid !important;box-shadow: none !important;
background-color: rgb(0, 4, 51) !important;color: #fff !important;    white-space: nowrap;}
.nav-menu li.active a {background-color: rgb(255, 102, 0) !important;}
.stick{position:fixed !important;top:0;z-index:999 !important;width:100%;background:#ffffff !important;height:auto; transition:all ease 0.8s;
-webkit-box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.75);
box-shadow: 0px 2px 7px 0px rgba(0,0,0,0.75);}
.stick a { line-height:20px !important;}
.stick img { margin:0 !important}
.card-background img {
    position: absolute;
    min-width: 90%;
    min-height: 100%;
    border: 1px solid black;
    filter: blur(15px);
   margin-left: 5%;
}
    </style>
    <body>
    
 <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">
  
<div class="container">
    <div class="profile-head" >
                <div class="card-background">
            <img class="card-bkimg" alt="" src="images/back.jpg">
            <!-- http://lorempixel.com/850/280/people/9/ -->
           </div>
        <?php 
     
        $imgtoken = $user_data['imgtoken'];
        $userimg =  $user_data['userimg'];
        ?>
        <!--col-md-4 col-sm-4 col-xs-12 close-->
        <div class="col-md- col-sm-4 col-xs-12" style="margin-top:30px;margin-left:80px;">
            <img src="images/userprofile/<?php echo $imgtoken."-".$userimg; ?>" class="img-responsive" alt="no image found"/>
            <h6><?php echo @$user_data['username']; ?></h6>
        </div>
        <!--col-md-4 col-sm-4 col-xs-12 close-->

        <div class="col-md-5 col-sm-5 col-xs-12" style="margin-top:40px;">
            <h5><?php echo @$user_data['username']; ?></h5>
            <ul>
                <li><span class="glyphicon glyphicon-home"></span> <?php echo @$user_data['useraddress'];?> </li>
                <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call"><?php echo @$user_data['userphone'];?></a></li>
                <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"><?php echo @$user_data['usermail'];?></a></li>
            </ul>
        </div>

    </div>
    </div>
        <div class="container">
            <div class="row">
         <div class="col-md-10" style="text-align:center; margin-left:90px;margin-top:40px;">
        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Posted Items</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Add New Product</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Claim your Product</div>
            </button>
        </div>
    </div>
</div>
            </div>
                </div>
            <div class="container">
            <div class="row">
                <div class="col-md-12" >
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
<?php include("ef.php"); ?>
</div>
        <div class="tab-pane fade in" id="tab2">
            <?php include("ppbu.php"); ?>
        </div>
        <div class="tab-pane fade in" id="tab3">
			<form action="userindex.php" method="post" enctype="multipart/form-data">
			<div id="contact-form" class="form-container" data-form-container>
			<div class="row">
				<div class="form-title">
					<span>Add New Product</span>
				</div>
			</div>
			<div class="input-container">
				<div class="row">
					<span class="req-input" >
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Input Product Title."> </span>
						<input type="text" data-min-length="8" name="pro_title" placeholder="Product Title">
					</span>
				</div>

                
				<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Product Code."> </span>
						<input type="text"  name="pro_code" placeholder="Product Code">
					</span>
				</div>
                
                	<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Product Category"> </span>
									<select name="pro_cat" required>
                                          <?php  get_cat_as_select_option(); ?>

		                  	</select>
					</span>
				</div>
                
                	<div class="row">
					<span class="req-input">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Input Product Price."> </span>
						<input type="number"  name="pro_price" placeholder="Product Price">
					</span>
				</div>
                
				<div class="row">
					<span class="req-input message-box">
						<span class="input-status" data-toggle="tooltip" data-placement="top" title="Please Enter Product Details."> </span>
						<textarea type="textarea" data-min-length="50" placeholder="Product Details" name="pro_details"></textarea>
                    </span>
				</div>
                	<div class="row">
					
                      <div class="form-group" style="margin-top:20px;">
                           <input type="file" class="text-center center-block well well-sm" name="pro_img" required >
                        </div>
				</div>
				<div class="row submit-row">
                    
					<button type="submit" class="btn btn-block submit-form" name="insert_pro_btn">Add Product</button>
				</div>
			</div>
			</div>
			</form>
	      </div>
            <div class="tab-pane fade in" id="tab4">
           <?php include("efs.php"); ?>    </div>
        </div>
                </div>
                </div>
        </div>
    
        
    </body>
</html>
    <script src="js/jquery.js"></script>
<script src="js/forms.js"></script>
	<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
</script>

<?php

require('connection/config.php');
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
			if($pro_img_type == "image/jpg" or $pro_img_type == "image/jpeg" or $pro_img_type == "image/png" or pro_img_type =="image/gif"){
					$query = "INSERT into products(userid,product_code,product_name,product_cat,product_desc,product_img_name,price)
					values('$session_user_id','$pro_code','$pro_title','$pro_cat','$pro_details','$pro_img_name','$pro_price')";
					$run = mysqli_query($mysqli, $query);
					if($run){
						if(move_uploaded_file($pro_img_tmp, "images/$pro_code-$pro_img_name")){
							        ?>
            <script type="text/javascript">
                window.location.href = 'userindex.php'; 
            </script>
        <?php
							exit();}
						else{
							echo"<script>alert('Image upload not Possible');</script>";
							exit();}
                    }
					else{
						echo"<script>alert('There is some error on your side');</script>";
						exit();}
			}
			else{
				echo"<script>alert('Choose a valid image type i.e JPG, JPEG, PNG');</script>";
				exit();
			}
		}
if(isset($_POST['updateinfo'])){
			 $username = mysqli_real_escape_string($mysqli, $_POST['username']);
             $useraddress = mysqli_real_escape_string($mysqli,   $_POST['useraddress']);
			 $userphn = mysqli_real_escape_string($mysqli,   $_POST['userphn']);
			 $usermail = mysqli_real_escape_string($mysqli, $_POST['usermail']);
			 $userpass = mysqli_real_escape_string($mysqli, $_POST['userpass']);
			 $cpass = mysqli_real_escape_string($mysqli, $_POST['cpass']);
			 $user_img_name = $_FILES['user_img']['name'];
			 $user_img_type = $_FILES['user_img']['type'];
			 $user_img_size = $_FILES['user_img']['size'];
			 $user_img_tmp = $_FILES['user_img']['tmp_name'];
             $image_token = bin2hex(openssl_random_pseudo_bytes(8));
			if($user_img_type == "image/jpg" or $user_img_type == "image/jpeg" or $user_img_type == "image/png"){
				if($user_img_size <= 2000000){
					$query = "UPDATE user SET username = '$username',userphone = '$userphn',useraddress = '$useraddress',usermail = '$usermail',userpass = '$userpass', userimg = '$user_img_name',imgtoken ='$image_token' WHERE  UserId = '$session_user_id'";
					$run = mysqli_query($mysqli, $query);
					if($run){
						if(move_uploaded_file($user_img_tmp, "images/userprofile/$image_token-$user_img_name")){
							?>
					            <script type="text/javascript">
					                window.location.href = 'userindex.php'; 
					            </script>
					        <?php

							exit();
						}
						else{
							echo"<script>alert('Image upload not Possible');</script>";
							exit();}
                    }
					else{
						echo"<script>alert('There is some error on your side');</script>";
						exit();}
				}
				else{
					echo"<script>alert('Image size should be less than 2 MB');</script>";
					exit();
				}
			}
			else{
				echo"<script>alert('Choose a valid image type i.e JPG, JPEG, PNG');</script>";
				exit();
			}
		}

?>
