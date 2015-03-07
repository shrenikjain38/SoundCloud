<?php
if(isset($_FILES['track'])){
    $target_path = "tracks/";
include "config.php";
$file = time().basename( $_FILES['track']['name']);
$target_path = $target_path . $file; 
$track_name = $_POST['name'];
$track_size = $_FILES['track']['size'];
$artist = $_POST['artist'];
$time = time();
echo phpinfo();
if(move_uploaded_file($_FILES['track']['tmp_name'], $target_path)) {
    echo "The file ".  basename($_FILES['track']['name']). 
    " has been uploaded";
    $sql="INSERT INTO `track`(`acc_id`, `name`, `path`, `size` ,`artist`) VALUES ('".$_POST['acc_id']."', '".$track_name."','".$file."', '".$track_size."', '".$artist."')";
    mysql_query($sql);
    echo $sql;
}

else{
    echo "There was an error uploading the file, please try again!";
}
}
// header("Location: upload.php?uploaded");
?>