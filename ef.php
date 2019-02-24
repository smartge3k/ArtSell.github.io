<div class="container">
  <h1 class="page-header">Edit Profile</h1>
  <div class="row">
      <form class="form-horizontal" method="post" action="userindex.php" enctype="multipart/form-data">
    <!-- left column -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="images/ndf.jpg" class="avatar img-circle img-thumbnail" alt="no image">
        <h6>Upload a different photo...</h6>
        <input type="file" name="user_img" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-9 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an alert to show important messages to the user.
      </div>
      <h3>Personal info</h3>
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user_data['username'];?>" name="username" type="text">
          </div>
        </div>
       <div class="form-group">
          <label class="col-lg-3 control-label">Address</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user_data['useraddress'];?>" name="useraddress" type="text">
          </div>
        </div>
         <div class="form-group">
          <label class="col-lg-3 control-label">Phone numer:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user_data['userphone'];?>" name="userphn" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" value="<?php echo $user_data['usermail'];?>" name="usermail" type="emai">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php echo $user_data['userpass'];?>" name="userpass" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?php echo $user_data['userpass'];?>" name="cpass" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Update Info" type="submit" name="updateinfo">
            <span></span>
          </div>
        </div>
    </div>
      </form>
  </div>
</div> 