<?php 
$id = $_GET['id'];
session_start();
$myid=$_SESSION['user_id'];
include "config.php";
$a="INSERT INTO followers (acc_id,follow_id) values ('$myid','$id')";
// $update_follow = mysql_query("INSERT INTO followers (acc_id,follow_id) values (10,20)");
$query = mysql_query($a) or die('Error, query failed');
echo $a;
// include('header.php');
echo "$id";
$redirect="profile.php?id=".$id;
header("Location: ".$redirect) ?>

