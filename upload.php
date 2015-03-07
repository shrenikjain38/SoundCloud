
<?php $title="Upload"; 
include "header.php"; 
  if(isset($_GET['uploaded']))
   {
    ?>
<div class="col-md-2">
          </div>
          <div class="alert alert-success alert-dismissable col-md-8">
          <button type="button" class="close" data-dismiss="alert" 
          aria-hidden="true">
          &times;
          </button>
          Success! The track is uploaded.
          </div>
    <?php
   }
?>
	<body>
        <div class="container">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">
            <div class="well bs-component">
              <form class="form-horizontal" method="POST" action="uploader.php" enctype="multipart/form-data">
                <fieldset>
                  <legend>Upload a Track</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Track Name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputTrack" placeholder="Name" name="name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputArtist" class="col-lg-2 control-label">Artist</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputArtist" placeholder="Artist" name="artist" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Upload</label>
                    <div class="col-lg-10">
                      <input type="file" name="track" required>
                      <input type="text" name="acc_id" value="<?php echo $_SESSION['user_id'] ?>" hidden>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary" value="Upload">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
		<?php
		include "config.php";
		session_start();
		$file = $_FILES['track']['name'];
		if (!isset($file)){
			echo "";
    }
		else {
			$track = addslashes(file_get_contents($_FILES['track']['name']));
			$track_name = $_POST['name'];
      $track_size = $_FILES['track']['size'];
			$artist = $_POST['artist'];
      if (!$insert = mysql_query("INSERT INTO `admin_shrenik`.`track`(`acc_id`, `name`, `track`, `size` ,`artist`) VALUES ('".$_SESSION['user_id']."', '".$track_name."','".$file."', '".$track_size."', '".$artist."')")){
      ?>  
        <div class="alert alert-dismissable alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try uploading again.
        </div>
      <?php
      }

			else {
				$lastid = mysql_insert_id();
        ?>
          <div class="col-md-2">
          </div>
          <div class="alert alert-success alert-dismissable col-md-8">
          <button type="button" class="close" data-dismiss="alert" 
          aria-hidden="true">
          &times;
          </button>
          Success! The track is uploaded.
          </div>
        <?php
			}
			
		}
		?>
	</body>
<?php include "footer.php"; ?>