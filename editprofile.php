<?php $title = 'Edit Profile';
include "header.php"; ?>
<?php
	include "config.php";
    $result = mysql_query("SELECT * FROM member WHERE username='".$_SESSION['username']."'");
    $row = mysql_fetch_array($result);
?>
<div class="container">
        <div class="row clearfix">
                <div class="col-md-2 column">
                </div>
                <div class="col-md-8 column">
                    <div class="well bs-component">
              <form class="form-horizontal" method="POST" action="" name="">
                <fieldset>
                  <legend>Update Profile</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputTrack" placeholder="Name" name="username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputArtist" placeholder="Name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control"placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Retype Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" placeholder="Retype Password" name="repassword" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary" value="Submit" name="submit">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
                </div>
                <div class="col-md-2 column">
                </div>
            </div>
    </div>
<?php 
if (isset($_POST['submit'])){
	$username=$row[0];
	$password=$row[1];
	$repassword=$row[1];
	$name=$row[2];
	if($_POST['username']!="")
		$username = $_POST['username'];
	if($_POST['name']!="")
	$name = $_POST['name'];
	if($_POST['password']!="")
	$password = SHA1($_POST['password']);
	if($_POST['repassword']!="")
	$repassword = SHA1($_POST['repassword']);
	$id = $_SESSION['user_id'];
	if($password==$repassword){
		$query = "UPDATE `admin_shrenik`.`member` SET `username` = '$username', `password` = '".$password."', `name` = '$name' WHERE `member`.`id` = $id";
		$update = mysql_query($query);
		echo '
		<div class="col-md-2"></div><div class="alert alert-success alert-dismissable col-md-8">
          <button type="button" class="close" data-dismiss="alert" 
          aria-hidden="true">
          &times;
          </button>
          Success! The profile is updated.
          </div>';
		$_SESSION['username'] = $username;
	}

	else
		echo "Password mismatch.";

	}
?>
<?php include "footer.php"; ?>