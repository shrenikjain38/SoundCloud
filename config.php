<?php
	$dbhandle = mysql_connect('localhost', 'admin_shrenik', 'shrenik') or die("Could not connect");
	$selected = mysql_select_db("admin_shrenik",$dbhandle) or die("Could not select DB");
?>