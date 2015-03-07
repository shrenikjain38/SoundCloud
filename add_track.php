<?php
session_start();
include "config.php";
$track_id = $_GET['t_id'];
$play_id=$_GET['plid'];
$a="INSERT INTO playlist_track (play_id,track_id) values ('$play_id','$track_id')";
$query = mysql_query($a) or die('Error, query failed');
echo $a;
// include('header.php');
// echo "$id";
$redirect="add_pl_track.php?id=".$play_id;
echo $redirect;
header("Location: ".$redirect);
?>