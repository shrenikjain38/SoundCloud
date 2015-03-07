<?php 


session_start();

$user_id = $_SESSION['user_id'];
$id=$_GET['id'];
$plid=$_GET['plid'];
// echo "asda";
 // echo $id;
 // echo $plid;
 include "config.php";
$a="DELETE FROM playlist_track where play_id = ".$plid." and track_id = ".$id;
$query = mysql_query($a) or die('Error, query failed');
$redirect="/viewplaylist.php?id=".$plid;
header("Location: ".$redirect)
?>