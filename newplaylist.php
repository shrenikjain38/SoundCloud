<?php
$title="My Playlists";
 include('header.php');
session_start();
include('config.php');
$id = $_SESSION['user_id'];
$a="INSERT INTO playlist (acc_id) values ('$id')";
$query = mysql_query($a) or die('Error, query failed');
// printf("Last inserted record has id %d\n", mysql_insert_id());
header("Location: /playlist.php");
?>