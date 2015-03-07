<?php
$id = $_GET['id'];
session_start();
$user_id = $_SESSION['user_id'];
include "config.php";
$update_listens = mysql_query("UPDATE track SET listens = listens + 1 WHERE id=$id");
$update_downloads = mysql_query("UPDATE member SET down_left = down_left - 1 WHERE id=$user_id");
$sql="SELECT name, path, size FROM track WHERE id='".$id."'";
$query = mysql_query($sql) or die('Error, query failed');
list($name, $track, $size) = mysql_fetch_array($query);
header("Content-length: $size");
header("Content-type: audio/mp3");
header("Content-Disposition: attachment; filename=$name.mp3"); 
echo  file_get_contents("tracks/".$track);

?>