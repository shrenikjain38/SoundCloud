<?php include "header.php"; ?>

<?php
include "config.php";

function up($type)
{
	if($type==0)
		return 10;
	else
		return 1000;
}

function down($type)
{
	if($type==0)
		return 100;
	else
		return 10000;
}
$error="";
if(isset($_POST['submit']))
{
	foreach($_POST as $i)
	{
		if($i=="")
		{
			$error.="Please enter all fields.<br/>";
			break;
		}
	}
	if($_POST['password']!=$_POST['repassword'])
		$error.="Password mismatch.<br/>";
}

if(isset($_GET['type'])||isset($_POST['submit']))
{
?>
<?php
if($error==''&&isset($_POST['submit']))
{
	$sql="INSERT INTO `member` (`username`, `password`, `name`, `up_left`, `down_left`, `sub_type`) VALUES ('".$_POST['username']."', '".SHA1($_POST['password'])."', '".$_POST['name']."', '".$_POST['up_left']."', '".$_POST['down_left']."', '".$_POST['sub_type']."')";
	$query=mysql_query($sql);
	if(!$query)
		echo "Username already taken.";
	else
	{
		echo "Registration Successful.";
		exit;
	}
}
else if($error!='')
	echo $error;
?>
<!-- <form name="registration" method="post" action="">
TYPE:<?php echo $_GET['name'];?><input type="text" name="sub_type" value="<?php echo $_GET['type'];?>" hidden ></br>
USERNAME:<input type="text" name="username" value="" required></br>
NAME:<input type="text" name="name" value="" required></br>
PASSWORD:<input type="text" name="password" value=""  required></br>
RE-PASSWORD:<input type="text" name="repassword" value=""  required></br>
<input type="submit" name="submit" value="submit">
<input type="text" name="up_left" value="<?php echo up($_GET['type']); ?>" hidden>
<input type="text" name="down_left" value="<?php echo down($_GET['type']); ?>" hidden>
</form> -->
<?php include "footer.php"; ?>

<div class="container">
        <div class="row clearfix">
                <div class="col-md-2 column">
                </div>
                <div class="col-md-8 column">
                    <div class="well bs-component">
				<div class="alert alert-dismissable alert-info">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong><?php echo $_GET['name'];?></strong> 
				</div>
              <form class="form-horizontal" method="POST" action="" name="registration">
                <fieldset>
                  <legend>Register</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputTrack" placeholder="Name" name="username" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputArtist" placeholder="Name" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control"placeholder="Password" name="password" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Retype Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" placeholder="Retype Password" name="repassword" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Upload</label>
                    <div class="col-lg-10">
                      <input type="file" name="track">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary" value="Submit" name="submit">Submit</button>
                    </div>
                  </div>
                </fieldset>
				<input type="text" name="up_left" value="<?php echo up($_GET['type']); ?>" hidden>
				<input type="text" name="down_left" value="<?php echo down($_GET['type']); ?>" hidden>
              </form>
            </div>
                </div>
                <div class="col-md-2 column">
                </div>
            </div>
    </div>
<?php
}
else
{
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-4 column">
		</div>
	<div class="col-md-4 column" >
<div class="well bs-component" >
	<legend style="text-align:center;">Choose the type of admin_shrenik</legend>
	<a href="?type=0&name=Free User" class="btn btn-primary signup">Free User</a>
	<a href="?type=1&name=Artist" class="btn btn-success signup">Artist</a>
</div>
	</div>
		<div class="col-md-4 column">
		</div>
	</div>
</div>
<?php
}
include "footer.php";
?>