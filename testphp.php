 <?php 
 // phpinfo();
 $play_id=1;
 	include "config.php";
 	$final="SELECT * from playlist_track where play_id = 1 and track_id = '".$row['id']."'";
  $track_id = mysql_query("SELECT * FROM track");
while($row = mysql_fetch_array($track_id))
{
	$track_id1 = mysql_query("SELECT * from playlist_track where play_id = '".$play_id."' and track_id = '".$row['id']."'");
	$abc1=mysql_num_rows($track_id1);

		if(!$abc1)
		{
			echo $row['name'];
		echo "<br>";
	}
	

}
  ?>
