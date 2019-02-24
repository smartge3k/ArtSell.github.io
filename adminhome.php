<?php 

    include("core/init.php");

    if (logged_in() === false ) {
        ?>
            <script type="text/javascript">
                window.location.href = 'login.php'; 
            </script>
        <?php
    }
else{
 
    if (! isset ($_GET['pg'])){
       $pg = 1;
    } else {
        $pg = $_GET['pg'];
        if ($pg > 3) {
            ?>
                <script type="text/javascript">
                    window.location.href = 'adminhome.php?pg=1'; 
                </script>
            <?php
        }
    }

    
    
    
    if ($pg >= 1 || $pg <= 4)
        
        $resultant = get_users_of_type($pg);
    else {
        ?>
            <script type="text/javascript">
                window.location.href = 'adminhome.php?pg=1'; 
            </script>
        <?php
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Eguys Admin panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
       <script src="js/sweetalert-dev.js"></script>
       <script src="js/npm.js"></script>
       <script src="js/jquery-1.9.1.min.js"></script>
      <script src="js/jquery-1.10.2.min.js"></script>
      <script src="js/jquery-1.10.2.js"></script>

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
      <div class="container">
          <div class="row">
      <div class="col-md-1"></div>

	<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 sidebar" style="text-align: left;">
     <ul class="nav nav-tabs">
<?php
  echo '<li role="presentation"' . ($pg == 1 ? " class='active'" : "") . '><a href="adminhome.php?pg=1">Resigned</a></li>';
  echo '<li role="presentation"' . ($pg == 2 ? " class='active'" : "") . '><a href="adminhome.php?pg=2">Awaiting Confirmation</a></li>';
echo '<li role="presentation"' . ($pg == 3 ? " class='active'" : "") . '><a href="adminhome.php?pg=3">Active Users</a></li>';
                    ?>
                    </ul>
                            <div class="panel panel-default">
                        <div class="panel-heading"> <center> All News </center> </div>

                            <table class="table"> 
                                <thead> 
                                    <tr> 
                                        <th> User ID </th>
                                        <th> user Name </th>
                                        <th> User Phone  </th>
                                        <th> User Mail </th>
                                        <th> User Pass</th>
                                    </tr>
                                </thead>
                                <tbody class="sw">
                                <?php                                
                                    while($r_data = $resultant->fetch_assoc()) 
                                    {    
                                        ?>
                                            <tr>
                                                <th scope="row"> <?php echo $r_data["UserId"]; ?> </th>
                                                <td> <?php echo $r_data["username"]; ?> </td>
                                                <td> <?php echo $r_data["userphone"]; ?> </td>
                                                <td> <?php echo $r_data["usermail"]; ?> </td>
                                                <td> <?php echo $r_data["userpass"]; ?> </td>
                                                <?php
                                        
  /*if (is_deleted($r_data["UserIId"]) == false) {
  echo '<td class="here"><a onclick="myFunction(' . $r_data["U_ID"] . ',' . $user_data['U_ID'] . ')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a></td>'; 
                                                        }
else {
*/
 echo '<td class="here"><a onclick="myOtherFunction(' . $r_data["UserId"] . ',' . $user_data['UserId'] . ')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> </a></td>'; 
                                                     

                                                ?>
                                            </tr>
                                           <?php 
                                    }
                                ?>  
                                </tbody> 
                            </table>


                    </div>
	</div>
      </div>
      </div>
    <script src="js/bootstrap.min.js"></script>
  <script>
          
     function myOtherFunction(userid, senderid){

            swal({
                title: "RE-ACTIVATE?",
                text: "Are you sure you wish to Re-Activate this User?",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Re-Activate!',
                closeOnConfirm: false
            },
            function(){                

                callthis(userid, senderid);
            });
        };

        function callthis(userid, senderid){
            
            $.ajax({
                type: "POST",
                url: 'confirmation.php',
                dataType: 'json',
                data: {functionname: 'user_reactivate', arguments: [userid, senderid]},

                success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        swal("Re-Activated!","The Selected User has been Re-Activated", "success");
                    }
                    else {
                        swal("Cancelled", obj.error, "error");
                    }        
                }
            });
        }
        

    </script>
  </body>
</html>
<?php
}
?>